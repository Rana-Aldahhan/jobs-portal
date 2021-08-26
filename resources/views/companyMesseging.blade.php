<!DOCTYPE html>
<html class="companyBody">
<head>
    <title>Messaging</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/companymessaging.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body class="companyBody">

<!--navbar user-->
@extends('userheader')

@section('include')

@endsection

<!--end navbar-->
<!--start nav2-->
<div class="container">
    <div class="row">


        <div class="col-sm-2  "style="margin-top:80px;">

            <div id="div">
                <div class="profile">
                    <a href="/company-profile">
                        <img src="{{asset('storage/profiles/'.auth()->user()->managingCompany->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                    </a>

                </div>

                <div class="container">
                    <nav class="nav flex-column ">
                        <a class="nav-link " href="/company-notifications">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifications

                        </a>
                        <hr>
                        <a class="nav-link " href="/company-messeging" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Messaging
                        </a>


                    </nav>
                </div>

            </div><!-- End Header -->


        </div>
        <div class="col-lg-10 sp1 " style="padding-left: 50px">
        <div class="container-fluid h-100" style="margin-top: 50px;margin-bottom: 100px">
            <div class="row justify-content-center h-100">
                <div class="col-md-4 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">

                        <div class="card-header">

                        </div>
                        <h4 class="styleh" style="color: white;margin-left: -30px">Users you can message</h4>
                        <div class="card-body contacts_body">
                            @foreach($messegingUsers as $messagedUser)
                                <li class="active" >
                                    <a href="/users/{{$messagedUser->id}}/messages">
                                        <div class="d-flex bd-highlight" >
                                            <div class="img_cont" style="margin-bottom: 20px; margin-left: 5px" >
                                                <img src="{{asset('storage/profiles/'.$messagedUser->profile_thumbnail)}}"  class="rounded-circle user_img">

                                            </div>
                                            <div class="user_info">

                                                <span href="/users/{{$messagedUser->id}}/messages">{{$messagedUser->name}}</span>
                                                <p>@if($company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')
                                        ->where('seen',0)->count() >0)
                                                        <span style="background-color: red;color: antiquewhite;font-size:12px">
                                                {{$company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')
                                        ->where('seen',0)->count()}} new messages </span> <br>
                                                        {{$company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->body}} ,
                                                        {{$company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->created_at->diffForHumans()}}
                                                    @else @if($company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last() !=null)
                                                            {{$company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->body}} ,
                                                            {{$company->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->created_at->diffForHumans()}}
                                                        @else
                                                            no messages yet!
                                                        @endif
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            @if($messegingUsers->count()==0)
                                <br> <br>
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>There is no users you can message yet!</span>
                                        </div>
                                    </div>
                                </li>
                                <br> <br><br>
                                @endif
                                </ul>
                        </div>
                        <div class="card-footer"></div>
                    </div></div>

            </div>
        </div>
        </div>
    </div>
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
</script>

</body>
</html>
