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
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
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
                        <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                        <h1 class="text-light"><a href="index.html">{{$company->name}}</a></h1>

                    </div>

                    <nav class="nav-menu">
                        <ul>
                            <div>

                                <p>{{$company->industry->title}}.<br>
                                    emplyees count : {{$company->employees_count}} .<br>
                                    {{$company->city}} ,{{$company->country}}.<br>
                                    {{$company->slogan}}
                                </p>
                            </div>
                            <hr>
                            @if($showReportButton)
                                <div class="stylereport">
                                    <a id="update " href="/companies/{{$company->id}}/report" class="editlink">
                                        <i class="fa fa-flag fa-2x" style="color:#e53935;"></i>
                                        <h6> Report</h6>
                                    </a>
                                </div>

                                <hr>
                            @endif

                            @if(!is_null($company->website_url))
                                <div class="stylego">
                                    <a id="update " href="{{$company->website_url}}" class="editlink">
                                        <i class="fa fa-share fa-2x" aria-hidden="true"></i>
                                        <h6> Go to Website</h6>
                                    </a>
                                </div>

                                <hr>
                            @endif

                            @if( $showNotifyButton)
                                <form method="post" action="/companies/{{$company->id}}" id="getnotified">
                                    @csrf
                                <div class="stylego">
                                    <a id="update " href="" class="editlink" onclick="document.getElementById('getnotified').submit(); return false;">
                                        <i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>
                                        <h6>Get Job Notification of this Company</h6>
                                    </a>
                                </div>
                                </form>
                                <hr>
                            @else <!-- case stop notification-->
                            <form method="post" action="/companies/{{$company->id}}" id="stopnotification">
                                @csrf
                                @method('DELETE')
                                <div class="stylego">
                                    <a id="update " href="#" class="editlink" onclick="document.getElementById('stopnotification').submit(); return false;">
                                        <i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>
                                        <h6>stop getting job Notification of this Company</h6>
                                    </a>
                                </div>
                            </form>
                                <hr>
                            @endif

                            @if($showMessageButton)
                                <div class="stylego">
                                    <a id="update " href="#" class="editlink">
                                        <i class="fa fa-bell-o fa-2x" aria-hidden="true"></i>
                                        <h6>Message</h6>
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

            <div class="styleabout">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <h4>About this Company:</h4>

                <p class="pabout">
                    {{$company->about}}
                </p>
                <h4>Certificate:</h4>
                <a href="{{asset('storage/certificates/'.$company->certificate)}}"> open certificate</a>
                <h6 class="styleh">Company's Available Job opportunities:</h6>

            </div>

            @if($company->publishedJobs->count()!=0)
            @foreach($company->publishedJobs as $job)
            <!--start1-->
            <div class="card cardppp"  >
                <a id="update" href="/jobs/{{$job->id}}" class="editlink">
                    <div class="card-body">

                        <div class="container">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" class="media-object imgmed" >
                                </div>


                                <div class="media-body">
                                    <h5 class="media-heading">{{$job->title}}</h5>
                                    <p>
                                        @if($job->remote)
                                            remote
                                        @else
                                        {{$job->city}} , {{$job->country}}
                                        @endif
                                    </p>
                                    <h5 class="media-heading">required skills :</h5>
                                    @foreach($job->requiredSkills as $skill)
                                        {{$skill->title}} ,
                                    @endforeach
                                    <h5 class="media-heading">required experience :</h5>
                                    <p>
                                        {{$job->required_experience}}
                                    </p>
                                    <h5 class="media-heading">salary :</h5>
                                    <p>
                                        {{$job->salary}}
                                    </p>
                                    <h5 class="media-heading">published at:</h5>
                                    <p>
                                        {{$job->created_at->diffForHumans()}}
                                    </p>


                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <!--end1-->
            @endforeach
            @else
            <!--start2-->
            <div class="card cardppp"  >
                <a id="update" href="#" class="editlink">
                    <div class="card-body">
                        <div class="container">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('img/images.png')}}" class="media-object imgmed" >
                                </div>


                                <div class="media-body">


                                    <h5 class="media-heading"></h5>
                                    <p> there is no jobs published for this company</p>


                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>

            <!--end2-->
            @endif

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

            <div class="styleabout">

                <h6 class="styleh">Our Employees:</h6>

            </div>
            @foreach($company->employees as $employee)
            <!--start1employee-->
            <div class="card cardppp" >
                <a id="update" href="/users/{{$employee->id}}" class="editlink">
                    <div class="card-body">
                        <div class="container">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('storage/profiles/'.$employee->profile_thumbnail)}}" class="media-object imgmed" >
                                </div>


                                <div class="media-body">
                                    <h5 class="media-heading">{{$employee->name}}</h5>
                                    <p>{{$employee->current_job_title}}.
                                        <br>
                                        {{$employee->city}} , {{$employee->country}}</p>

                                    <h5 class="media-heading">About :</h5>
                                    <p> {{$employee->about}}</p>


                                </div>
                            </div>


                        </div>
                    </div>
                </a>
            </div>
            <!--end1employee-->
            @endforeach

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
