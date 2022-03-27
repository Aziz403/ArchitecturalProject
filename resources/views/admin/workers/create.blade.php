@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Add Worker @endsection
{{-- Section Name --}}
@section('section_name') Add Worker @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-6 worker-create">
    <div class="card mx-auto">
      <form class="form-horizontal" method="POST" action="{{route('workers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <h4 class="card-title mb-4">Personal Info</h4>


          <div class="form-group row">
            <label for="id_number" class="col-sm-3 text-end control-label col-form-label">CIN</label>
            <div class="col-sm-9">
              <input name="id_number" class="form-control" id="id_number" placeholder="CIN">
              @if ($errors->has('id_number'))
              <span class="text-danger">{{ $errors->first('id_number') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" name="fname" class="form-control input-lg" id="fname" placeholder="First Name Here">
              @if ($errors->has('fname'))
              <span class="text-danger">{{ $errors->first('fname') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name Here">
              @if ($errors->has('lname'))
              <span class="text-danger">{{ $errors->first('lname') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-3 text-end control-label col-form-label">Phone</label>
            <div class="col-sm-9">
              <input type="number" name="phone" class="form-control phone-inputmask" id="phone-mask" placeholder="Enter Phone Number">
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="due_date" class="col-sm-3 text-end control-label col-form-label">Due Date</label>
            <div class="col-sm-9">
              <input type="date" name="due_date" class="form-control" id="due_date" placeholder="Company Name Here">
              @if ($errors->has('due_date'))
              <span class="text-danger">{{ $errors->first('due_date') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="insurance" class="col-sm-3 text-end control-label col-form-label">Insurance?</label>
            <div class="col-sm-9">
              <select id="insurance" name="insurance" class="select2 form-select shadow-none select2-hidden-accessible" style="width: 100%; height: 36px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option class="select-choice" value="1" data-select2-id="3">Yes</option>
                <option class="select-choice" value="0" data-select2-id="3">No</option>
              </select>
              @if ($errors->has('insurance'))
              <span class="text-danger">{{ $errors->first('insurance') }}</span>
              @endif
            </div>
          </div>


          <div class="form-group row">
            <label for="photo" class="col-sm-3 text-end control-label col-form-label">Upload photo</label>
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
            <button type="submit" class="btn btn-success text-light">
              Create
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection