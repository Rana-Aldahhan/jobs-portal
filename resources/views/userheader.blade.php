<!--navbar user-->
@yield('cont')

@if(!(Auth :: check()))
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icons-mobile"> <i class="fa fa-bars" aria-hidden="true"></i>

      </span>
    </button>
    <img src="{{asset('img/bluelogo.png')}}" class="logo">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav  mr-auto "  >
        <li class="nav-item   ">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
<a class="nav-link " href="/explore"  >Explore</a>
        </li>

          <li class="nav-item">
            <a class="nav-link" href="/job-search">Customized job search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/create-job">Create a new job</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/create-company">Create a company account</a>
          </li>

      </ul>
        <a href="{{ route('register') }}" ><button type="button " class="btn btn-outline-info bttn "style="color:#fff" >Register</button> </a>
        <a href="{{ route('login') }}" ><button type="button" class="btn btn-outline-info bttn"style="color:#fff">Log in </button></a>
    </div>
  </nav>


<!-- End Header -->

<!--end navbar-->
@elseif(auth()->user()->logged_as_company==0)
    <!--navbar user-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top scrolling-navbar">
        <img src="{{asset('img/bluelogo.png')}}" class="logo">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icons-mobile"> <i class="fa fa-bars" aria-hidden="true"></i>

          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav  mr-auto "  >
                <li class="nav-item   ">
                    <a class="nav-link" href="/home"style="margin-top:15px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/explore" style="margin-top:15px;" >Explore</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/job-search"style="margin-top:15px;">Customized job search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/create-job"style="margin-top:15px;">Create a new job</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/create-company"style="margin-top:15px;">Create a company account</a>
                </li>

            </ul>
        </div>
        <!--icons profile-->
        <div class="pmd-dropdown dropup">
            <button class="btn pmd-btn-fab pmd-ripple-effect  pmd-btn-flat " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="outline: none; box-shadow: none;">
                <a>
                    <img src="{{asset('storage/profiles/'.auth()->user()->profile_thumbnail)}}" class="imgprofile img-fluid rounded-circle">
                </a>

            </button>
            <ul class="dropdown-menu">
                <li>
                    <i class="fa fa-user-circle fa-2x"aria-hidden="true" style="color:#117272"></i>
                    <a href="/profile" class=" ddrop">View Profile</a>
                </li>
                <hr>
                @if(auth()->user()->managing_company_id !=null)
                <li>
                    <i class="fa fa-cogs fa-2x" aria-hidden="true" style="color:#117272"></i>
                    <form action="/switch-to-company-account" method="post" id="switchtocompany">
                        @csrf
                        @method('PUT')
                    <a  class="ddrop" onclick="document.getElementById('switchtocompany').submit(); return false;">switch to company account</a>
                    </form>
                </li>
                <hr>
                <li>
                @endif

                    <i class="fa fa-sign-out fa-2x" aria-hidden="true" style="color:#117272"></i>
                    <form  action="{{ route('logout') }}" method="POST"  id="logout-form">
                        @csrf
                        <a  class="ddrop" onclick="document.getElementById('logout-form').submit(); return false;">Log out </a>
                    </form>



                </li>
            </ul>
        </div>
        <!--end icons profile-->


    </nav>
@else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icons-mobile"> <i class="fa fa-bars" aria-hidden="true"></i>

      </span>
        </button>
        <img src="{{asset('img/win win hiring.png')}}" class="logo">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav  mr-auto "  >
                <li class="nav-item   comp">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item comp">
                    <a class="nav-link" href="#">Create a new job</a>
                </li>
                <li class="nav-item comp">
                    <a class="nav-link" href="#">Manage company's Jobs</a>
                </li>

            </ul>
        </div>
        <!--icons profile-->
        <div class="pmd-dropdown dropup">
            <button class="btn pmd-btn-fab pmd-ripple-effect  pmd-btn-flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;
box-shadow: none;">


                <img src="{{asset('img/img_avatar-1.png')}}" class="imgprofile">

            </button>
            <ul class="dropdown-menu dropicon">
                <li class="space">
                    <i class="fa fa-user-circle fa-2x "aria-hidden="true" ></i>
                    <a href="#" class=" ddrop">View Profile</a>
                </li>
                <hr>
                <li class="space">
                    <i class="fa fa-cogs fa-2x " aria-hidden="true" ></i>
                    <form action="/switch-to-user-account" method="post" id="switchtouser">
                        @csrf
                        @method('PUT')
                    <a  class="ddrop" onclick="document.getElementById('switchtouser').submit(); return false;" >Switch to User Account</a>
                    </form>
                </li>
                <hr>
                <li class="space">

                    <i class="fa fa-sign-out fa-2x " aria-hidden="true"></i>
                    <a href="#" class="ddrop">Log Out</a>

                </li>
            </ul>
        </div>
        <!--end icons profile-->

    </nav>




    <!--end navbar-->
@endif
