<?php

namespace App\Http\Controllers;

use Domain\City\Models\City;
use Illuminate\Http\Request;
use App\Events\VolunteerCreated;
use Domain\Volunteer\Models\Volunteer;
use App\Http\Requests\VolunteerCreateRequest;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::activeItems()->withSum('meetings','scores')->orderBy('meetings_sum_scores', 'desc')->paginate(10);
        return view('page.volunteer.index',['volunteers' => $volunteers]);
    }

    public function show($slug)
    {

    }

    public function create()
    {
        $cities = City::activeItems()->get();
        return view('page.volunteer.create',['cities' => $cities]);
    }

    public function store(VolunteerCreateRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {
            $data['thumbnail'] = $request->file('thumbnail')->store(getUploadPath('volunteer'),'public');            
        }
        $volunteer = Volunteer::create($data);

        event(new VolunteerCreated($volunteer));

        return response()->json(
            [
                'success' => true,
                'message' => 'Спасибо, информация успешно добавлена'
            ]
        );
    }
}
