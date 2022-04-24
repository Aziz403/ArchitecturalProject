@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Completed jobs @endsection
{{-- Section Name --}}
@section('section_name') Completed jobs @endsection

{{-- Page Main Content --}}
@section('content')
<style>

    @media only screen and (max-width: 500px) {
        #zero_config>thead>tr>:not(th.for-mobile){
            display: none;
        }
        #zero_config>thead>tr>th.for-mobile{
            display: table-cell;
        }
        #zero_config>tbody>tr>:not(td.for-mobile){
            display: none;
        }
        #zero_config>tbody>tr>td.for-mobile{
            display: table-cell;
        }
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('jobs.create')}}" class="btn btn-success text-light m-2" style="display: inline-block; float: right;"><i class="fa fa-plus"></i> Create</a>
        <form id="jobs-index-date" action="{{route('jobs.archive')}}" class="m-2">
          <div class="form-group row">
            <div class="col-sm-3 d-flex">
              <input style="min-width: 150px" type="date" name="creation_min_date" value="{{$creation_min_date}}" class="form-control">
              <input style="min-width: 150px" type="date" name="creation_max_date" value="{{$creation_max_date}}" class="form-control">
              <input type="submit" value="Search" onclick="document.getElementById('jobs-index-date').submit()"/>
            </div>
          </div>
        </form>
        <h4 class="else-info"><i class="fa fa-folder-open"></i> Prix Total : {{$prix_total}}</h4>
        @if($jobs!=null)
        @if(count($jobs) > 0)
        <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
            <thead>
                <tr role="row">
                    <th style="font-weight: bold; width:5%" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">No.</th>
                    <th style="font-weight: bold; width:5%" class="sorting for-mobile" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Photo</th>
                    <th style="font-weight: bold" class="sorting for-mobile" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 140.047px;">Full Name</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Occupation</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 228.625px;">Note</th>
                    <th style="font-weight: bold" class="sorting text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 105.219px;">Uniform</th>
                    <th style="font-weight: bold" class="sorting text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Status</th>
                    <th style="font-weight: bold" class="sorting text-center for-mobile" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Check in</th>
                    <th style="font-weight: bold" class="sorting text-center for-mobile" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Check out</th>
                    <th style="font-weight: bold" class="sorting text-center" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Amount</th>
                    <th style="font-weight: bold" class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 42.375px;">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($jobs as $job)
                <tr role="row" class="odd">
                    <td style="font-weight: bold">{{$jobs->firstItem()+$loop->index}}</td>
                    <td class="for-mobile" style="padding: 0;"><img style="width: 90%; height:60px; display:block; margin:2px auto" src="{{asset($job->worker->photo ? $job->worker->photo : 'design/defualt_worker.png')}}" alt=""></td>
                    <td class="for-mobile">{{$job->worker->fullName()}}</td>
                    <td>{{$job->occupation->title}}</td>
                    <td>{{$job->note ? $job->note : '-----'}}</td>
                    <td class="text-center {{$job->uniform == 1 ? 'text-success' : 'text-warning'}} text-center">{!!$job->uniform == 1 ? '<i class="fa fa-2x fa-check"></i>' : '<i class="fa fa-2x fa-times"></i>'!!}</td>
                    <td class="text-center"><span class="badge rounded-pill {{$job->status == 0 ? 'bg-danger' : 'bg-success'}}">{{$job->status == 0 ? 'in progress' : 'completed'}}</span></td>
                    <td class="text-center for-mobile" style="color: rgb(49, 49, 49); font-weight:bold;">{{  date('H:i:s', strtotime($job->start_time)) }}</td>
                    <td class="text-center for-mobile" style="color: rgb(49, 49, 49); font-weight:bold;">{{  date('H:i:s', strtotime($job->end_time)) }}</td>
                    <td class="text-center" style="color: rgb(49, 49, 49); font-weight:bold;">{{$job->amount}}DH</td>
                    <td>
                    <form action="{{route('jobs.delete' , $job->id)}}" method="POST" class="delete-form text-center">
                        @csrf
                        <button type="submit" class="btn btn-danger form-btn-size" onclick="return confirm('Are you sure you want to delete this job?');"><i class="fa fa-trash-alt fa-lg"></i></button>
                    </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="links-jobs-container" class="d-flex justify-content-center mt-5 mb-5">
            {!! $jobs->links() !!}
        </div>

        @else
        <h3 class="else-info"><i class="fa fa-folder-open"></i> There is no completed jobs</h3>
        @endif
        @else
        <h3 class="else-info"><i class="fa fa-folder-open"></i> Select Dates</h3>
        @endif
    </div>
</div>

<script>
    let date = document.querySelectorAll('input[type="date"]')
    let links = document.querySelectorAll('#links-jobs-container nav ul li a.page-link')
    Array.from(links).forEach(link=>{
        link.setAttribute("href",link.getAttribute("href")+"&creation_min_date="+date[0].value+"&creation_max_date="+date[1].value)
    })
</script>

@endsection