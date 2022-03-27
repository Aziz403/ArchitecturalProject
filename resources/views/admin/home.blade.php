@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Home @endsection
{{-- Section Name --}}
@section('section_name') Home @endsection

{{-- Page Main Content --}}
@section('content')

<div class="row mt-5">
  <div class="row d-flex justify-content-center">
    <!-- Column -->
      <div class="card card-hover"  style="width: 180px;">
        <a href="{{route('workers.index')}}">
          <div class="box bg-info text-center">
            <h1 class="font-light text-white">
              <i class="mdi mdi-worker"></i>
            </h1>
            <h6 class="text-white">Workers</h6>
          </div>
        </a>
      </div>
    <!-- Column -->
      <div class="card card-hover" style="width: 180px;">
        <a href="{{route('jobs.in_progress')}}">
          <div class="box bg-danger text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-hourglass-half"></i>
            </h1>
            <h6 class="text-white">in progress</h6>
          </div>
        </a>
      </div>
    <!-- Column -->
    <!-- Column -->
      <div class="card card-hover" style="width: 180px;">
        <a href="{{route('jobs.completed')}}">
          <div class="box bg-cyan text-center">
            <h1 class="font-light text-white">
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 40px;height:40px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
            </h1>
            <h6 class="text-white">completed</h6>
          </div>
        </a>
      </div>
  </div>


    
  <div class="row d-flex justify-content-center">
    <!-- Column -->
      <div class="card card-hover" style="width: 180px;">
        <a href="{{route('occupations.index')}}">
          <div class="box bg-cyan text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-id-card-alt"></i>
            </h1>
            <h6 class="text-white">occupations</h6>
          </div>
        </a>
      </div>
    <!-- Column -->
      <div class="card card-hover" style="width: 180px;">
        <a href="{{route('admin.profile')}}">
          <div class="box text-center" style="background: #8e44ad;">
            <h1 class="font-light text-white">
              <i class="fa fa-user"></i>
            </h1>
            <h6 class="text-white">Profile</h6>
          </div>
        </a>
      </div>
    <!-- Column -->
      <div class="card card-hover" style="width: 180px;">
        <a href="{{route('admin.logout')}}">
          <div class="box bg-warning text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-power-off"></i>
            </h1>
            <h6 class="text-white">Logout</h6>
          </div>
        </a>
      </div>
    <!-- Column -->
  </div>
</div>


@endsection