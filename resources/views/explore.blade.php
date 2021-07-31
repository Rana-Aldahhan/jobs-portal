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
    <link rel="stylesheet" href="{{asset('css/explore.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">

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

                    <img src="{{asset('img/person_auto_x2.png')}}" alt="Person With Blue Shirt"style="margin-top-130px;height:200px;width:200px">

                    <div class="card-header">Explore Companies</div>

                    <div class="card-body text-info">
                        <form id="companysearch" method="get" action="/explore/company-search-results">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="companySearchName">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit" onclick="document.getElementById('companysearch').submit(); return false;">
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
@if(is_null(auth()->user()))
<div class="container">
    <div class="card"style="margin-top:10px;width: 40rem;margin-left:70px">
        <div class="card-body">
            <form action="/explore" id="companyfield">
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
                <button id="submit" type="submit" class="btn btn-outline-danger  btnform"style="margin-left:300px" onclick="document.getElementById('companyfield').submit(); return false;">show recommendations</button>
            </form>
        </div>
    </div>
</div>
@endif
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
                    <img src="{{asset('img/person_auto_x2.png')}}" alt="Person With Blue Shirt"style="margin-top-130px;height:200px;width:200px">
                    <div class="card-header">Explore People</div>

                    <div class="card-body text-info">
                        <form id="peoplesearch" method="get" action="/explore/people-search-results">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="peopleSearchName" >
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"  onclick="document.getElementById('peoplesearch').submit(); return false;">
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

@if(is_null(auth()->user()))
<!-- Left-aligned -->
<div class="container">
    <div class="card"style="margin-top:10px;width: 40rem;margin-left:70px">
        <div class="card-body">
            <form action="/explore" id="userfield">
                <label for="fname">People Education:</label>
                <input type="text" id="fname" name="peopleEducation" value="{{request()->input('peopleEducation')}}">
                <br>
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
                <button id="submit" type="submit" class="btn btn-outline-danger  btnform"style="margin-left:300px" onclick="document.getElementById('userfield').submit(); return false;">show recommendations</button>
            </form>
        </div>
    </div>
</div>
@endif

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
                            <h5 class="media-heading">About this person</h5>
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
