<?php

namespace App\Http\Controllers\occupations;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{

    public function index(){
        $occupations = Occupation::latest()->paginate(10);
        return view('admin.occupations.index' , compact('occupations'));
    }

    public function edit($id){
        $occupations = Occupation::latest()->paginate(10);
        $occupation = Occupation::findOrFail($id);

        return view('admin.occupations.index' , compact('occupations' , 'occupation'));
    }


    public function store(Request $request){
        
        $request->validate([
            'title' => 'required',
            'per_hour' => 'required|numeric'
        ]);

        Occupation::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'Occupation created successfully'];

        return redirect()->back()->with($notification);

    }


    public function update(Request $request, $id){

        $occupation = Occupation::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'per_hour' => 'required|numeric'
        ]);

        $occupation->update($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'Occupation updated successfully'];

        return redirect()->route('occupations.index')->with($notification);

    }



    public function delete($id){
    
        $occupation = Occupation::findOrFail($id);

        $occupation->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'Occupation deleted successfully'];

        return redirect()->route('occupations.index')->with($notification);

    }
    





}
