<?php

namespace App\Http\Controllers;

use Domain\City\Models\City;
use Illuminate\Http\Request;
use Domain\Landfill\Models\Landfill;
use App\Http\Requests\LandfillCreateRequest;

class LandfillController extends Controller
{
    public function index()
    {
        $landfills = Landfill::activeItems()->paginate(10);
        return view('page.landfill.index',['landfills' => $landfills]);
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

        $landfill = Landfill::create($data);
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $key => $file) {
                $images[$key] = $file->store('landscape/' . $landfill->id,'public');
            }
            $landfill->images = $images;
            $landfill->save();
        }
        
        return response()->json(
            [
                'success' =>true,
                'message' => 'Спасибо, информация успешно добавлена'
            ]
        );
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

}