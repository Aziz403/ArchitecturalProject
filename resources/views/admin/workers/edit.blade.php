@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Update account @endsection
{{-- Section Name --}}
@section('section_name') Update account @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-9 worker-edit">
    <div class="card pt-3 pb-2">
        <div class="row">
            <div class="col-md-4">
                <div class="worker-photo">
                    <img style="border: 1px solid rgb(238, 238, 238); width:70%; display:block; margin:10px auto; border-radius: 5px;" src="{{asset($worker->photo ? $worker->photo :'design/defualt_worker.png')}}" alt="Photo">
                    <h4 style="background: rgb(222, 246, 255); text-align:center; padding:5px 2px; margin:2px 0">{{$worker->fullName()}}</h3>
                </div>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" method="POST" action="{{route('workers.update' , $worker->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">      
        
                        <div class="form-group row">
                        <label for="id_number" class="col-sm-3 text-end control-label col-form-label">CIN</label>
                        <div class="col-sm-9">
                            <input name="id_number" class="form-control" id="id_number" value="{{$worker->id_number}}">
                            @if ($errors->has('id_number'))
                            <span class="text-danger">{{ $errors->first('id_number') }}</span>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="fname" class="form-control input-lg" id="fname" value="{{$worker->fname}}">
                            @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="lname" class="form-control" id="lname" value="{{$worker->lname}}">
                            @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" name="phone" class="form-control phone-inputmask" id="phone-mask" value="{{$worker->phone}}">
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="due_date" class="col-sm-3 text-end control-label col-form-label">Due Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="due_date" class="form-control" id="due_date" value="{{$worker->due_date}}">
                            @if ($errors->has('due_date'))
                            <span class="text-danger">{{ $errors->first('due_date') }}</span>
                            @endif
                        </div>
                        </div>
        
                        <div class="form-group row">
                        <label for="insurance" class="col-sm-3 text-end control-label col-form-label">Insurance?</label>
                        <div class="col-sm-9">
                            <select id="insurance" name="insurance" value="{{$worker->insurance}}" class="select2 form-select shadow-none select2-hidden-accessible" style="width: 100%; height: 36px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="1" {{$worker->insurance == 1 ? 'selected' : ''}} class="select-choice" data-select2-id="3">Yes</option>
                            <option value="0" {{$worker->insurance == 0 ? 'selected' : ''}} class="select-choice" data-select2-id="3">No</option>
                            </select>
                            @if ($errors->has('insurance'))
                            <span class="text-danger">{{ $errors->first('insurance') }}</span>
                            @endif
                        </div>
                        </div>


                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 text-end control-label col-form-label">Update photo</label>
                            <div class="col-sm-9">
                              <input type="file" name="photo" class="form-control" id="photo">
                              @if ($errors->has('photo'))
                              <span class="text-danger">{{ $errors->first('photo') }}</span>
                              @endif
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