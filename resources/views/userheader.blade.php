<!--navbar user-->
@yield('cont')

@if(!(Auth :: check()))
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">

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

    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
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

                <!--icons profile-->
                <div class="pmd-dropdown dropup">
                    <button class="btn pmd-btn-fab pmd-ripple-effect  pmd-btn-flat " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="outline: none; box-shadow: none;">
                        <a href="#">
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
                        @endif
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
                <li class="nav-item ">
                    <a href="/notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newNotifications) #da5525 @else currentColor @endif" class="bi bi-bell-fill" viewBox="0 0 16 16"style="margin-top:30px; color: #D7CCC8;"
                        id="notification_number">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            <p>{{-- @include('countNotifications') --}}
                                @if($newNotifications){{$notificationCount}} @endif
                            </p>
                        </svg>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/messeging">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newMessages) #da5525 @else currentColor @endif" class="bi bi-chat-dots-fill" viewBox="0 0 16 16"style="margin-top:30px;margin-left:8px; color:#D7CCC8;">
                            <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            <p>@if($newMessages){{$messagesCount}} @endif</p>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
@else

    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">
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

<!--
<script type="text/javascript">
    function loadDoc() {
        setInterval(function () {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("notification_number").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "countNotifications.php", true);
            xhttp.send();
        }, 1000);
    }

    loadDoc();
</script> }
-->



