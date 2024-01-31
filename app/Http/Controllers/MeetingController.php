<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Meeting\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::activeItems()->paginate(24);
        return view('page.meeting.index',['meetings' => $meetings]);
    }

    public function indexMap()
    {
        $meetings = Meeting::activeItems()->get();
        return view('page.meeting-map.index',['meetings' => $meetings]);
    }

    public function show($slug)
    {
        $meeting = Meeting::activeItem($slug)->firstOrFail();
        return view('page.meeting.show',['meeting' => $meeting]);
    }

    public function getMeetings(Request $request)
    {

        return response()->json(
            [
                'success' =>true,
                'meetings' => Meeting::activeItems()->get()->toArray()
            ]
        );
    }
}
