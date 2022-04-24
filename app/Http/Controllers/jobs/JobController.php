<?php

namespace App\Http\Controllers\jobs;

use App\Custom;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Occupation;
use App\Models\Worker;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Timer;

use function PHPUnit\Framework\isEmpty;

class JobController extends Controller
{

    public function index(Request $request){
        if($request->selected_date==null){
            $request->selected_date = Carbon::now();
        }
        $jobs = Job::whereDate('created_at', $request->selected_date)->paginate(10);
        $selected_date = $request->selected_date;
        return view('admin.jobs.index' , compact('jobs','selected_date'));
    }


    public function archive(Request $request){
        if($request->creation_min_date && $request->creation_max_date){
            $jobs = Job::whereBetween('created_at', [$request->creation_min_date, $request->creation_max_date])->where('status' , 1)->paginate(10);
            $prix_total = array_sum(Job::whereBetween('created_at', [$request->creation_min_date, $request->creation_max_date])->where('status' , 1)->pluck('amount')->toArray());
        }
        else{
            $jobs = null;
            $prix_total=0;
        }
        $creation_min_date = $request->creation_min_date;
        $creation_max_date = $request->creation_max_date;

        return view('admin.jobs.archive' , compact('jobs','prix_total','creation_min_date','creation_max_date'));
    }


    public function create(){

        $occupations = Occupation::all();
        $occupations->pluck('title','id');

        $workers = Worker::all();
        $workers->pluck('fname','lname','id');


        return view('admin.jobs.create' , compact('occupations' , 'workers'));
    }

    // Start Job From User Profile
    public function start($id){

        $check_user_job = Job::where('worker_id' , $id)->where('status' , 0)->first();


        $occupations = Occupation::all();
        $occupations->pluck('title','id');

        $worker = Worker::findOrFail($id);

        if($check_user_job){
            return view('admin.jobs.stop' , compact('occupations' , 'worker','check_user_job'));    
        }

        return view('admin.jobs.start' , compact('occupations' , 'worker'));
    }


    public function startJob(Request $request){

        $request->validate([
            'worker' => 'required',
            'occupation' => 'required',
            'uniform' => 'required',
        ]);

        $check_user_job = Job::where('worker_id' , $request->worker)->where('status' , 0)->first();

        if($check_user_job){
            $notification = ['alert-type' => 'warning' , 'message' => 'This person work in another job'];
            return redirect()->back()->with($notification);
        }

        Job::create([
            'worker_id' => $request->worker,
            'occupation_id' => $request->occupation,
            'uniform' => $request->uniform,
            'note'  => $request->note,
            'start_time' => Carbon::now(),
        ]);

        $notification = ['alert-type' => 'success' , 'message' => 'Job starting now :)'];

        return redirect()->route('jobs.in_progress')->with($notification);


    }


    public function inProgress(){

        $jobs = Job::where('status' , 0)->latest()->paginate(10);

        return view('admin.jobs.in_progress' , compact('jobs'));
    }
    
    public function completed(Request $request){
        if($request->selected_date==null){
            $request->selected_date = Carbon::now();
        }
        $jobs = Job::latest()->where('status' , 1)->whereDate('created_at', $request->selected_date)->paginate(10);
        $selected_date = $request->selected_date;
        return view('admin.jobs.completed' , compact('jobs','selected_date'));
    }  


    public function markAsCompleted($id){

        $job = Job::findOrFail($id);

        $job->update([
            'status' => 1,
            'end_time' => Carbon::now(),
        ]);

        $end_time = Carbon::parse($job->end_time);

        //$hours = $end_time->diffInHours($job->start_time);
        $mins = $end_time->diffInMinutes($job->start_time);

        // Calac Total Payment
        $amount = /*($hours * $job->occupation->per_hour)*/ + (($mins/60) * $job->occupation->per_hour);

        $job->update([
            'amount' => $amount
        ]);

        $notification = ['alert-type' => 'success' , 'message' => 'Job completed successfully'];

        return redirect()->route('jobs.completed')->with($notification);


    }

    public function stop($id){
        $job = Job::where('worker_id' , $id)->where('status' , 0)->first();

        if($job==null){
            $notification = ['alert-type' => 'warning' , 'message' => 'This person dont have job'];
            return redirect()->back()->with($notification);
        }

        return redirect()->route('jobs.mark',$job->id)->with($job->id);
    }

    public function delete($id){

        $job = Job::findOrFail($id);

        $job->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'Job has been deleted'];

        return redirect()->back()->with($notification);


    }



}
