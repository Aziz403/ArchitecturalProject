@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') Home @endsection
{{-- Section Name --}}
@section('section_name') Home @endsection

{{-- Page Main Content --}}
@section('content')

  <!-- chartjs files -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  {{-- <script src="{{asset('charts-setup.js')}}"></script> --}}
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <a href="{{route('workers.index')}}" class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-cyan text-center">
            <h1 class="font-light text-white">
              <i class="mdi mdi-worker"></i>
            </h1>
            <h6 class="text-white">Workers</h6>
          </div>
        </div>
      </a>
      <!-- Column -->
      <a href="#Charst" class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-info text-center">
            <h1 class="font-light text-white">
              <i class="mdi mdi-chart-areaspline"></i>
            </h1>
            <h6 class="text-white">Charts</h6>
          </div>
        </div>
      </a>
      <!-- Column -->
      <a href="{{route('jobs.in_progress')}}" class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-warning text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-hourglass-half"></i>
            </h1>
            <h6 class="text-white">In Progress</h6>
          </div>
        </div>
      </a>
      <!-- Column -->
      <a href="{{route('jobs.completed')}}" class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-success text-center">
            <h1 class="font-light text-white">
              <i class="fa fa-check-circle"></i>
            </h1>
            <h6 class="text-white">Completed</h6>
          </div>
        </div>
      </a>
      <!-- Column -->
      <a href="#Calnedra" class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
          <div class="box bg-primary text-center">
            <h1 class="font-light text-white">
              <i class="mdi mdi-calendar-check"></i>
            </h1>
            <h6 class="text-white">Calnedra</h6>
          </div>
        </div>
      </a>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-12">
        <div id="Calnedra" class="card">
          <div class="card-body">
            <div class="d-md-flex align-items-center">
              <div>
                <h4 class="card-title">Calnedra</h4>
                <h5 class="card-subtitle">Overview of Latest Month</h5>
              </div>
            </div>
            <div class="row">
              @include('admin.home.calendar')
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    <div id="Charts" class="row">
      @include('admin.home.charts')
    </div>
<div id="ww_5780f7974352c" v='1.20' loc='id' a='{"t":"responsive","lang":"fr","ids":["wl68"],"cl_bkg":"rgba(64,81,137,1)","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","sl_tof":"7","sl_sot":"celsius","sl_ics":"one_a","font":"Arial","cl_odd":"#0000000a"}'><a href="https://weatherwidget.org/fr/" id="ww_5780f7974352c_u" target="_blank">Widget météo HTML pour site Web par Weatherwidget.org</a></div><script async src="https://srv2.weatherwidget.org/js/?id=ww_5780f7974352c"></script>    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->





@endsection