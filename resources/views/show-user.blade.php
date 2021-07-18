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
            <div id="div">
                <div class="d-flex flex-column">

                    <div class="profile">
                        <a href="{{asset('storage/profiles/'.$user->profile_thumbnail)}}">
                            <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                        </a>
                        <h1 class="text-light"><a href="index.html">{{$user->name}}</a></h1>

                    </div>

                    <nav class="nav-menu">
                        <ul>
                            <div>

                                <p>Job Title :{{$user->current_job_title}} at  {{$user->current_company_name}} <br>
                                    {{$user->country}}, {{$user->city}}
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
                                    <i class="fa fa-user-plus fa-2x"></i>
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
                                    <i class="fa fa-user-plus fa-2x"></i>
                                    <h6> ignore colleague request </h6>
                                </a>
                                </form>
                            </div>
                            <hr>
                            @endif

                            @if($showMessage)
                                <div class="stylego">
                                        <a id="update " href="/users/{{$user->id}}/messages" class="editlink" >
                                            <i class="fa fa-user-plus fa-2x"></i>
                                            <h6> Message</h6>
                                        </a>
                                </div>
                                <hr>
                            @endif

                            @if(!$showIgnoreRequest && !$showApproveRequest && !$showCancelRequest && !$showAddColleagues)
                                <div class="stylego">

                                        <a id="update "  class="editlink" >
                                            <i class="fa fa-user-plus fa-2x"></i>
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
                    <h4>About:</h4>

                    <p class="pabout">
                        {{$user->about}}
                    </p>


                    <h6> @if($user->school != null)Studied at :{{$user->school->name}} @endif</h6>

                    <h6>Skills:</h6>

                    <p>
                        @foreach($user->skills as $skill)
                            {{$skill->title}}
                            <br>
                        @endforeach
                    </p>

                    <h6>Field:</h6>

                    <p>
                        @if($user->industry !=null)
                        {{$user->Industry->title}}
                        @endif
                    </p>

                    <h6>Experience:</h6>

                    <p>
                        {{$user->years_of_experience}}
                    </p>


                    <h6>Languages:</h6>
                    <p>
                        @foreach($user->languages as $language)
                            {{$language->name}}
                            <br>
                        @endforeach
                    </p>


                    <h5 style=" color:#757575; padding-top:20px; font-weight: 600;">Colleagues:</h5>


                    @if($colleagues->count()>0)
                        @foreach($colleagues as $colleague)
                        <!--start1-->
                        <div class="card cardppp"  >
                            <a id="update" href="#" class="editlink">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="/users/{{$colleague->id}}">
                                                <img src="{{asset('storage/profiles/'.$colleague->profile_thumbnail)}}" class="media-object imgmed" >
                                                </a>
                                            </div>


                                            <div class="media-body">
                                                <a href="/users/{{$colleague->id}}">
                                                <h5 class="media-heading">{{$colleague->name}}</h5>
                                                </a>
                                                <p>{{$colleague->current_job_title}} <br>
                                                    {{$colleague->city}} , {{$colleague->country}}</p>

                                                <h6 class="media-heading">About :</h6>
                                                <p> {{$colleague->about}}</p>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        @endforeach
                    @else
                        <p> this user has no colleagues yet!</p>
                    @endif


                    <!--end1-->




                    <!--start pagination-->

                    <nav aria-label="Page navigation example" class="page" style="margin-left:5px;">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!--end pagination-->

                    <h6>Resume:</h6>

                    <p> </p>

                    <hr>
                    <!-- published jobs start -->
                    <h5 style=" color:#757575; padding-top:20px; font-weight: 600;">{{$user->name}}'s published jobs:</h5>
                    @foreach ($user->publishedJobs as  $job)

                        <tr class="candidates-list">
                            <td class="title">
                                <div class="thumb">
                                    <img class=" media-object imgmed" src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="">
                                </div>
                                <div class="candidate-list-details">
                                    <div class="candidate-list-info">
                                        <div class="candidate-list-title">
                                            <h5 class="mb-0"><a href="/jobs/{{$job->id}}">{{ $job->title }}</a></h5>
                                        </div>
                                        <div class="candidate-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-filter pr-1"></i>Publisher: {{$job->publishable->name}}</li>
                                                <li><i class="fas fa-map-marker-alt pr-1"></i> @if($job->remote) remote @else {{$job->city}} , {{$job->country}} @endif </li>
                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text pr-1" viewBox="0 0 16 16">
                                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                                    </svg>required skills:
                                                    @foreach($job->requiredSkills as $skill)
                                                        {{ $skill->title }} ,
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                    @endforeach
                            <!--published jobs end-->

                    <h6 style="font-weight: 600;">Contact Info:</h6>


                </div>
                <section id="contact" class="contact">
                    <div class="container">


                        <div class="info">
                            <div class="address">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h4>Location:</h4>
                                <p>{{ucwords($user->city)}} , {{ucwords($user->country)}}</p>
                            </div>

                            <div class="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h4>Email:</h4>
                                <p>{{$user->email}}</p>
                            </div>

                            <div class="phone">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                <h4>Call:</h4>
                                <p>{{$user->phone_number}}</p>
                            </div>

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
