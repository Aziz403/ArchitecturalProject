@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Generateur @endsection
{{-- Section Name --}}
@section('section_name') IDCard Generateur @endsection

{{-- Page Main Content --}}
@section('content')
<div class="col-md-9 worker-edit">
    <div class="card pt-3 pb-2">
        <form class="row" action="{{route('workers.getidcard')}}" method="POST">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Search ID Card</h4>
                
                <div class="form-group row">
                <label for="id_number" class="col-sm-3 text-end control-label col-form-label">CIN</label>
                <div class="col-sm-9">
                    <input name="id_number" class="form-control" id="id_number" placeholder="CIN">
                    @if (Session::get('notfound'))
                    <span class="text-danger">{{Session::get('notfound')}}</span>
                    @endif
                </div>
                </div>

            </div>

            <div class="border-top">
                <div class="card-body">
                <button type="submit" class="btn btn-success text-light">
                    Get ID Card
                </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection