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
  Companies Search Results:
  </div>
</div>

<!--start search results-->

<!--start company-->
@if($searchResults->count()!=0)
    @foreach($searchResults as $company)
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
    <p>{{$company->industry->title}}, {{$company->count_of_employees}}
        {{$company->city}} , {{$company->country}}</p>

        <h5 class="media-heading">About the Company :</h5>
    <p>{{$company->about}}.</p>


  </div>
</div>


</div>
</div>
  </a>
</div>
</div>
    @endforeach
<!-- end  company-->
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
    <p> there is no company found with the name you have entered! </p>


  </div>
</div>


</div>
</div>
  </a>
</div>
</div>
</div>
<!-- end  company2-->
@endif
</div>

<!--end search results-->


<!--start pagination-->

<nav aria-label="Page navigation example" class="page">
  <ul class="pagination"style="margin-left:20px;">
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
