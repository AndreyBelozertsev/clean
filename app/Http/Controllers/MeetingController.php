<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Meeting\Models\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::activeItems()->get();
        return view('page.meeting.index',['meetings' => $meetings]);
    }

    public function show($slug)
    {

    }

    public function getMeetings()
    {
        return response()->json(
            [
                'success' =>true,
                'meetings' => Meeting::activeItems()->get()->toArray()
            ]
        );
    }
}
