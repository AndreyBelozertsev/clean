<?php

namespace App\Http\Controllers;

use Domain\City\Models\City;
use Illuminate\Http\Request;
use App\Events\VolunteerCreated;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Domain\Volunteer\Models\Volunteer;
use App\Http\Requests\VolunteerCreateRequest;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::activeItems()
            ->withSum('meetings','scores')
            ->orderBy('meetings_sum_scores', 'desc')
            ->paginate(24);
        return view('page.volunteer.index',['volunteers' => $volunteers]);
    }

    public function show($slug)
    {
        $volunteer = Volunteer::activeItem($slug)->withSum('meetings','scores')->firstOrFail();
        return view('page.volunteer.show',['volunteer' => $volunteer]);
    }

    public function create()
    {
        $cities = Cache::rememberForever('city_active_list', function () {
            return City::activeItems()->get();;
        });
        return view('page.volunteer.create',['cities' => $cities]);
    }

    public function store(VolunteerCreateRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {

            $crop = $data['crop'];
            $data['thumbnail'] = $request->file('thumbnail')->store(getUploadPath('volunteer'),'public');  
            
            $img = Image::make('storage/' . $data['thumbnail'])
                ->crop(
                    $crop['width'], 
                    $crop['height'], 
                    $crop['x'], 
                    $crop['y'])
                ->save('storage/' . $data['thumbnail']);
    
        }
        unset($data['crop']);
        $volunteer = Volunteer::create($data);

        event(new VolunteerCreated($volunteer));

        return response()->json(
            [
                'success' => true,
                'message' => 'Спасибо, за регистрацию. После модерации Ваш профиль будет опубликован на сайте.'
            ]
        );
    }
}
