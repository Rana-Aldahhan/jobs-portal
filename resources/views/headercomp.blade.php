@yield('include')
<!-- company header-->

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
                <ul class="dropdown-menu dropicon">
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

                    </svg>
                </a>
            </li>
        </ul>
    </div>
</nav>


