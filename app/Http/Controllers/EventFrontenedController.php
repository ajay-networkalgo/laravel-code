<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventFrontenedController extends Controller
{
    public function index(){
        // echo "SS";exit;
    	$events = Event::where('status', 1)->orderBy('id','DESC')->get();
        $upcomingEvent = $events->filter(function ($item) {
            return $item['to_date'] > date('Y-m-d H:i:s A');
        });
        $pastEvent = $events->filter(function ($item) {
            return $item['to_date'] < date('Y-m-d H:i:s A');
        });
        $upcomingEventCount = $upcomingEvent->count();
        $pastEventCount = $pastEvent->count();

        $upcomingEvent = $upcomingEvent->take(6);
        $pastEvent = $pastEvent->take(6);


        $this->viewData['upcomingEvents'] = $upcomingEvent;
        $this->viewData['pastEvents'] = $pastEvent;
        $this->viewData['upcomingEventsCount'] = $upcomingEventCount;
        $this->viewData['pastEventsCount'] = $pastEventCount;
    	return view('home.events',$this->viewData);
    }

    public function loadMoreEvents(Request $request){
        $skip = $request->skip;

        $events = Event::where('status', 1)->orderBy('id','DESC')->get();
        $upcomingEvent = $events->filter(function ($item) {
            return $item['to_date'] > date('Y-m-d H:i:s A');
        });
        $pastEvent = $events->filter(function ($item) {
            return $item['to_date'] < date('Y-m-d H:i:s A');
        });
        $upcomingEventCount = $upcomingEvent->count();
        $pastEventCount = $pastEvent->count();

        $upcomingEvent = $upcomingEvent->skip($skip)->take(6);
        $pastEvent = $pastEvent->skip($skip)->take(6);

        $this->viewData['upcomingEvents'] = $upcomingEvent;
        $this->viewData['pastEvents'] = $pastEvent;
        $this->viewData['upcomingEvents'] = $upcomingEvent;
        $this->viewData['pastEvents'] = $pastEvent;
        $this->viewData['check'] = 'hiii';
        return view('home.all-events',$this->viewData);
    }

    // public function loadMorePastEvents(Request $request){
    //     $skip = $request->skip;

    //     $events = Event::orderBy('id','DESC')->get();
    //     $upcomingEvent = $events->filter(function ($item) {
    //         return $item['to_date'] > date('Y-m-d H:i:s A');
    //     });
    //     $pastEvent = $events->filter(function ($item) {
    //         return $item['to_date'] < date('Y-m-d H:i:s A');
    //     });
    //     $upcomingEventCount = $upcomingEvent->count();
    //     $pastEventCount = $pastEvent->count();

    //     $upcomingEvent = $upcomingEvent->skip($skip)->take(6);
    //     $pastEvent = $pastEvent->skip($skip)->take(6);


    //     $this->viewData['upcomingEvents'] = $upcomingEvent;
    //     $this->viewData['pastEvents'] = $pastEvent;
    //     $this->viewData['upcomingEvents'] = $upcomingEvent;
    //     $this->viewData['pastEvents'] = $pastEvent;
    //     $this->viewData['check'] = 'hiii';
    //     return view('home.all-events',$this->viewData);
    // }

    public function details($slug = ''){
    	if(!empty($slug)){
    		// $id = base64_decode($event_id);
    		$events = Event::where('slug', $slug)->where('status', 1)->first();
    		if(!empty($events)){
                $event_id = $events->id;
                $start = Carbon::parse($events->from_date);
                $end = Carbon::parse($events->to_date);
                $formatted_date_range = $start->format('F j | g:ia') . ' - ' . $end->format('F j | g:ia');
                return view('events.details',['events'=>$events,'id'=>$event_id,'formatted_date_range'=>$formatted_date_range]);
	        }else{
	            return redirect()->back();
	        }
    	}else{
    		return redirect()->back();
    	}
    }
}
