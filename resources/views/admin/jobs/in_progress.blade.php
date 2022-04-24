@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Jobs in progress @endsection
{{-- Section Name --}}
@section('section_name') Jobs in progress @endsection

{{-- Page Main Content --}}
@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('jobs.create')}}" class="btn btn-success text-light m-2" style="display: inline-block; float: right;"><i class="fa fa-plus"></i> Create</a>
        @if(count($jobs) > 0)
        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
            <thead>
                <tr role="row">
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">No.</th>
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Photo</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Full Name</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Occupation</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Note</th>

                    <th style="font-weight: bold" class="sorting text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 105.219px;">Uniform</th>
                    <th style="font-weight: bold" class="sorting text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Status</th>
                    <th style="font-weight: bold" class="sorting_desc text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 86.8438px;" aria-sort="descending">Start time</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80.8906px;">Done</th> 
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($jobs as $job)
                <tr role="row" class="odd">
                    <td style="font-weight: bold">{{$jobs->firstItem()+$loop->index}}</td>
                    <td style="padding: 0;"><img style="width: 90%; height:60px; display:block; margin:2px auto" src="{{asset($job->worker->photo ? $job->worker->photo : 'design/defualt_worker.png')}}" alt=""></td>
                    <td class="">{{$job->worker->fullName()}}</td>
                    <td>{{$job->occupation->title}}</td>
                    <td>{{$job->note ? $job->note : '-----'}}</td>
                    <td class="text-center {{$job->uniform == 1 ? 'text-success' : 'text-warning'}} text-center">{!!$job->uniform == 1 ? '<i class="fa fa-2x fa-check"></i>' : '<i class="fa fa-2x fa-times"></i>'!!}</td>
                    <td class="text-center"><span class="badge rounded-pill {{$job->status == 0 ? 'bg-danger' : 'bg-success'}}">{{$job->status == 0 ? 'in progress' : 'completed'}}</span></td>
                    <td class="sorting_1 text-center">
                        {{Carbon\Carbon::parse($job->start_time)->format('H:i')}}
                    </td>
                    <td>    
                        <a href="{{route('jobs.mark' , $job->id)}}" style="color: #fff" class="btn btn-success pl-1 pr-1 form-btn-size" onclick="return confirm('Mark this job as completed?');"><i class="fa fa-check fa-lg"> </i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-5 mb-5">
            {!! $jobs->links() !!}
        </div>

        @else
        <h3 class="else-info"><i class="fa fa-folder-open"></i> There is no jobs in progress</h3>
        @endif
    </div>
</div>

@endsection