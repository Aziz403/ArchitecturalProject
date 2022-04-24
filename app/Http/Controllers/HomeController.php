<?php

namespace App\Http\Controllers;



use App\Models\Occupation;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Job;
use App\Models\Worker;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function home(Request $request){
		$date_start = $request->date_start?:date('d-m-Y',strtotime("-1 days"));
		$date_end = $request->date_end?:Carbon::now();

		$period = new DatePeriod(
			new DateTime($date_start),
			new DateInterval('P1D'),
			new DateTime($date_end)
	   	);

		$lables_dates = [];
		$data_dates = [];

	   	foreach ($period as $key => $value) {
			array_push($lables_dates,$value->format('m/d'));
			array_push($data_dates,array_sum(DB::table('jobs')->whereDate('created_at',$value->format('Y-m-d'))->pluck('amount')->toArray()));
		}

		//dd($data_dates);

		$occuptions = Occupation::all();
		$lables_occupations = Occupation::all()->pluck('title')->toArray();
		$data_occupations = [];

		foreach($occuptions as $occupation){
			$data_occupations[$occupation->title] = count(DB::table('jobs')->whereBetween('created_at',[$period->start,$period->end])->where('occupation_id',$occupation->id)->pluck('amount')->toArray());
		}

		$data_occupations = array_values($data_occupations);
		
		//dd($data_occupations);
		

        return view('admin.home.home',compact("lables_dates","data_dates",'lables_occupations','data_occupations','date_start','date_end'));
    }

    public function getCalendarData(Request $request){
        $data = Event::whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->get(['id', 'title', 'start', 'end']);
        return response()->json($data);
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }

}
