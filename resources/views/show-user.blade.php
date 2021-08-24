<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->name}}</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/searchresults.css')}}">
    <link rel="stylesheet" href="{{asset('css/explore.css')}}">
    <link rel="stylesheet" href="{{asset('css/companysjobs.css')}}">
    @auth()
        @if(!auth()->user()->logged_as_company)
            <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">
        @endif
    @endauth
    @guest()
        <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    @endguest

</head>
<body>

<!--navbar user-->
@extends('userheader')

@section('cont')

@endsection

<!--end navbar-->

<!--start -->

<div class="container">
    <div class="row" >
        <!--start nav2-->


        <div class="col-lg-4  "style="margin-top:90px;">
            <div id="div" >
                <div class="d-flex flex-column" >

                    <div class="profile">
                        <a href="{{asset('storage/profiles/'.$user->profile_thumbnail)}}">
                            <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                        </a>
                        <h1 class="text-light"><a href="index.html">{{$user->name}}</a></h1>

                    </div>

                    <nav class="nav-menu">
                        <ul>
                            <div>


                                <p>@if($user->current_job_title != null || $user->current_company_name != null )
                                    {{$user->current_job_title}} at  {{$user->current_company_name}} <br>
                                    @endif
                                    @if($user->city != null || $user->country!=null)
                                    {{$user->country}}, {{$user->city}}
                                    @endif
                                </p>

                                <p style=" @if($user->looking_for_job) color:#548235; @else color:#e57373; @endif" >
                                    Status: @if($user->looking_for_job) looking for a job @else not looking for a job @endif </p>
                            </div>
                            <hr>


                            <div class="stylereport">
                                <a id="update " href="/users/{{$user->id}}/report" class="editlink">
                                    <i class="fa fa-flag fa-2x" style="color:#e53935;"></i>
                                    <h6> Report</h6>
                                </a>
                            </div>
                            <hr>

                            @if($showAddColleagues)
                            <div class="stylego">
                                <form id="addcolleague" method="post" action="/user/{{$user->id}}/add-colleague">
                                    @csrf
                                <a id="update " href="" class="editlink" onclick="document.getElementById('addcolleague').submit(); return false;" >
                                    <i class="fa fa-user-plus fa-2x"></i>
                                    <h6> Add as a Colleague</h6>
                                </a>
                                </form>
                            </div>
                            <hr>
                            @endif

                            @if($showCancelRequest)
                            <div class="stylego">
                                <form id="cancelrequest" method="post" action="/user/{{$user->id}}/cancel-colleague-request">
                                    @csrf
                                    @method("DELETE")
                                <a id="update " href="" class="editlink" onclick="document.getElementById('cancelrequest').submit(); return false;" >
                                    <i class="fa fa-user-times fa-2x" aria-hidden="true"></i>
                                    <h6> cancel colleague request </h6>
                                </a>
                                </form>
                            </div>
                            <hr>
                            @endif

                            @if($showApproveRequest)
                            <div class="stylego">
                                <form id="approverequest" method="post" action="/user/{{$user->id}}/approve-colleague">
                                    @csrf
                                    @method("PUT")
                                <a id="update " href="" class="editlink" onclick="document.getElementById('approverequest').submit(); return false;">
                                    <i class="fa fa-user-plus fa-2x"></i>
                                    <h6> approve colleague request </h6>
                                </a>
                                </form>
                            </div>
                            <hr>
                            @endif

                            @if($showIgnoreRequest)
                            <div class="stylego">
                                <form id="ignorerequest" method="post" action="/user/{{$user->id}}/ignore-colleague">
                                    @csrf
                                    @method("DELETE")
                                <a id="update " href="" class="editlink" onclick="document.getElementById('ignorerequest').submit(); return false;">
                                    <i class="fa fa-user-times fa-2x" aria-hidden="true"></i>
                                    <h6> ignore colleague request </h6>
                                </a>
                                </form>
                            </div>
                            <hr>
                            @endif

                            @if($showMessage)
                                <div class="stylego">
                                        <a id="update " href="/users/{{$user->id}}/messages" class="editlink" >

                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                            </svg>
                                            <h6> Message</h6>
                                        </a>
                                </div>
                                <hr>
                            @endif

                            @if(!$showIgnoreRequest && !$showApproveRequest && !$showCancelRequest && !$showAddColleagues
                                && !$loggedUser->logged_as_company)
                                <div class="stylego">

                                        <a id="update "  class="editlink" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                            <h6> you are two colleagues </h6>
                                        </a>
                                </div>
                                <hr>
                            @endif





                        </ul>
                    </nav><!-- .nav-menu -->
                    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

                </div>
            </div><!-- End Header -->


        </div>
        <!--end nav2-->
        <!--start about-->

        <div class="col-lg-8 " style="margin-top:150px;">
            <div class="container">
                <div class="styleabout">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($user->about != null)
                    <h4>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        About:</h4>

                    <p class="">
                        {{$user->about}}
                    </p>
                            <hr>
                        @endif

                        @if($user->school != null || $user->skills->count()!=0 || $user->industry != null ||
                       $user->years_of_experience != null || $user->languages->count()!=0 || $user->resume != null   )
                        <h4>Education and experience:</h4>
                        @endif



                        @if($user->school != null)
                            <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                                <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                            </svg> Studied at :
                       </h6>
                        <p>{{$user->school->name}} @endif</p>

                        @if($user->skills->count()!=0)
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16" style="margin-right: 10px">
                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                        </svg>
                        Skills:</h6>

                    <p>
                        @foreach($user->skills as $skill)
                            @if(!$loop->last)
                                {{ $skill->title   }}  ,
                            @else
                                {{ $skill->title   }} .
                            @endif
                        @endforeach
                    </p>
                        @endif

                        @if($user->industry != null)
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" >
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                        Field:</h6>

                    <p>
                        @if($user->industry !=null)
                        {{$user->Industry->title}}
                        @endif
                    </p>
                        @endif

                        @if($user->years_of_experience != null)
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" >
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                        Work Experience:</h6>

                    <p>
                        {{$user->years_of_experience}} years.
                    </p>
                        @endif

                        @if($user->languages->count()!=0)
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-emoji-wink-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM7 6.5C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zM4.285 9.567a.5.5 0 0 0-.183.683A4.498 4.498 0 0 0 8 12.5a4.5 4.5 0 0 0 3.898-2.25.5.5 0 1 0-.866-.5A3.498 3.498 0 0 1 8 11.5a3.498 3.498 0 0 1-3.032-1.75.5.5 0 0 0-.683-.183zm5.152-3.31a.5.5 0 0 0-.874.486c.33.595.958 1.007 1.687 1.007.73 0 1.356-.412 1.687-1.007a.5.5 0 0 0-.874-.486.934.934 0 0 1-.813.493.934.934 0 0 1-.813-.493z"/>
                            </svg>
                            Languages:</h6>
                        <p>
                            @foreach($user->languages as $language)

                                @if(!$loop->last)
                                    {{ $language->name   }},
                                @else
                                    {{ $language->name   }} .
                                @endif
                            @endforeach
                        </p>
                        @endif

                        @if($user->resume != null)
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" >
                                <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                            Resume:</h6>

                        <p>  <a href="{{asset('storage/resumes/'.$user->resume)}}">
                                view resume
                            </a>
                        </p>
                        @endif
                        <hr>

                        @if($user->workPlaces->count()!=0)
                        <div class="row">
                        <div class="col mb-3">
                            <div class="form-group">
                                <h4><span class="glyphicon glyphicon-thumbs-up">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg> Previous working places </span>
                                </h4>
                                <br>
                                @foreach ($user->workPlaces as $workplace)
                                    <div class="col">
                                        <p>
                                            Worked at :  {{ $workplace->company_name }} as : {{$workplace->pivot->user_job_title}} , from ( {{$workplace->pivot->started_at}} ) to  ( {{$workplace->pivot->ended_at}} ).
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                        @endif




                    <h4 style=" padding-top:20px; font-weight: 600;">Colleagues:</h4>


                    @if($colleagues->count()>0)
                        @foreach($colleagues as $colleague)
                        <!--start1-->
                        <div class="card cardColleague"  >
                            <a id="update" href="#" class="editlink">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="/users/{{$colleague->id}}">
                                                <img src="{{asset('storage/profiles/'.$colleague->profile_thumbnail)}}" class="media-object imgmed"  >
                                                </a>
                                            </div>


                                            <div class="media-body">
                                                <a href="/users/{{$colleague->id}}">
                                                <h5 class="media-heading">{{$colleague->name}}</h5>
                                                </a>
                                                <p>{{$colleague->current_job_title}} <br>
                                                    {{$colleague->city}} , {{$colleague->country}}</p>

                                                <h6 class="media-heading" style="margin-top: -30px">About :</h6>
                                                <p style="margin-top: -15px;"> {{$colleague->about}}</p>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        @endforeach

                            <div class="d-flex justify-content-center">
                                {!! $colleagues->links()!!}
                            </div>


                    @else
                        <p> this user has no colleagues on this site yet!</p>
                    @endif


                    <!--end1-->




<hr>

                    <!-- published jobs start -->
                    <h4 style=" ; padding-top:20px; font-weight: 600;">{{$user->name}}'s published jobs:</h4>
                        <br>
                    @foreach ($userPublishedJobs as  $job)

                        <!--start-->
                            <a id="update" href="/jobs/{{$job->id}}" >
                            <div class="card cardColleague"  >
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="media">
                                                <div class="media-left">
                                                        <img class=" media-object imgmed" src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="">
                                                </div>


                                                <div class="candidate-list-title">

                                                </div>
                                                <div class="candidate-list-option">
                                                    <h5 class="mb-0"><a href="/jobs/{{$job->id}}">{{ $job->title }}</a></h5>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fas fa-filter pr-1"></i>Publisher: {{$job->publishable->name}}</li>
                                                        <li><i class="fas fa-map-marker-alt pr-1"></i> @if($job->remote) remote @else {{$job->city}} , {{$job->country}} @endif </li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text pr-1" viewBox="0 0 16 16">
                                                                <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                            </svg>required skills:
                                                            @foreach($job->requiredSkills as $skill)
                                                                @if(!$loop->last)
                                                                    {{ $skill->title   }}  ,
                                                                @else
                                                                    {{ $skill->title   }} .
                                                                @endif
                                                            @endforeach
                                                        </li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stack pr-1" viewBox="0 0 16 16">
                                                                <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                                                                <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                                                            </svg>required experience: {{$job->required_experience}}</li>
                                                        <li><i class="fa fa-usd pr-1" aria-hidden="true " style="margin-left: 5px"></i>salary: {{$job->salary}}</li>
                                                        <li>
                                                            Published {{$job->created_at->diffForHumans()}}
                                                        </li>
                                                        @if($job->expired)
                                                            <li style="color: red">EXPIRED</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            </a>

                        <!--end-->
                    @endforeach
                            @if($userPublishedJobs->count() !=0)
                            <div class="d-flex justify-content-center" style="margin-top: 10px">
                                {!! $userPublishedJobs->links()!!}
                            </div>
                        @else
                                this user doesn't have any published freelancer yet!
                        @endif
                            <!--published jobs end-->
                            <br><hr><br>


                    <h4 style="font-weight: 600;">Contact Info:</h4>


                </div>
                <section id="contact" class="contact">
                    <div class="container">


                        <div class="info">
                            @if($user->city != null || $user->country!=null)
                            <div class="address">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h4>Location:</h4>
                                <p>{{ucwords($user->city)}} , {{ucwords($user->country)}}</p>
                            </div>
                            @endif

                            <div class="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h4>Email:</h4>
                                <p>{{$user->email}}</p>
                            </div>
                                @if($user->phone_number != null )
                            <div class="phone">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                <h4>Call:</h4>
                                <p>{{$user->phone_number}}</p>
                            </div>
                                @endif

                        </div>
                    </div>
                </section>



            </div>
        </div>
        <!--end about-->

    </div>

    <!--end-->
</div>
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
