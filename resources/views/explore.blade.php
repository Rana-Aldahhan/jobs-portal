<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/explore.css')}}">


</head>
<body>


<!--navbar user-->


@extends('userheader')

@section('cont')

@endsection
<!--end navbar-->


<div class="jumbotron jumbotron-fluid jumb" >
    <div class="container">
        <h5 class="display-4">You Can Explore Companies and People </h5>

    </div>
</div>




<!--start company search-->

<div class="styleexp">
    <div class="container">

        <div class="row">

            <div class="col .col-12">

                <div class="card caedhh border-light mb-3" style="max-width: 40rem; margin-left:40px;">



                    <div class="card-header">  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                        </svg> Explore Companies</div>

                    <div class="card-body text-info">
                        <form id="companysearch" method="get" action="/explore/company-search-results">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="companySearchName">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" style="background-color: #30363b" type="submit" onclick="document.getElementById('companysearch').submit(); return false;">
                                        <i class="fa fa-search"style="color:white"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<!-- Left-aligned -->
<div class="container">
    <div class="card"style="margin-top:10px;width: 57rem;margin-left:60px; ">
        <div class="card-body">
            <form action="/explore" id="companyfield">
                <div class="row">
                    <div class="col-7">
                        <label for="field">Choose a Field:</label>
                        <select id="field" name="companyIndustry" >
                            <option hidden disabled selected value> --- select an industry --- </option>
                            @foreach($industries as $industry)
                                @if(!is_null(request()->input('companyIndustry')))
                                    <option value="{{$industry->id}}" @if($industry->id == request()->input('companyIndustry')) selected @endif>{{$industry->title}}</option>
                                @else
                                    <option value="{{$industry->id}}">{{$industry->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <button id="submit" type="submit" class="btn btn-outline-danger  btnform" onclick="document.getElementById('companyfield').submit(); return false;">show recommendations</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!--start company-->
@if($recomendedCompanies->count()!=0)
@foreach($recomendedCompanies as $company)
<div class="container">

    <div class="card cardppp"  >
        <a id="update" href="/companies/{{$company->id}}" class="editlink">
            <div class="card-body">


                <div class="container">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" class="media-object imgmed" >
                        </div>


                        <div class="media-body">
                            <h5 class="media-heading">{{$company->name}}</h5>
                            <p>{{$company->industry->title }}, {{$company->count_of_employees}}
                                {{$company->city}} ,{{$company->country}}</p>

                            <h5 class="media-heading">About the Company :</h5>
                            <p> {{$company->about}}</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>

</div>
<div class="d-flex justify-content-center">
    {!! $recomendedCompanies->links() !!}
</div>
@endforeach
@else
    <div class="container">

        <div class="card cardppp"  >
            <a id="update"  class="editlink">
                <div class="card-body">


                    <div class="container">
                        <div class="media">
                                <h5 class="media-heading"></h5>
                                <p>
                                    No recommendations found for companies !</p>

                            </div>
                        </div>
                    </div>
            </a>
        </div>

    </div>
<!-- end  company-->

@endif
<!--end company search-->

<!--start people search-->


<div class="styleexp">
    <div class="container">

        <div class="row">

            <div class="col .col-12">

                <div class="card caedhh border-light mb-3" style="max-width: 50rem;margin-left:40px;">

                    <div class="card-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                        Explore People</div>

                    <div class="card-body text-info">
                        <form id="peoplesearch" method="get" action="/explore/people-search-results">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="peopleSearchName" >
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"
                                            style="background-color: #30363b"
                                            onclick="document.getElementById('peoplesearch').submit(); return false;">
                                        <i class="fa fa-search"style="color:white"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card"style="margin-top:10px;width: 57rem;margin-left:60px; ">
        <div class="card-body">
            <form action="/explore" id="userfield">
                <div class="row">
                    <div class="col-7">
                        <label for="field">Choose a Field:</label>
                        <select id="field" name="peopleIndustry" >
                            <option hidden disabled selected value> --- select an industry --- </option>
                            @foreach($industries as $industry)
                                @if(!is_null(request()->input('peopleIndustry')))
                                    <option value="{{$industry->id}}" @if($industry->id == request()->input('peopleIndustry')) selected @endif>{{$industry->title}}</option>
                                @else
                                    <option value="{{$industry->id}}">{{$industry->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        <br>
                        <label for="fname">People Education:</label>
                        <input type="text" id="fname" name="peopleEducation" style="margin-top: 20px" value="{{request()->input('peopleEducation')}}">
                    </div>
                    <div class="col-5">
                        <button id="submit" type="submit" class="btn btn-outline-danger  btnform"
                                onclick="document.getElementById('userfield').submit(); return false;">show recommendations</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!--start people-->
@if($recomendedPeople->count()!=0)
@foreach($recomendedPeople as $user)
<div class="container">
    <div class="card cardppp">
        <a id="update" href="\users\{{$user->id}}" class="editlink">
            <div class="card-body">
                <div class="container">

                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" class="media-object imgmed" >
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">{{$user->name}}</h5>
                            <p>{{$user->current_job_title}} ,
                                {{ $user->city}} , {{$user->country}}</p>

                            <h5 class="media-heading">About this user:</h5>
                            <p> {{$user->about}}.</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>
</div>
<div class="d-flex justify-content-center">
    {!! $recomendedPeople->links() !!}
</div>
@endforeach
<!-- end  people-->
@else
<div class="container">
    <div class="card cardppp">
        <a id="update" href="#" class="editlink">
            <div class="card-body">
                <div class="container">
                    <div class="media">
                        <div class="media-left">

                        </div>


                        <div class="media-body">

                            <p>  No recommendations found for other users !</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
@endif
<!-- end  people2-->
</div>
<!--end people search-->


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
