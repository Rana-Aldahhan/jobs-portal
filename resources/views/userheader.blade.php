<!--navbar user-->
@yield('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icons-mobile"> <i class="fa fa-bars" aria-hidden="true"></i>

      </span>
    </button>
    <img src="{{asset('img/win win hiring.png')}}" class="logo">
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
