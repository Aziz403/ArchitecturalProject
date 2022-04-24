@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Update Info @endsection
{{-- Section Name --}}
@section('section_name') Update Info @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-8 worker-edit">
    <div class="card pt-3 pb-2">
        <div class="row">
            <div class="col-md-4">
                <div class="worker-photo">
                    <img style="border: 1px solid rgb(238, 238, 238); width:70%; display:block; margin:10px auto; border-radius: 5px;" src="{{asset('design/admin_profile.png')}}" alt="Photo">
                    <h4 style="background: rgb(222, 246, 255); text-align:center; padding:5px 2px; margin:2px 0">{{Auth::user()->username}}</h3>
                </div>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" method="POST" action="{{route('admin.update')}}">
                    @csrf
                    <div class="card-body">        
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 text-end control-label col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control input-lg" id="username" value="{{Auth::user()->username}}">
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 text-end control-label col-form-label">Old</label>
                            <div class="col-sm-9">
                                <input type="password" name="old_password" class="form-control" id="password" placeholder="Old password here">
                                @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password" class="col-sm-3 text-end control-label col-form-label">New</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="new_password" placeholder="New password here">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-3 text-end control-label col-form-label">Confirm</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm new password here">
                            </div>
                        </div>
        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">
                             Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection