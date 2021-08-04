<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>

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
@extends('headerwithsigin')

@section('cont')

@endsection

<!--end navbar-->

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">


                <h4 class="styleh">companyies you can message</h4>
                <br>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        @foreach($messegingCompanies as $company)
                        <li class="active">
                            <a href="/companies/{{$company->id}}/messages">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img  class="rounded-circle user_img" src="{{asset('/storage/profiles/'.$company->profile_thumbnail)}}">

                                </div>
                                <div class="user_info">
                                    <span>{{$company->name}}</span>
                                    <p>{{$user->receivedMessages()
                                        ->where(['sendable_id','sendable_type','seen'],[$company->id,'App\Models\Company',0])
                                        ->count()}}
                                        new messages</p>
                                </div>
                            </div>
                            </a>
                        </li>
                        @endforeach
                        @if($messegingCompanies->count()==0)
                                <br> <br>
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


                    <h4 class="styleh">Users you can message</h4>

                    <ul class="contacts">
                        @foreach($messegingUsers as $messagedUser)
                        <li class="active" >
                            <a href="/users/{{$messagedUser->id}}/messages">
                            <div class="d-flex bd-highlight" >
                                <div class="img_cont" >
                                    <img src="{{asset('storage/profiles/'.$messagedUser->profile_thumbnail)}}"  class="rounded-circle user_img">

                                </div>
                                <div class="user_info">

                                    <span href="/users/{{$messagedUser->id}}/messages">{{$messagedUser->name}}</span>
                                    <p>{{$user->receivedMessages()->where('sendable_id',$messagedUser->id)->where('sendable_type','App\Models\User')
                                    ->where('seen',0)->count()}}
                                        new messages</p>
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

<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</script>

</body>
</html>
