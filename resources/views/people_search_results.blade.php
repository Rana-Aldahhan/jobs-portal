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
  <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
  <link rel="stylesheet" href="{{asset('css/searchresults.css')}}">
  <link rel="stylesheet" href="{{asset('css/explore.css')}}">


</head>
<body>


<!--navbar user-->
@extends('userheader')

  @section('cont')

  @endsection
   <!--end navbar-->




<div class="card cardsearch">
  <div class="card-body bbb">
  People Search Results:
  </div>
</div>

<!--start search results-->

<!--start people-->

@if($searchResults->count()!=0)
    <div class="container">
        <div class="card cardppp" style="margin-top: 80px"  >
            <div class="card-body">

            @foreach($searchResults as $user)



    <a id="update" href="/users/{{$user->id}}" class="editlink">


<div class="container">
<div class="media">
  <div class="media-left">
    <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" class="media-object imgmed" >
  </div>


  <div class="media-body">
    <h5 class="media-heading">{{$user->name}}</h5>
    <p>{{$user->current_job_title}} ,
        {{$user->city }}, {{$user->country}}</p>

        <h5 class="media-heading">About this user:</h5>
    <p> {{$user->about}}</p>


  </div>
</div>


</div>

  </a>
                @if(!$loop->last)
             <hr >
                    @endif

<!-- end  people-->
    @endforeach
            </div>
        </div>
    </div>
 @else
<!--start company2-->

<div class="container">

<div class="card cardppp" >
  <a id="update" href="#" class="editlink">
  <div class="card-body">
<div class="container">
<div class="media">
  <div class="media-left">

  </div>


  <div class="media-body">
    <h5 class="media-heading"></h5>

        <h5 class="media-heading"></h5>
    <p> there is no user found with the name you have entered! </p>


  </div>
</div>


</div>
</div>
</a>
</div>


</div>
<!-- end  company2-->
</div>
@endif

<!--end search results-->


<!--start pagination-->

<div class="d-flex justify-content-center">
    {!! $searchResults->links()!!}
</div>

<div>
    <br><br><br><br><br><br><br>
</div>

<!--end pagination-->
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
