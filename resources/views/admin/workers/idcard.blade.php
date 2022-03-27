@extends('admin.layout.app')

{{-- Page Title --}}
@section('title') {{$worker->fullName()}} @endsection
{{-- Section Name --}}
@section('section_name') {{$worker->fullName()}} @endsection



<script src="{{asset('js/print.min.js')}}"></script>

{{-- Page Main Content --}}
@section('content')
<div class="col-md-9 worker-edit">
    <div class="card pt-3 pb-2">
        <div class="row">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">ID Card {{$worker->fullName()}}</h4>
                
                <div id="card">

                    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
                    <div id="card-header">
                        <img src="{{asset('design/icon.png')}}" alt="logo"/>
                        <div id="card-header-bg">
                            <img src="{{asset('design/bg.jpg')}}" alt="bg"/>
                            <div></div>
                        </div>
                        <div id="card-header-photo">
                            <img src="{{asset( $worker->photo != null ? $worker->photo :'design/defualt_worker.png')}}"/>
                            <span>{{$worker->fname . ' ' . $worker->lname}}</span>
                        </div>
                    </div>
                    <div id="card-main">
                        <div id="card-main-info">
                            <h3>
                                <span>CIN : </span>
                                {{$worker->id_number}}
                            </h3>
                            <h3>
                                <span>Date : </span>
                                {{$worker->due_date}}
                            </h3>
                            <h3>
                                <span>Phone : </span>
                                {{$worker->phone}}
                            </h3>
                        </div>
                        <div id="card-main-qrcode">
                            {{QrCode::size(80)->generate(asset('admin/jobs/start/' . $worker->id))}}
                        </div>
                        <div></div>
                    </div>
                    <div id="card-footer">
                        www.keytab.tech
                    </div>
                
                    <style>
                        #card{
                            max-width: 500px;
                            width: 100%;
                            border-style: solid;
                            border-width: 2px;
                            border-color: rgb(148 163 184);
                            border-radius: 0.5rem; 
                            overflow: hidden;
                            height: 18rem;
                            margin: 0.5rem;
                            background-color: rgb(250 204 21);
                        }
                        #card-header{
                            display: flex;
                            background-color: rgb(250 204 21);
                            height: 8rem;
                            position: relative;
                            border-bottom-style: solid;
                            border-bottom-width: 8px;
                            border-bottom-color: rgb(203 213 225);
    
                        }
                        #card-header>img{
                            height: 8rem;
                            z-index:10;
                            width: 9rem;
                            padding:1rem;
                        }
                        #card-header-bg{
                            width: 100%;
                            position: relative;
                        }
                        #card-header-bg>img{
                            position: absolute;
                            top: 0px;
                            width: 100%;
                            height: 100%;
                        }
                        #card-header-bg>div{
                            position: absolute;
                            background-color: rgb(250 204 21);
                            top: 0px;
                            width: 100%;
                            height: 100%;
                            opacity: 0.3;
                        }
                        #card-header-photo{
                            position: absolute;
                            top: 2.5rem;
                            right: 1.25rem;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }
                        #card-header-photo>img{
                            width: 7rem;
                            height: 7rem;
                            border: 1px solid black;
                            border-radius: 0.375rem;
                            border-width: 8px;
                            border-color: rgb(253 224 71);
                            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                        }
                        #card-header-photo>span{
                            font-weight: bold;
                            font-size: 1.25rem;
                            line-height: 1.75rem;
                            text-align: center;
                            text-transform: capitalize;
                        }
                        #card-main{
                            padding: 0.5rem;
                            height: 7rem;
                            padding-left: 1.25rem;
                            padding-right: 1.25rem;
                            display: flex;
                            width: 100%;
                            background-color: white;
                            margin-top: 0.75rem;
                        }
                        #card-main-info{
                            width: 33.333333%;
                            align-self: center;
                        }
                        #card-main-info>h3{
                            font-weight: 800;
                            font-size: 0.8rem;
                            line-height: 1rem;
                        }
                        #card-main-info>h3>span{
                            font-weight: 400;
                            font-size: 0.80rem;
                            line-height: 0.75rem;
                        }
                        #card-main-qrcode{
                            display: flex;
                            align-self: center;
                            justify-self: center;
                            border: 1px solid black;
                            border-width: 0.15rem;
                            border-radius: 0.125rem;
                            border-color: rgb(148 163 184);
                            padding: 0.25rem;
                        }
                        #card-footer{
                            background-color: rgb(234 179 8);
                            padding: 0.45rem;
                            color: white;
                        }
                        @media (max-width:500px){
                            #card-main-info>h3>span{
                                display: block;
                            }
                            
                            #card-header-photo{
                                top: 0.4rem;
                            }
                        }
                    </style>
                </div>

            </div>

            <div class="border-top">
                <div class="card-body">
                <button onclick="printJS('card', 'html')" class="btn btn-success text-light">
                    Download ID Card
                </button>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection