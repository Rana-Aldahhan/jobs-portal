<!DOCTYPE html>
<html>
<head>
    <title>Reports on {{$reportedCompany->name}}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>




    <link rel="stylesheet" href="{{asset('css/manage.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">





    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>



<!--navbar user-->
@extends('userheader')

@section('cont')

@endsection

<!--end navbar-->
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <h4 class="styleh">company reports</h4>

                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class="">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <a href="/companies/{{$reportedCompany->id}}">
                                        <img src="{{asset('storage/profiles/'.$reportedCompany->profile_thumbnail)}}" class="rounded-circle user_img">
                                    </a>

                                </div>
                                <div class="user_info">
                                    <span><a href="/companies/{{$reportedCompany->id}}">
                                            {{$reportedCompany->name }}
                                        </a> <br> {{$reportedCompany->incomingReports->count()}} report on this company.</span>

                                </div>
                                <form action="/manage-reports/companies/{{$reportedCompany->id}}/delete" method="post" id="blockcompany">
                                    @csrf
                                    @method('DELETE')
                                <button type="button" class="btn btn-info" style="margin-left: 200px"
                                        onclick="document.getElementById('blockcompany').submit(); return false;">
                                    block company</button>
                                </form>
                            </div>

                        </li>


                        @foreach($reports as $report)
                            <li>
                                <div class="card w-75 " style="height: 150px">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-4 col-sm-auto mb-3">
                                                <div class="img_cont">
                                                    <a href="/users/{{$report->sendable->id}}">
                                                    <img src="{{asset('storage/profiles/'.$report->sendable->profile_thumbnail)}}" class="rounded-circle user_img">
                                                    </a>
                                                    <p> </p>
                                                </div>

                                            </div>
                                            <div class="col-lg-4 col-sm-auto mb-3">
                                                <p>reporter name :{{$report->sendable->name}}
                                                    <br>report reason : {{$report->reason}}
                                                    <br>report infomation: {{$report->information}}
                                                    <br> report sent {{$report->created_at->diffForHumans()}}
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div></div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</Script>
</body>
</html>
