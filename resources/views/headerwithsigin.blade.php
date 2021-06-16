@yield('cont')

<!--navbar user-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top scrolling-navbar">
    <img src="{{asset('img/win win hiring.png')}}" class="logo">

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
        <img src="{{asset('img/img_avatar-1.png')}}" class="imgprofile">
        </a>

    </button>
    <ul class="dropdown-menu">
        <li>
        <i class="fa fa-user-circle fa-2x"aria-hidden="true" style="color:#117272"></i>
        <a href="/profile" class=" ddrop">View Profile</a>
    </li>
    <hr>
        <li>
        <i class="fa fa-cogs fa-2x" aria-hidden="true" style="color:#117272"></i>
        <a href="#" class="ddrop">Settings</a>
    </li>
    <hr>
                  <li>

        <i class="fa fa-sign-out fa-2x" aria-hidden="true" style="color:#117272"></i>
                      <a href="#" class="ddrop">
            <!---- TODO fix ----->             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none dropp">
                              @csrf
                          </form>
                          Log out</a>



    </li>
</ul>
  </div>
          <!--end icons profile-->


      </nav>




   <!--end navbar-->
