<!DOCTYPE html>
<html>
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

<div class="container-fluid h-100" style="margin-top: 50px; margin-bottom: 60px">
    <div class="row justify-content-center h-100">



        <div class="col  col-xl-3  " style="margin-top:40px; margin-left: 30px ">


            <div id="div">
                <div class="profile">
                    <a href="/profile">
                        <img src="{{asset('storage/profiles/'.auth()->user()->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                    </a>

                </div>

                <!-- .nav-menu -->
                <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

                <div class="container">
                    <nav class="nav flex-column ">


                        <a class="nav-link" href="/saved-jobs" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                            </svg>
                            Saved List
                        </a>


                        <a class="nav-link" href="published-jobs" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-post-fill" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1 0-1zm0 3h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            My Published Jobs
                        </a>


                        <a class="nav-link" href="/applied-jobs">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>

                            My Jobs Applications
                        </a>

                        <a class="nav-link " href="/notifications">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            My Notification

                        </a>

                        <a class="nav-link " href="/messeging" style="color:red;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Messaging
                        </a>

                    </nav>
                </div>

            </div>

        </div>




        <div class="col-md-4 col-xl-4 chat" style="margin-left: -50px"><div class="card mb-sm-3 mb-md-0 contacts_card">

                <div class="card-body contacts_body">
                <h4 class="styleh" style="margin-top: 20px">Companies you can message</h4>


                    <ul class="contacts">
                        <br><br>
                        @foreach($messegingCompanies as $company)
                        <li class=" active">
                            <a href="/companies/{{$company->id}}/messages">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img  class="rounded-circle user_img" src="{{asset('/storage/profiles/'.$company->profile_thumbnail)}}">

                                </div>
                                <div class="user_info">
                                    <span>{{$company->name}}</span>
                                    <p>@if($user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')
                                    ->where('seen',0)->count() >0)
                                            <span style="background-color: red;color: antiquewhite;font-size:12px">
                                            {{$user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')
                                    ->where('seen',0)->count()}} new messages </span><br>
                                            {{$user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')->get()->last()->body}}
                                           , {{$user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')->get()->last()->created_at->diffForHumans()}}
                                         @else @if($user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')->get()->last() !=null)
                                            {{$user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')->get()->last()->body}} ,
                                            {{$user->receivedMessages()->where('sendable_id',$company->id)->where('sendable_type','App\Models\Company')->get()->last()->created_at->diffForHumans()}}
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
                        @if($messegingCompanies->count()==0)
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>There is no companies you can message yet!</span>
                                        </div>
                                    </div>
                                </li>
                                <br> <br><br>
                        @endif

                    </ul>
                </div>

                <div class="card-footer"></div>
            </div></div>


        <div class="col-md-4 col-xl-4 chat" >
            <div class="card mb-sm-3 mb-md-0 contacts_card" >







                <div class="card-body contacts_body">
                    <h4 class="styleh" style="margin-top: 20px">Users you can message</h4>

                    <ul class="contacts">
                        <br><br>
                        @foreach($messegingUsers as $messagedUser)
                            <li class="active" >
                                <a href="/users/{{$messagedUser->id}}/messages">
                                    <div class="d-flex bd-highlight" >
                                        <div class="img_cont" >
                                            <img src="{{asset('storage/profiles/'.$messagedUser->profile_thumbnail)}}"  class="rounded-circle user_img">

                                        </div>
                                        <div class="user_info">

                                            <span href="/users/{{$messagedUser->id}}/messages">{{$messagedUser->name}}</span>
                                            <p >@if($user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')
                                    ->where('seen',0)->count() >0)
                                                    <span style="background-color: red;color: antiquewhite;font-size:12px">
                                                    {{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')
                                            ->where('seen',0)->count()}}  new messages </span><br>
                                                    {{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->body}}
                                                    , {{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->created_at->diffForHumans()}}
                                                @else
                                                    @if($user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last() !=null)
                                                    {{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->body}} ,
                                                    {{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')->get()->last()->created_at->diffForHumans()}}
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

            </div>
        </div>

    </div>


@extends('footeruser')
@section('con')
@endsection
</div>
<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</script>

</body>
</html>
