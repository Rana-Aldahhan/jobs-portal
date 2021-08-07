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
  <link rel="stylesheet" href="{{asset('css/approvecomp.css')}}">


  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<!--navbar comp-->
@extends('userheader')

@section('include')

@endsection
  <!--end navbar-->
   <!--**********************************************************************************-->
   <!--start approve comp-->
<div class="styleapprove">
    <div class="container profile">
        <div class="col-md-9">
            <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>The Applicants For ({{$job->title}}) job: ( published {{$job->created_at->diffForHumans()}})</h2>
                <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>

            </div>
                <p><br></p>
            <div class="panel-body">
                @foreach($applicants as $applicant)
                    @if($loop->index %2 == 0 )
                <div class="row">
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border">
                            <img class="rounded-x" src="{{asset('storage/profiles/'.$applicant->profile_thumbnail)}}" alt="">
                            <div class="name-location">
                                <a href="/users/{{$applicant->id}}"> <strong>{{$applicant->name}}</strong></a>
                                <span><i class="fa fa-map-marker"></i>{{ucwords($applicant->country)}},{{ucwords($applicant->city)}}</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>{{$applicant->about}}</p>
                            <hr>
                            @if(!$job->expired)
                                <ul class="list-inline share-list">
                                    <li>
                                        <form  method="post" action="/jobs/{{$job->id}}/applicants/{{$applicant->id}}" id="approve{{$loop->index}}">
                                            @csrf
                                            @method('PUT')
                                            <a href="#" onclick="document.getElementById('approve{{$loop->index}}').submit(); return false;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg> Approve</a>
                                        </form>
                                    </li>
                                    <li>            </li>

                                    <li>
                                        <form  method="post" action="/jobs/{{$job->id}}/applicants/{{$applicant->id}}" id="ignore{{$loop->index}}">
                                            @csrf
                                            @method("DELETE")
                                            <a href="#" style="color: red" onclick="document.getElementById('ignore{{$loop->index}}').submit(); return false;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>Ignore</a>
                                        </form></li>
                                </ul>
                            @endif
                            @if($applicant->appliedJobs()->find($job->id)->pivot->approved)
                                <li> <a style="color: #1e7e34"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1e7e34" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg> Approved</a></li>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border">
                            <img class="rounded-x" src="{{asset('storage/profiles/'.$applicant->profile_thumbnail)}}" alt="">
                            <div class="name-location">
                                <a href="/users/{{$applicant->id}}"> <strong>{{$applicant->name}}</strong></a>
                                <span><i class="fa fa-map-marker"></i>{{ucwords($applicant->country)}},{{ucwords($applicant->city)}}</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            <p>{{$applicant->about}}</p>
                            <hr>
                            <ul class="list-inline share-list">
                                @if(!$job->expired)
                                    <ul class="list-inline share-list">
                                        <li>
                                            <form  method="post" action="/jobs/{{$job->id}}/applicants/{{$applicant->id}}" id="approve{{$loop->index}}">
                                                @csrf
                                                @method('PUT')
                                                <a href="#" onclick="document.getElementById('approve{{$loop->index}}').submit(); return false;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg> Approve</a>
                                            </form>
                                        </li>
                                        <li>            </li>

                                        <li>
                                            <form  method="post" action="/jobs/{{$job->id}}/applicants/{{$applicant->id}}" id="ignore{{$loop->index}}">
                                                @csrf
                                                @method("DELETE")
                                                <a href="#" style="color: red" onclick="document.getElementById('ignore{{$loop->index}}').submit(); return false;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>Ignore</a>
                                            </form></li>
                                    </ul>
                            @endif
                            @if($applicant->appliedJobs()->find($job->id)->pivot->approved)
                                        <li> <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg> Approved</a></li>
                            @endif
                        </div>
                    </div>
                </div>
                    @endif
                    @if($loop->last && $loop->index%2 == 0)
                        </div>
                    @endif
                @endforeach
                <br><br><br><br><br><br><br><br>



            </div>
        </div>
        </div>
    </div>
</div>

 <!--end approve comp-->

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
