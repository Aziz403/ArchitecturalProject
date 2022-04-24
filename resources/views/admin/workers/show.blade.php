@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') {{$worker->fullName()}} @endsection
{{-- Section Name --}}
@section('section_name') {{$worker->fullName()}} @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-9 worker-edit">
    <div class="card pt-3 pb-2">
        <div class="row">
            <div class="col-md-4">
                <div class="worker-photo">
                    <img style="border: 1px solid rgb(238, 238, 238); width:70%; display:block; margin:10px auto; border-radius: 5px;" src="{{asset( $worker->photo != null ? $worker->photo :'design/defualt_worker.png')}}" alt="Photo">
                    <h4 style="background: rgb(222, 246, 255); text-align:center; padding:5px 2px; margin:2px 0">{{$worker->fullName()}}</h3>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-horizontal">
                    <div class="card-body">      
        
                        <div class="form-group row">
                        <label for="id_number" class="col-sm-3 text-end control-label col-form-label">CIN</label>
                        <div class="col-sm-9">
                            <input disabled class="form-control" id="id_number" value="{{$worker->id_number}}">
                        </div>
                        </div>
                          
                        <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control input-lg" id="fname" value="{{$worker->fname}}">
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="lname" value="{{$worker->lname}}">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input disabled type="number" class="form-control phone-inputmask" id="phone-mask" value="{{$worker->phone}}">
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="dob" class="col-sm-3 text-end control-label col-form-label">Due Date</label>
                        <div class="col-sm-9">
                            <input disabled type="date" class="form-control" id="dob" value="{{$worker->due_date}}">
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="insurance" class="col-sm-3 text-end control-label col-form-label">Insurance?</label>
                        <div class="col-sm-9">
                            <select disabled id="insurance" value="{{$worker->insurance}}" class="select2 form-select shadow-none select2-hidden-accessible" style="width: 100%; height: 36px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="1" {{$worker->insurance == 1 ? 'selected' : ''}} class="select-choice" data-select2-id="3">Yes</option>
                            <option value="0" {{$worker->insurance == 0 ? 'selected' : ''}} class="select-choice" data-select2-id="3">No</option>
                            </select>
                        </div>
                        </div>
        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <a style="border: 1px solid #ccc" href="{{URL::previous()}}" class="btn btn-light">
                                <i class="fa fa-chevron-circle-left" style="color: rgb(59, 59, 59)"></i> Back
                            </a>
                            <a href="{{route('workers.edit' , $worker->id)}}" class="btn btn-info">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{route('workers.delete' , $worker->id)}}" class="delete-form" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this account?');">
                                    <i class="fa fa-trash-alt"></i> Delete
                                </button>
                            </form>

                            @if (isset($job))
                                <form action="{{route('jobs.stop' , $worker->id)}}" method="POST" style="font-weight:700; color: white; display:inline-block; float:right;border: 1px solid #ccc">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to stop job for this is worker?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;height:20px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                         Stop
                                    </button>
                                </form>                                
                            @else
                                <a href="{{route('jobs.start' , $worker->id)}}" class="btn btn-success" style="font-weight:700; color: white; display:inline-block; float:right;">
                                    <i class="fa fa-hourglass-start"></i> Start
                                </a>                                 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection