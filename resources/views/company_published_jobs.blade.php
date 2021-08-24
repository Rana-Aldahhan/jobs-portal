<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Published Jobs</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">


    <link rel="stylesheet" href="{{asset('css/mypublishedjobs.css')}}">






</head>
<body>


<!--navbar comp-->
@extends('userheader')

@section('include')

@endsection
<!--end navbar-->



<br><br>
<div class="styleform">
    <div class="container">
        <div style="padding-top: 130px">
            @if($publishedJobs->count()!=0)
                <h2 style="text-align: center;" >All job opportunities published by this company</h2>
            @else
                <h2 style="text-align: center;" > No job opportunities has been published by this company yet!
                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> </h2>

            @endif
            <br>


            @foreach($publishedJobs as $job)
                <div class="card w-75" style="margin-left: 150px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-sm-auto mb-3">
                             <img src="{{asset('storage/profiles/'.$job->publishable->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                            </div>


                            <div class="col-lg-6 col-sm-auto mb-3">

                                <a class="nav-link" href="/jobs/{{$job->id}}"> <h5 class="card-title">{{$job->title}}</h5> </a>
                                @if($job->expired)
                                    <p class="text-danger" > EXPIRED </p>
                                @endif

                                <p class="card-text">Publisher : {{$company->name}} <br>@if($job->remote==1) Remote : yes.@else {{$job->city}},{{$job->country}} @endif
                                    <br><br> required skills:
                                    @foreach($job->requiredSkills as $skill)
                                        {{ $skill->title }} ,
                                    @endforeach

                                    <br>Required experience:
                                    {{$job->required_experience}} years<br>Salary: {{$job->salary}} K$<br><br>published {{$job->created_at->diffForHumans()}}

                            </div>
                            <div class="col-lg-4 col-sm-auto mb-3">
                                <a class="nav-link" href="/jobs/{{$job->id}}/edit">
                                    <label> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                            <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
                                        </svg>Edit</label>
                                </a>
                                <hr>
                                <form method="post" action="/jobs/{{$job->id}}/delete" id="delete{{$loop->index}}">
                                    @csrf
                                    @method('DELETE')
                                    <a  class="nav-link" href="" onclick="document.getElementById('delete{{$loop->index}}').submit(); return false;" >
                                        <label> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>Delete</label>
                                    </a>
                                </form>
                                <hr>
                                <a class="nav-link" href="/jobs/{{$job->id}}/applicants">
                                    <label> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                        </svg>view applicants</label>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach

            @if($publishedJobs->count()!=0)
                    <div class="d-flex justify-content-center">
                        {!! $publishedJobs->links()!!}
                    </div>
            @endif


            <br>

        </div>
    </div>
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
