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

<div class="container-fluid h-100" style="margin-top: 50px;margin-bottom: 100px">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">

                <div class="card-header">

                </div>
                <h4 class="styleh">Users you can message</h4>
                <div class="card-body contacts_body">
                    @foreach($messegingUsers as $messagedUser)
                        <li class="active" >
                            <a href="/users/{{$messagedUser->id}}/messages">
                                <div class="d-flex bd-highlight" >
                                    <div class="img_cont" >
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
