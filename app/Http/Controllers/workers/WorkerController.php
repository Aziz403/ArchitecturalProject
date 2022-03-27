<?php

namespace App\Http\Controllers\workers;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;

class WorkerController extends Controller
{
    
    public function index(){
        $workers = Worker::latest()->paginate(10);
        return view('admin.workers.index' , compact('workers'));
    }


    public function create(){
        return view('admin.workers.create');
    }


    public function store(Request $request){
        
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'id_number' => 'required',
            'phone'     => 'numeric|unique:workers',
            'due_date' => 'required',
            'insurance' => 'required',
        ]);

        $worker_data = [
            'fname'     => $request->fname,
            'lname'     => $request->lname,
            'id_number' => $request->id_number,
            'phone' => $request->phone,
            'due_date'  => $request->due_date,
            'insurance' => $request->insurance,
            'created_at' => Carbon::now(),
        ];

        if($file = $request->file('photo')){
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();           
            Image::make($file)->resize(300,260)->save('images/workers/' . $file_name);
            $path_name = 'images/workers/' . $file_name;
            $worker_data['photo'] = $path_name;
        }

        Worker::create($worker_data);

        $notification = ['alert-type' => 'success' , 'message' => 'Worker account created successfully'];

        return redirect()->route('workers.index')->with($notification);

    }


    public function show($id){
        $worker = Worker::findOrFail($id);

        
        $job = Job::where('worker_id' , $worker->id)->where('status' , 0)->first();

        return view('admin.workers.show' , compact('worker','job'));
    }


    public function edit($id){
        $worker = Worker::findOrFail($id);
        return view('admin.workers.edit' , compact('worker'));
    }



    public function update(Request $request, $id){
        
        $worker = Worker::findOrFail($id);

        if(!$worker){
            $notification = ['alert-type' => 'warning' , 'message' => 'This worker was not found'];
            return redirect()->route('worker.index')->with($notification);
        }

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'id_number' => ['required' , Rule::unique('workers')->ignore($worker->id)],
            'phone'     => ['required' , Rule::unique('workers')->ignore($worker->id)],
            'due_date' => 'required',
            'insurance' => 'required',
        ]);

        $worker_data = [
            'fname'     => $request->fname,
            'lname'     => $request->lname,
            'id_number' => $request->id_number,
            'phone' => $request->phone,
            'due_date'  => $request->due_date,
            'insurance' => $request->insurance,
            'updated_at' => Carbon::now(),
        ];

        if($file = $request->file('photo')){
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();           
            Image::make($file)->resize(270,300)->save('images/workers/' . $file_name);
            $path_name = 'images/workers/' . $file_name;
            $worker_data['photo'] = $path_name;
        }

        $worker->update($worker_data);

        $notification = ['alert-type' => 'success' , 'message' => 'Worker account updated successfully'];

        return redirect()->back()->with($notification);

    }


    public function search(Request $request){

        $results = Worker::where('fname' , 'LIKE' , '%'.$request->input.'%')
                ->orWhere('lname' , 'LIKE' , '%'.$request->input.'%')->get();

        return view('admin.workers.search' , compact('results'));
    }


    public function delete($id){
        $worker = Worker::findOrFail($id);

        if($worker->photo != null){
            unlink($worker->photo);
        }

        $worker->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'Worker account deleted successfully'];

        return redirect()->route('workers.index')->with($notification);
    }

    public function card($id){
        $worker = Worker::findOrFail($id);
        return view('admin.workers.idcard',['worker'=>$worker]);
    }

    public function generateur(){
        return view('admin.generateur.index');
    }

    public function getidcard(Request $request){
        $worker = Worker::where('id_number', $request->id_number)->first();
        if($worker==null){
            $notification = ['alert-type' => 'warning' , 'message' => 'This worker was not found'];
            return redirect()->route('workers.getidcard')->with($notification);
        }
        return view('admin.workers.idcard',['worker'=>$worker]);
    }

}
