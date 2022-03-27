@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Occupations @endsection
{{-- Section Name --}}
@section('section_name') Occupations @endsection

{{-- Page Main Content --}}
@section('content')
<div class="row">

    <div class="mb-3 mt-3">
        {{-- Edit Form --}}
        <?php $route = Route::current(); ?>
        @if($route->getName() == 'occupations.edit')
        <form method="POST" action="{{route('occupations.update' , $occupation->id)}}" class="row">
            @csrf
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" value="{{$occupation->title}}">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="col-md-3">
                <input name="per_hour" min="0" class="form-control" placeholder="Per hour(DH)" value="{{$occupation->per_hour}}">
                @if ($errors->has('per_hour'))
                <span class="text-danger">{{ $errors->first('per_hour') }}</span>
                @endif
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary text-light">Update</button>
            </div>
        </form>
        @else
        {{-- Create Form --}}
        <form method="POST" action="{{route('occupations.store')}}" class="row">
            @csrf
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" placeholder="Occupation title">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="col-md-3">
                <input name="per_hour" min="0" class="form-control" placeholder="Per hour(DH)">
                @if ($errors->has('per_hour'))
                <span class="text-danger">{{ $errors->first('per_hour') }}</span>
                @endif
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success text-light">Add</button>
            </div>
        </form>
        @endif
    </div>

    <div class="col-sm-12">
        @if(count($occupations) > 0)
        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
            <thead>
                <tr role="row">
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">No.</th>
                    <th style="font-weight: bold;" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Title</th>
                    <th style="font-weight: bold;" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Per hour(DH)</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Created_at</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Control</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($occupations as $occupation)
                <tr role="row" class="odd">
                    <td style="font-weight: bold">{{$occupations->firstItem()+$loop->index}}</td>
                    <td class="">{{$occupation->title}}</td>
                    <td class="">{{$occupation->per_hour}}DH</td>
                    <td>{{$occupation->created_at->toDateString()}}</td>
                    <td>
                        <a href="{{route('occupations.edit' , $occupation->id)}}" class="btn btn-info form-btn-size"><i class="fa fa-edit fa-lg"></i></a>
                        <form action="{{route('occupations.delete' , $occupation->id)}}" method="POST" class="delete-form">
                            @csrf
                            <button type="submit" class="btn btn-danger form-btn-size" onclick="return confirm('Are you sure you want to delete this occupation?');"><i class="fa fa-trash-alt fa-lg"></i></button>
                        </form>    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5 mb-5">
            {!! $occupations->links() !!}
        </div>

        @else
        <h3 class="else-info"><i class="fa fa-folder-open"></i> There is no occupations to view</h3>
        @endif
    </div>
</div>

@endsection