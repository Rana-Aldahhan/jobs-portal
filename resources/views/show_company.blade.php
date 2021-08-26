<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$company->name}}</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
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
                                    emplyees count : {{number_format($company->employees_count,0)}} .<br>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-bell-slash" viewBox="0 0 16 16">
                                            <path d="M5.164 14H15c-.299-.199-.557-.553-.78-1-.9-1.8-1.22-5.12-1.22-6 0-.264-.02-.523-.06-.776l-.938.938c.02.708.157 2.154.457 3.58.161.767.377 1.566.663 2.258H6.164l-1 1zm5.581-9.91a3.986 3.986 0 0 0-1.948-1.01L8 2.917l-.797.161A4.002 4.002 0 0 0 4 7c0 .628-.134 2.197-.459 3.742-.05.238-.105.479-.166.718l-1.653 1.653c.02-.037.04-.074.059-.113C2.679 11.2 3 7.88 3 7c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0c.942.19 1.788.645 2.457 1.284l-.707.707zM10 15a2 2 0 1 1-4 0h4zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75L.625 15.625z"/>
                                        </svg>
                                        <h6>stop getting job Notification of this Company</h6>
                                    </a>
                                </div>
                            </form>
                                <hr>
                            @endif

                            @if($showMessageButton)
                                <div class="stylego">
                                    <a id="update " href="#" class="editlink">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
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

                <p class="">
                    {{$company->about}}
                </p>
                    <hr>
                    @if($company->certificate !=null)
                <h4>Certificate:</h4>
                <a href="{{asset('storage/certificates/'.$company->certificate)}}"> open certificate</a>
                    @endif
                    <br>
                    <hr>
                <h4 class="">{{$company->name}}'s Available Job opportunities:</h4>

            </div>

            @if($company->publishedJobs->count()!=0)
            @foreach($companyJobs as $job)
            <!--start1-->
            <div class="card cardColleague " >
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
                                    <h5 class="media-heading">required skills :
                                    @foreach($job->requiredSkills as $skill)
                                            @if(!$loop->last)
                                                {{ $skill->title   }}  ,
                                            @else
                                                {{ $skill->title   }} .
                                            @endif
                                    @endforeach
                                    </h5>
                                    <h5 class="media-heading">required experience :
                                        {{$job->required_experience}}
                                    </h5>
                                    <h5 class="media-heading">salary :

                                        {{$job->salary}}  K$
                                    </h5>
                                    <h5 class="media-heading">published at:
                                        {{$job->created_at->diffForHumans()}}
                                    </h5>
                                    @if($job->expired)
                                            <h6 style="color: red">EXPIRED</h6>
                                        @endif


                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <!--end1-->

            @endforeach
                <br>
                <div class="d-flex justify-content-center">
                    {!! $companyJobs->links()!!}
                </div>
            @else
            <!--start2-->
            <div class="card cardColleague"  >
                <a id="update" href="#" class="editlink">
                    <div class="card-body">
                        <div class="container">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{asset('img/images.png')}}" class="media-object imgmed" >
                                </div>


                                <div class="media-body">


                                    <h5 class="media-heading"></h5>
                                    <p> there is no jobs published for this company </p>


                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>

            <!--end2-->
            @endif


            <br><hr>

            <div class="styleabout" >

                <h4 class="">{{$company->name}}'s Employees in this site:</h4>

            </div>
            @foreach($company->employees as $employee)
            <!--start1employee-->
            <div class="card cardColleague" >
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
            @if($company->employees->count()==0)
                <p>
                    no employees of our company is in this site yet!
                </p>
            @else
            <!--start pagination-->
                <div class="d-flex justify-content-center">
                    {!! $companyEmployees->links()!!}
                </div>
                <!--end pagination-->
            @endif
            <br><br>

            <h4 class="styleabout">Contact {{$company->name}} :</h4>
            <section id="contact" class="contact">
                <div class="container">


                    <div class="info">
                        @if($company->city != null || $company->country!=null)
                            <div class="address">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h4>Location:</h4>
                                <p>{{ucwords($company->city)}} , {{ucwords($company->country)}}</p>
                            </div>
                        @endif

                        <div class="email">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Email:</h4>
                            <p>{{$company->email}}</p>
                        </div>
                        @if($company->phone_number != null )
                            <div class="phone">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                <h4>Call:</h4>
                                <p>{{$company->phone_number}}</p>
                            </div>
                        @endif
                            @if($company->website_url != null )
                                <div class="phone">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <h4>Website:</h4>
                                    <a href="{{$company->website_url}}"><p>{{$company->website_url}}</p>
                                    </a>

                                </div>
                            @endif

                    </div>
                </div>
            </section>






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
