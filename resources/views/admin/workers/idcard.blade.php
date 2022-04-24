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
                
                <div id="idcard">

                    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
                    <div id="idcard-header">
                        <img src="{{asset('design/inbs.png')}}" alt="logo"/>
                        <div id="idcard-header-bg">
                            <img src="{{asset('design/bg.jpg')}}" alt="bg"/>
                            <div></div>
                        </div>
                        <div id="idcard-header-photo">
                            <img src="{{asset( $worker->photo != null ? $worker->photo :'design/defualt_worker.png')}}"/>
                            <span>{{$worker->fname . ' ' . $worker->lname}}</span>
                        </div>
                    </div>
                    <div id="idcard-main">
                        <div id="idcard-main-info">
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
                        <div id="idcard-main-qrcode">
                            {{QrCode::size(80)->generate(asset('admin/jobs/start/' . $worker->id))}}
                        </div>
                        <div></div>
                    </div>
                    <div id="idcard-footer">
                        www.keytab.tech
                    </div>
                
                    <style>
                        @media screen,print{
                            #idcard{
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
                        #idcard-header{
                            display: flex;
                            background-color: rgb(250 204 21);
                            height: 8rem;
                            position: relative;
                            border-bottom-style: solid;
                            border-bottom-width: 8px;
                            border-bottom-color: rgb(203 213 225);
    
                        }
                        #idcard-header>img{
                            height: 8rem;
                            z-index:10;
                            width: 9rem;
                            padding:1rem;
                        }
                        #idcard-header-bg{
                            width: 100%;
                            position: relative;
                        }
                        #idcard-header-bg>img{
                            position: absolute;
                            top: 0px;
                            width: 100%;
                            height: 100%;
                        }
                        #idcard-header-bg>div{
                            position: absolute;
                            background-color: rgb(250 204 21);
                            top: 0px;
                            width: 100%;
                            height: 100%;
                            opacity: 0.3;
                        }
                        #idcard-header-photo{
                            position: absolute;
                            top: 2.5rem;
                            right: 1.25rem;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }
                        #idcard-header-photo>img{
                            width: 10rem;
                            height: 10rem;
                            border: 1px solid black;
                            border-radius: 0.375rem;
                            border-width: 8px;
                            border-color: rgb(253 224 71);
                            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                        }
                        #idcard-header-photo>span{
                            font-weight: bold;
                            font-size: 1.25rem;
                            line-height: 1.75rem;
                            text-align: center;
                            text-transform: capitalize;
                        }
                        #idcard-main{
                            padding: 0.5rem;
                            height: 7rem;
                            padding-left: 1.25rem;
                            padding-right: 1.25rem;
                            display: flex;
                            width: 100%;
                            background-color: white;
                            margin-top: 0.75rem;
                        }
                        #idcard-main-info{
                            width: 33.333333%;
                            align-self: center;
                        }
                        #idcard-main-info>h3{
                            font-weight: 800;
                            font-size: 0.8rem;
                            line-height: 1rem;
                        }
                        #idcard-main-info>h3>span{
                            font-weight: 400;
                            font-size: 0.80rem;
                            line-height: 0.75rem;
                        }
                        #idcard-main-qrcode{
                            display: flex;
                            align-self: center;
                            justify-self: center;
                            border-style: solid;
                            border-width: 0.15rem;
                            border-radius: 0.125rem;
                            border-color: rgb(148 163 184);
                            padding: 0.25rem;
                        }
                        #idcard-footer{
                            background-color: rgb(234 179 8);
                            padding: 0.45rem;
                            color: white;
                        }
                        }
                        @media (max-width:500px){
                            #idcard-main-info>h3>span{
                                display: block;
                            }
                            
                            #idcard-header-photo{
                                top: 0.4rem;
                            }
                        }
                        @media print{
                            #idcard-main-qrcode{
                                display: flex;
                                align-self: center;
                                justify-self: center;
                                border:none;
                                padding: 0.25rem;
                            }
                            #idcard-main{
                                margin-top: -0.1rem;
                            }
                            #idcard-header>img{
                                transform: scale(0.7);
                            }
                        }
                        #idcard{
                            -webkit-print-color-adjust:exact;
                        }
                    </style>
                </div>

            </div>

            <div class="border-top">
                <div class="card-body">
                <button onclick="printJS('idcard', 'html')" class="btn btn-success text-light">
                    Download ID Card
                </button>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection