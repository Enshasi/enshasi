<?php


namespace App\Http\Traits;


use MacsiDigital\Zoom\Contracts\Zoom;

trait MeetingZoomTrait
{
    public function createMeeting($request){

        $user = Zoom::user()->first(); //First name OR user in db

        $meetingData = [    //create zoom
            'topic' => $request->topic,
            'duration' => $request->duration, // time in app zoom
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone')
            // 'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);  //start  and run  meetingData

        $meeting->settings()->make([   //add setting insed zoom Application
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

        return  $user->meetings()->save($meeting);


    }
}
