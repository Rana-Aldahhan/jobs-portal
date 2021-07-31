@yield('cont')

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
    <hr>
    <li>

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




   <!--end navbar-->
