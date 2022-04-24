@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Admin Profile @endsection
{{-- Section Name --}}
@section('section_name') Admin Profile @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-9 worker-edit">
    <div class="card pt-3 pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="worker-photo">
                    <img style="border: 1px solid rgb(238, 238, 238); width:70%; display:block; margin:10px auto; border-radius: 5px;" src="{{asset('design/admin_profile.png')}}" alt="Photo">
                    <h4 style="background: rgb(222, 246, 255); text-align:center; padding:5px 2px; margin:2px 0">{{Auth::user()->username}}</h3>
                </div>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal">
                    <div class="card-body">        
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 text-end control-label col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input disabled type="text" class="form-control input-lg" id="username" value="{{Auth::user()->username}}">
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input disabled type="password" class="form-control" id="password" >
                            </div>
                        </div>
        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <a href="{{route('admin.edit')}}" class="btn btn-info">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection