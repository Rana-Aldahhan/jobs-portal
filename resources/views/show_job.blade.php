<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$job->title}}</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
  <link rel="stylesheet" href="{{asset('css/orginal.css')}}">

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

    <div class="profile" style="margin-top:35px;align-content: center">
      <img src="{{asset('storage/profiles/'.$job->publishable->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
      <p style="font-size:18px;color:#1784ab ;">{{$job->title}}</p>
    </div>

    <nav class="nav-menu">
      <ul >
       <div >

       <p>
           @if($job->remote !=1)
           {{ucwords($job->city)}} ,{{ucwords($job->country)}}.
           @else
           remote:yes
           @endif
       </p>
       <p class="alert-success" style="color: #1e7e34">posted {{$job->created_at->diffForHumans()}}</p>
       </div>

          <p style="color:red;">
              @if($job->expired )
                 EXPIRED
              @endif
          </p>
<hr>


          @if($show_edit_delete_applicants_buttons)
              <div class="stylego">
                  <a id="update " href="/jobs/{{$job->id}}/applicants" class="editlink">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                      </svg>
                      <h6>Show applicants</h6>
                  </a>
              </div>
          <hr>
              <div class="stylego">
                  <a id="update " href="/jobs/{{$job->id}}/edit" class="editlink">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16" style="margin-right:10px;">
                          <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z"/>
                      </svg>
                      <h6>Edit </h6>
                  </a>
              </div>
          <hr>
              <div class="stylego">
                  <form method="post" action="/jobs/{{$job->id}}/delete" id="delete">
                      @csrf
                      @method('DELETE')
                  <a id="update " href="" class="editlink" onclick="document.getElementById('delete').submit(); return false;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-right:10px;">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                      <h6>Delete</h6>
                  </a>
                  </form>
              </div>
              @if(!$job->expired)
                  <hr>
                  <div class="stylego">
                      <form method="post" action="/jobs/{{$job->id}}/expire" id="expire">
                          @csrf
                          @method('Put')
                          <a id="update " href="" class="editlink" onclick="document.getElementById('expire').submit(); return false;">
                              <i class="fa fa-ban fa-2x" aria-hidden="true" style="color: #9c27b0"></i>
                              <h6>Mark as expired</h6>
                          </a>
                      </form>
                  </div>
              @else
                  <hr>
                  <div class="stylego">
                      <form method="post" action="/jobs/{{$job->id}}/activate" id="activate">
                          @csrf
                          @method('Put')
                          <a id="update " href="" class="editlink" onclick="document.getElementById('activate').submit(); return false;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" style="margin-right:10px;">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                              </svg>
                              <h6>Reactivate job</h6>
                          </a>
                      </form>
                  </div>
              @endif



          @else
              @if($showApplyButton)
                  <div class="stylego">
                      <form method="post" action="/jobs/{{$job->id}}/apply" id="apply">
                          @csrf
                      <a id="update " href="jobs/{{$job->id}}/apply" class="editlink"  onclick="document.getElementById('apply').submit(); return false;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16" style="margin-right:10px;">
                              <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                              <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                          </svg>
                          <h6> Apply</h6>
                      </a>
                      </form>
                  </div>

                  <hr>

              @elseif(!$user->logged_as_company  )
                  <div class="stylego">
                      @if( $showWithDrawApplicationButton)
                      <form method="post" action="/jobs/{{$job->id}}/withdraw-application" id="unapply">
                          @csrf
                          @method("DELETE")
                      <a id="update " href="#" class="editlink" onclick="document.getElementById('unapply').submit(); return false;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16" style="margin-right:10px;">
                              <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                              <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z"/>
                          </svg>
                          <h6> Withdraw application</h6>
                      </a>
                      </form>
                      @elseif(!$job->expired)
                          <a class="candidate-list-favourite order-2 text-dark" >

                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16" style="margin-right:10px;">
                                  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                              </svg>
                              <span class="candidate-list-time order-1" style="color: green">  Application Approved</span>
                          </a>
                      @endif
                  </div>

                  <hr>

              @endif
              @if($showSaveButton)

                      <div class="stylego">
                          <form method="post" action="/jobs/{{$job->id}}/save" id="save">
                              @csrf
                          <a id="update " href="#" class="editlink" onclick="document.getElementById('save').submit(); return false;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16" style="margin-right:10px;">
                                  <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                              </svg>
                              <h6>Add To Saved list</h6>
                          </a>
                          </form>
                      </div>
                      <hr>

                  @elseif(!$user->logged_as_company)

                      <div class="stylego">
                          <form method="post" action="/jobs/{{$job->id}}/unsave" id="unsave">
                              @csrf
                              @method('DELETE')
                          <a id="update " href="" class="editlink" onclick="document.getElementById('unsave').submit(); return false;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16"  style="margin-right:10px;">
                                  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
                              </svg>
                              <h6>Remove from saved list</h6>
                          </a>
                          </form>

                      </div>
                      <hr>

              @endif

          @endif


      </ul>
    </nav><!-- .nav-menu -->
   <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

  </div>
</div><!-- End Header -->


  </div>
  <!--end nav2-->
<!--start about-->

  <div class="col-lg-8 " style="margin-top:150px; margin-left: -60px;">

  <div class="stylechosen">

<h1 style="color:#1784ab ; ">

    {{ucwords($job->title) }} <br> <br>



</h1>
      @auth()
      @if( ($job->publishable_id==auth()->user()->id && $job->publishable_type='App\Models\User' && !auth()->user()->logged_as_company)
           || ($job->publishable_id==auth()->user()->managing_company_id && $job->publishable_type='App\Models\Company' && auth()->user()->logged_as_company))
      <div class="row">
          <div class="col mb-3">
              <div class="form-group">
                  <h6><svg class="octicon octicon-graph UnderlineNav-octicon d-none d-sm-inline" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M1.5 1.75a.75.75 0 00-1.5 0v12.5c0 .414.336.75.75.75h14.5a.75.75 0 000-1.5H1.5V1.75zm14.28 2.53a.75.75 0 00-1.06-1.06L10 7.94 7.53 5.47a.75.75 0 00-1.06 0L3.22 8.72a.75.75 0 001.06 1.06L7 7.06l2.47 2.47a.75.75 0 001.06 0l5.25-5.25z"></path></svg>
                               Your monthly Users reaches :
                  </h6>
                  <br>
                  <div >  number of other unique users reaches :<strong> {{$reachCount}} </strong>unique views.</div><br>




              </div>
          </div>
      </div>
      @endif
      @endauth



          @if(!$job->remote)
          <h6>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>

              {{ucwords($job->city)}} ,{{ucwords($job->country)}}.
              <p></p>
          </h6>

          @else

              <h6 >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                      <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                  </svg>
                  remote:
                    <p style="color: #1d643b">
                        yes.
                    </p>
              </h6>

          @endif

      <h6>

          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16"style="margin-left: 5px">
              <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
          </svg>
          industry:</h6>
      <p>
          {{$job->industry->title}} <br> <br>
      </p>

      <h6>


  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16"style="margin-left: 5px">
    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
  </svg>
  Role:</h6>
<p>
   {{$job->role}} <br> <br>
</p>

<h6>


    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-journal-text pr-1" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
        </svg>
    Required Skills:</h6>
<p >
    @foreach($job->requiredSkills as $skill)
        @if(!$loop->last)
            {{ $skill->title   }}  ,
        @else
            {{ $skill->title   }} .
        @endif
    @endforeach <br><br>
</p>


<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-stack pr-1" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
        <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
        </svg>
    Required Years of  Experience:</h6>
<p >
    {{$job->required_experience}} <br><br>
</p>


<h6>
    <i class="fa fa-usd pr-1" aria-hidden="true " style="margin-left: 5px"></i>
    Salary:</h6>
<p >
    {{$job->salary}} k$
</p>

<h6>
    <i class="fa fa-bus" aria-hidden="true"style="margin-left: 5px"></i>
    Transport Availabilitly:</h6>
<p >
  @if($job->transportation == 1)
      availabe
    @else
    not available.
    @endif
</p>
      <br><br>

<h6>
    <i class="fa fa-long-arrow-right" aria-hidden="true"style="margin-left: 5px"></i>
    Type Of The Position:</h6>
<p >
    {{$job->typeOfPosition->name}}  <br><br>
</p>

<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
      </svg>
    Job Description:</h6>
<p >
  {{$job->description}}
</p>

     <br><hr>

      <section id="contact"  class="contact">
          <div class="container">
          <h6>

              <i class="fa fa-address-card-o" aria-hidden="true"style="margin-left: 5px"></i>
              About the job publisher:</h6>
              <br>
          <div class="info">
          <div class="profile" >
              <img src="{{asset('storage/profiles/'.$job->publishable->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle" style="width:250px ; height:250px ;">
          </div>
          <p>

              <a href="@if($job->publishable_type=='App\Models\User') \users\{{$job->publishable_id}} @else \companies\{{$job->publishable_id}} @endif">
          <h3> {{$job->publishable->name }} <br> </h3>
          </a>
          {{$job->publishable->about}} <br> <br>

          </p>


          <h6>Industry:
          <p >
              @if(!is_null($job->publishable->industry))
                  {{$job->publishable->industry->title}}
              @endif
          </p>
          </h6>

          </div>
          </div>



          <section id="contact" class="contact">
              <div class="container">

                  <h4>Contact The Publisher:</h4>
                  <div class="info">

                      <div class="address">
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                          <h4>Location:</h4>
                          <p>{{$job->publishable->city}} , {{$job->publishable->country}}</p>
                      </div>

                      <div class="email">
                          <i class="fa fa-envelope-o" aria-hidden="true"></i>
                          <h4>Email:</h4>
                          <p>{{$job->publishable->email}}</p>
                      </div>

                      <div class="phone">
                          <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                          <h4>Call:</h4>
                          <p>{{$job->publishable->phone_number}}</p>
                      </div>

                  </div>
              </div>
          </section>
      </section>



</div>
  </div>

<!--end-->
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
