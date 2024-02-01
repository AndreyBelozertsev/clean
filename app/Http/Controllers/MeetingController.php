<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Meeting\Models\Meeting;
use Illuminate\Support\Facades\Cache;

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

        $meetings = Cache::rememberForever('meetings_map_list', function () {
            return Meeting::activeItems()->get()->toArray();
        });
        return response()->json(
            [
                'success' =>true,
                'meetings' => $meetings
            ]
        );
    }
}
