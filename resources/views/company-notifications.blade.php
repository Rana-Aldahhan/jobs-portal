<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/explore.css')}}">
    <link rel="stylesheet" href="{{asset('css/noticomp.css')}}">

</head>
<body>

<!--navbar comp-->
@extends('userheader')

@section('include')

@endsection
<!--end navbar-->
<!--**********************************************************************************-->
<!--start -->
<div class="container">
    <div class="row" >
        <!--start nav2-->

        <div class="col-sm-2  "style="margin-top:80px;">

            <div id="div">
                <div class="profile">
                    <a href="/company-profile">
                        <img src="{{asset('storage/profiles/'.auth()->user()->managingCompany->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                    </a>

                </div>

                <div class="container">
                    <nav class="nav flex-column ">
                        <a class="nav-link " href="/company-notifications"style="color:red;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifications

                        </a>
                        <hr>
                        <a class="nav-link " href="/company-messeging">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Messaging
                        </a>


                    </nav>
                </div>

            </div><!-- End Header -->


        </div>
        <!--end nav2-->

        <div class="col-sm-10 " style="margin-top:130px;">
            <div class="container">
                <h4>Notifications:</h4>

                <div class="card cardnoti" style="width: 50rem; margin-left:20px;margin-top:30px;margin-bottom:30px">
                    <ul class="list-group list-group-flush   styleiconnot">
                        <hr>
                        @foreach($notifications as $notification)
                            <li class="list-group-item" @if(!$notification->seen)style="background-color:#cedbde" @endif>
                                <a class="nav-link" href="{{$notification->notification_url}}">
                                    @if($notification->type == 'message')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16" style="color:#455A64;">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                        </svg>
                                    @elseif($notification->type == 'colleague')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16" style="color:#455A64;">
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    @elseif($notification->type == 'new job')
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    @elseif($notification->type == 'approved')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color:#455A64;">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                    @elseif($notification->type == 'applicant')
                                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                    @endif

                                    {{$notification->body}}
                                </a>
                            </li>
                        @endforeach
                        @if($notifications->count() == 0)
                            <li class="list-group-item">
                                <p>You received no notification yet !</p>
                            </li>
                        @endif

                        <hr>
                    </ul>

                </div>
                <div class="d-flex justify-content-center">
                    {!! $notifications->links()!!}
                </div>
                <br> <br> <br><br> <br> <br><br> <br> <br>

                <!---end noti-->
            </div>
        </div>

    </div>


</div>
@php

    auth()->user()->managingCompany->notifications->map(function ($notification) {
          $notification->seen=true;
          return $notification->save();
      })

@endphp

<!-- ======= Footer ======= -->

@extends('footeruser')

@section('con')

@endsection


<!-- End #footer -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>




</body>
</html>
