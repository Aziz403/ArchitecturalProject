@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Start job @endsection
{{-- Section Name --}}
@section('section_name') Start job @endsection

{{-- Page Main Content --}}
@section('content')

<div class="col-md-9 job-create">
    <div class="card pt-3 pb-2">
        <div class="row">
            <div class="col-md-4">
                <div class="worker-photo">
                    <img style="border: 1px solid rgb(238, 238, 238); width:70%; display:block; margin:10px auto; border-radius: 5px;" src="{{asset($worker->photo ? $worker->photo : 'design/defualt_worker.png')}}" alt="Photo">
                    <h4 style="background: rgb(222, 246, 255); text-align:center; padding:5px 2px; margin:2px 0">{{$worker->fullName()}}</h3>
                </div>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" method="POST" action="{{route('jobs.store')}}">
                    @csrf
                    <div class="card-body">      
                        <div class="form-group row">
                            <input type="hidden" name="worker" value="{{$worker->id}}">
                            <label for="occupation" class="col-sm-3 text-end control-label col-form-label">Occupation</label>
                            <div class="col-sm-9">
                                <select name="occupation" id="occupation" class="select2 form-select shadow-none select2-hidden-accessible" style="width: 100%; height: 36px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    {{-- Defualt Choice --}}
                                    <option value="{{null}}" class="select-choice" data-select2-id="3"> Select occupation </option>
                                    @foreach($occupations as $occupation)
                                        <option value="{{$occupation->id}}" data-select2-id="3">
                                            {{$occupation->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('occupation'))
                                <span class="text-danger">{{ $errors->first('occupation') }}</span>
                                @endif                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label mt-2">Uniform</label>
                            <div class="col-md-3">
                                <input name="uniform" value="0" type="radio" class="form-check-input icon-choice" id="customControlValidation2" name="radio-stacked">
                                <img style="width: 50px;" src="{{asset('design/normal1.png')}}" alt="">
                            </div>
                            <div class="col-md-3">
                                <input name="uniform" value="1" id="worker" type="radio" class="form-check-input icon-choice" id="customControlValidation2" name="radio-stacked">
                                <img for="worker" style="width: 54px;" src="{{asset('design/worker1.png')}}" alt="">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top:-10px">
                            <span class="col-sm-3 text-end control-label col-form-label mt-2"> </span>
                            <div class="col-sm-9">
                                @if ($errors->has('uniform'))
                                <span class="text-danger">{{ $errors->first('uniform') }}</span>
                                @endif
                            </div>
                        </div>
        


                        <div class="form-group row" style="margin-top:-10px">
                            <label for="note" class="col-sm-3 text-end control-label col-form-label">Note</label>
                            <div class="col-sm-9">
                              <textarea name="note" class="form-control" id="note" cols="30" rows="4"></textarea>            
                            </div>
                        </div>
        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success col-md-3" style="font-weight:700; color: white; display:inline-block; float:right">
                                <i class="fa fa-hourglass-start"></i> Start Job
                            </button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

@endsection