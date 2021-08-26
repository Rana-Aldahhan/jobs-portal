<!DOCTYPE html>
<html>
<head>
    <title>Manage reports</title>

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
<div class="container-fluid h-100" style="margin-top: 50px; margin-bottom: 70px">

    <div class="row justify-content-center h-100">

        <div class="col-md-6 col-xl-5 chat"><div class="card mb-sm-3 mb-md-0 contacts_card b1">
                <h4 class="styleh">company reports</h4>
                <p   style="text-align: center;" >companies are sorted by the most reported</p>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        @foreach($reportedCompanies as $company)
                            <li class="">
                                <a href="/manage-reports/companies/{{$company->id}}">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" class="rounded-circle user_img">

                                        </div>
                                        <div class="user_info">
                                            <span>{{$company->name}}</span>
                                            <p style="color:#5a6067;">{{$company->incomingReports->count()}} reports on this company</p>

                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-5 chat"><div class="card mb-sm-3 mb-md-0 contacts_card b1">
                <h4 class="styleh">user reports</h4>
                <p   style="text-align: center;" >companies are sorted by the most reported</p>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        @foreach($reportedUsers as $user)
                            <li>
                                <a href="/manage-reports/users/{{$user->id}}">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" class="rounded-circle user_img">

                                        </div>
                                        <div class="user_info">
                                            <span>{{$user->name}}</span>
                                            <p style="color:#5a6067;">{{$user->incomingReports->count()}} reports on this user</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div></div>

    </div>
    <p>


    </p>


</div>
@extends('footeruser')
@section('con')
@endsection




<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</Script>
</body>

</html>
