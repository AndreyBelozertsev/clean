<?php

namespace App\Http\Controllers;

use Domain\City\Models\City;
use Illuminate\Http\Request;
use App\Events\LandfillCreated;
use Domain\Landfill\Models\Landfill;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Domain\Landfill\Models\LandfillCategory;
use App\Http\Requests\LandfillStage1CreateRequest;
use App\Http\Requests\LandfillStage2CreateRequest;
use App\Http\Requests\LandfillStage3CreateRequest;

class LandfillController extends Controller
{

    protected array $required = 
    [
        'address', 'name', 'phone', 'coordinates', 'images', 'city_id'
    ];

    public function index()
    {
        $landfills = Landfill::activeItems()->paginate(10)->withQueryString();
        $categories = LandfillCategory::activeNoEmptyItems()->get();
        return view('page.landfill.index',[
            'landfills' => $landfills,
            'categories' => $categories
        ]);
    }

    public function indexMap()
    {
        return view('page.landfill-map.index');
    }

    public function show($slug)
    {

    }

    public function getLandfills()
    {
        return response()->json(
            [
                'success' =>true,
                'landfills' => Landfill::activeItems()->get()->toArray()
            ]
        );
    }

    public function create()
    {
        $cities = City::activeItems()->get();
        return view('page.landfill.create',['cities' => $cities]);
    }

    public function store(LandfillCreateRequest $request)
    {
        $data = $request->validated();

        $data['landfill_category_id'] = 1;

        
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $key => $file) {
                $data['images'][$key] = $file->store(getUploadPath('landfill'),'public');
            }
        }
        $landfill = Landfill::create($data);
        
        return response()->json(
            [
                'success' =>true,
                'message' => 'Спасибо, информация успешно добавлена'
            ]
        );
    }

    public function storeTest(array $data) :void
    {
        if (count(array_intersect_key(array_flip($this->required), $data)) !== count($this->required)) {
            return;
        }
        $data['landfill_category_id'] = 1;
        unset($data['uuid']);
        
        if( !empty($data['images']) )
        {
            foreach ($data['images'] as $key => $image) {
                $data['images'][$key] = getUploadPath('landfill') . '/' . basename($image);
                Storage::disk('public')->move($image, $data['images'][$key]);
            }
        }
        $landfill = Landfill::create($data);
        event(new LandfillCreated($landfill));
        
    }

    public function search(Request $request)
    {
        $landills = Landfill::orWhere('address','LIKE', '%' . $request->search . '%')->public()->get();

        return view('page.search.index',['landfills'=>$landills]);
    }

    public function searchAsync(Request $request)
    {
        if($landfills = Landfill::orWhere('title','LIKE', '%' . $request->search . '%')->public()->limit(5)->get()){
            for($i = 0; $i < count($landfills); $i++){
                $landfills[$i]->url = route('landfill.show',['slug' => $landfills[$i]->slug]);
            }
            return response()->json(['status' => true, 'landfills' => $landfills], 200);
        }
        else{  
            return response()->json(['status' => true, 'landfills' => ''], 200);
        }  
    
    }

    public function stage1(LandfillStage1CreateRequest $request)
    {
        $data = $request->validated();
        if($draft = Cache::get('landfill_create_' . $data['uuid'])){
            $data = array_merge($data, unserialize($draft));
        }
        Cache::put('landfill_create_' . $data['uuid'], serialize($data));
    }

    public function stage2(LandfillStage2CreateRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $key => $file) {
                $data['images'][$key] = $file->store('temp/landfill','public');
            }
        }
        if($draft = Cache::get('landfill_create_' . $data['uuid'])){
            $data = array_merge($data, unserialize($draft));
        }
        Cache::put('landfill_create_' . $data['uuid'], serialize($data));
    }

    public function stage3(LandfillStage3CreateRequest $request)
    {
        $data = $request->validated();
        if($draft = Cache::get('landfill_create_' . $data['uuid'])){
            $data = array_merge($data, unserialize($draft));
        }

        $this->storeTest($data);

        Cache::forget('landfill_create_' . $data['uuid']);

        return response()->json(
            [
                'success' =>true,
                'message' => 'Спасибо, информация успешно добавлена'
            ]
        );
    }

}