<!--navbar user-->
@yield('cont')

@if(!(Auth :: check())) <!--  header without logging-->
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
@elseif(auth()->user()->logged_as_company==0) <!-- logged user header-->
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
                                <a  href="#" class="ddrop" onclick="document.getElementById('switchtocompany').submit(); return false;">switch to company account</a>
                            </form>
                        </li>
                        <hr>
                    @endif
                    @if(auth()->user()->admin)
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#117272" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                            </svg>
                            <a href="/manage-reports" class=" ddrop">View reports</a>
                        </li>
                        <hr>
                    @endif
                    <li>
                        <i class="fa fa-sign-out fa-2x" aria-hidden="true" style="color:#117272"></i>
                        <form  action="{{ route('logout') }}" method="POST"  id="logout-form">
                            @csrf
                            <a href="#" class="ddrop" onclick="document.getElementById('logout-form').submit(); return false;">Log out </a>
                        </form>
                    </li>
                </ul>
            </div>
            <!--end icons profile-->
            <li class="nav-item ">
                <a href="/notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newNotifications)#70b9b0 @else currentColor @endif" class="bi bi-bell-fill" viewBox="0 0 16 16"style="margin-top:30px; color: #D7CCC8;"
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newMessages) #70b9b0 @else currentColor @endif" class="bi bi-chat-dots-fill" viewBox="0 0 16 16"style="margin-top:30px;margin-left:8px; color:#D7CCC8;">
                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <p>@if($newMessages){{$messagesCount}} @endif</p>
                    </svg>
                </a>
            </li>
        </ul>
    </div>

</nav>
@else <!-- company header-->

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
                <a class="nav-link" href="/company-home">Home</a>
            </li>
            <li class="nav-item comp">
                <a class="nav-link" href="/create-job">Create a new job</a>
            </li>
            <li class="nav-item comp">
                <a class="nav-link" href="/manage-company-jobs">Manage company's Jobs</a>
            </li>


            <!--icons profile-->
            <div class="pmd-dropdown dropup">
                <button class="btn pmd-btn-fab pmd-ripple-effect  pmd-btn-flat" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;
box-shadow: none;">


                    <img src="{{asset('/storage/profiles/'.auth()->user()->managingCompany->profile_thumbnail)}}" class="imgprofile img-fluid rounded-circle">

                </button>
                <ul class="dropdown-menu">
                    <li class="space">
                        <i class="fa fa-user-circle fa-2x "aria-hidden="true" ></i>
                        <a href="/company-profile" class=" ddrop">View Profile</a>
                    </li>
                    <hr>
                    <li class="space">
                        <i class="fa fa-cogs fa-2x " aria-hidden="true" ></i>
                        <form action="/switch-to-user-account" method="post" id="switchtouser">
                            @csrf
                            @method('PUT')
                            <a href="#"  class="ddrop" onclick="document.getElementById('switchtouser').submit(); return false;" >Switch to User Account</a>
                        </form>
                    </li>
                    <!--
                    <li>
                        <i class="fa fa-sign-out fa-2x" aria-hidden="true" style="color:#117272"></i>
                        <form  action="{{ route('logout') }}" method="POST"  id="logout-form">
                            @csrf
                            <a  class="ddrop" onclick="document.getElementById('logout-form').submit(); return false;">Log out </a>
                        </form>

                    </li>


                    -->
                </ul>
            </div>
            <!--end icons profile-->
            <li class="nav-item ">
                <a href="/company-notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newCompanyNotifications) #da5525 @else currentColor @endif" class="bi bi-bell-fill" viewBox="0 0 16 16"style="margin-top:30px; color: #D7CCC8;"
                         id="notification_number">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        <p>{{-- @include('countNotifications') --}}
                            @if($newCompanyNotifications){{$companyNotificationCount}} @endif
                        </p>
                    </svg>
                </a>
            </li>
            <li class="nav-item ">
                <a href="/company-messeging">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="@if($newCompanyMessages) #da5525 @else currentColor @endif" class="bi bi-chat-dots-fill" viewBox="0 0 16 16"style="margin-top:30px;margin-left:8px; color:#D7CCC8;">
                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <p>@if($newCompanyMessages){{$companyMessagesCount}} @endif</p>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
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



