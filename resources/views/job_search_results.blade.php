<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job search results</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
  <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
  <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
  <link rel="stylesheet" href="{{asset('css/resultfindjob.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

</head>
<body>
  <!--navbar user-->
@extends('userheader')

@section('cont')

@endsection
 <!--end navbar-->


  <div class="stylebody">
 <div class="container mt-3 mb-4">
 <div class="col-lg-9 mt-4 mt-lg-0">
     <div class="row">
       <div class="col-md-12">
         <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
           <table class="table manage-candidates-top mb-0">
             <thead>
               <tr>
                   @if($jobSearchResults->count()==0)
                       <th style="font-size: 20px;text-align:center;">no results found according to your specifications</th>
                   @else
                 <th style="font-size: 20px;text-align:center;">YOUR JOB SEARCH RESULTS:
                    <!-- <br>
                     <form id="sort" action="/job-search-results" method="get">
                         @csrf
                     <label> sort by: </label>
                 <select name="sortBy" onchange="if (this.selectedIndex){document.getElementById('sort').submit(); return false;};">
                     <option hidden disabled selected value> -- select a way to sort -- </option>
                     <option value="convenient" @if(request()->old('sortBy') == 'convenient') selected @endif>
                         by the most convenient </option>
                     <option value="date" @if(request()->old('sortBy') == 'date') selected @endif >
                         by the latest</option>
                     <option value="salary" @if(request()->old('sortBy') == 'salary') selected @endif>
                         by the highest salary</option>

                 </select>
                     </form>
                     -->
                 </th>
                   @endif
               </tr>
    </thead>
    <tbody>

<!---Rana's edits --->

@foreach($jobSearchResults as $job)
    <tr class="candidates-list">
        <td class="title">
            <div class="thumb">
                <img class="img-fluid" src="{{asset('storage/profiles/'.$job->publishable->profile_thumbnail)}}" alt="">
            </div>
            <div class="candidate-list-details">
                <div class="candidate-list-info">
                    <div class="candidate-list-title">
                        <h5 class="mb-0"><a href="/jobs/{{$job->id}}">Job Title : {{$job->title}}</a></h5>
                    </div>
                    <div class="candidate-list-option">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-filter pr-1"></i>Publisher name : {{$job->publishable->name}}</li>
                            <li><i class="fas fa-map-marker-alt pr-1"></i>@if ($job->remote !=1){{$job->city}},{{$job->country}} @else remote @endif</li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text pr-1" viewBox="0 0 16 16">
                                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                </svg>required skills:
                            @foreach($job->requiredSkills as $skill)
                                @if(!$loop->last)
                                {{$skill->title}} ,
                                    @else
                                        {{$skill->title}} .
                                    @endif
                            @endforeach
                            </li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stack pr-1" viewBox="0 0 16 16">
                                    <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                                    <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                                </svg>required years experience: {{ $job->required_experience }}</li>
                            <li><i class="fa fa-usd pr-1" aria-hidden="true " style="margin-left: 5px"></i>salary: {{$job->salary}}K$</li> <br><br>
                            <li class="alert-success"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-clock-history alert-success" viewBox="0 0 16 16" style="margin-right: 10px">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>published : {{$job->created_at->diffForHumans()}}</li>

                        </ul>
                    </div>
                </div>
            </div>
        </td>

@endforeach



            </div>
        </div>
        </td>

    </tbody>
</table>
         <div class="d-flex justify-content-center">
             {!! $jobSearchResults->links() !!}
         </div>

</div>
     @if($jobSearchResults->count()==0)
         <br> <br> <br> <br> <br> <br> <br><br> <br><br> <br><br> <br><br>
     @endif
</div>
</div>
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
