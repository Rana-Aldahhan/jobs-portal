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
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>

<!--navbar user-->
@extends('userheader')

@section('include')

@endsection

<!--end navbar-->
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">

        <div class="col-md-8 col-xl-10 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <a href="/users/{{$messagedUser->id}}">
                            <img src="{{asset('/storage/profiles/'.$messagedUser->profile_thumbnail)}}" class="rounded-circle user_img">
                            </a>
                                <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span>Messages with {{$messagedUser->name}}</span>
                            <p>{{$messages->count()}} Messages</p>
                        </div>

                    </div>
                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                    <div class="action_menu">
                        <ul>
                            <a href="/users/{{$messagedUser->id}}">
                            <li><i class="fas fa-user-circle"></i> View user  profile</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card-body msg_card_body">
                @foreach($messages as $message)
                    @if($message->sendable_type == 'App\Models\User') <!-- on left -->

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="{{asset('storage/profiles/'.$messagedUser->profile_thumbnail)}}" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer" @if(!$message->seen)style="background-color:#876bd9;"@endif>
                                {{$message->body}}
                                <span class="msg_time">{{$message->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                        @else
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    {{$message->body}}
                                    <span class="msg_time_send">{{$message->created_at->diffForHumans()}}</span>
                                </div>

                                <div class="img_cont_msg">
                                    <img src="{{asset('/storage/profiles/'.$company->profile_thumbnail)}}"  class="rounded-circle user_img_msg">
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>


                <form action="/users/{{$messagedUser->id}}/messages" method="post" id="send">
                    <div class="card-footer">
                        <div class="input-group">

                            <textarea name="messageBody" class="form-control type_msg" placeholder="Type your message..."> </textarea>
                            <div class="input-group-append">

                                @csrf
                                <a href="" style="color: aliceblue" onclick="document.getElementById('send').submit(); return false;">
                                    <i class="fas fa-location-arrow fa-2x"style="color:white ;margin-top:10px" ></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

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
