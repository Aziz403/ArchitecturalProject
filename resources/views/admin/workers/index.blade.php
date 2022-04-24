@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Workers Accounts @endsection
{{-- Section Name --}}
@section('section_name') All Workers @endsection

{{-- Page Main Content --}}
@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('workers.create')}}" class="btn btn-success text-light m-2" style="display: inline-block; float: right;"><i class="fa fa-plus"></i> Create</a>
        @if(count($workers) > 0)
        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
            <thead>
                <tr role="row">
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">No.</th>
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Photo</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">CIN</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Full Name</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Phone</th>
                    <th style="font-weight: bold; width:12%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 105.219px;">Due Date</th>
                    <th style="font-weight: bold; width:5%;" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Insurance</th>
                    <th style="font-weight: bold" class="sorting_desc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 86.8438px;" aria-sort="descending">Created_at</th>
                    <th style="font-weight: bold; width:15%;" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80.8906px;">Control</th>                  
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($workers as $worker)
                <tr role="row" class="odd">
                    <td style="font-weight: bold">{{$workers->firstItem()+$loop->index}}</td>
                    <td style="padding: 0;"><img style="width: 80%; height:60px; display:block; margin:2px auto" src="{{asset( $worker->photo != null ? $worker->photo :'design/defualt_worker.png')}}" alt=""></td>
                    <td>{{$worker->id_number}}</td>
                    <td class="">{{$worker->fullName()}}</td>
                    <td>{{$worker->phone != null ? $worker->phone : 'unknown' }}</td>
                    <td>{{$worker->due_date}}</td>
                    <td class="{{$worker->insurance == 1 ? 'text-success' : 'text-warning'}} text-center">{!!$worker->insurance == 1 ? '<i class="fa fa-2x fa-check"></i>' : '<i class="fa fa-2x fa-times"></i>'!!}</td>
                    <td class="sorting_1">{{$worker->created_at->toDateString()}}</td>
                    <td>    
                        <a href="{{route('workers.show' , $worker->id)}}" class="btn btn-sm btn-light form-btn-size"><i class="fa fa-eye fa-lg"></i></a>
                        <a href="{{route('workers.card' , $worker->id)}}" class="btn btn-sm btn-primary form-btn-size"><i class="fa fa-id-card-alt fa-lg"></i></a>
                        <a href="{{route('workers.edit' , $worker->id)}}" class="btn btn-sm btn-info form-btn-size"><i class="fa fa-edit fa-lg"></i></a>
                        <form action="{{route('workers.delete' , $worker->id)}}" method="POST" class="delete-form">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger form-btn-size" onclick="return confirm('Are you sure you want to delete this account?');"><i class="fa fa-trash-alt fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-5 mb-5">
            {!! $workers->links() !!}
        </div>

        @else
            <h3 class="else-info"><i class="fa fa-folder-open"></i> There is no workers to view</h3>
        @endif
    </div>
</div>

@endsection