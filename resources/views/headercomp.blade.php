@yield('include')
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
    <a href="#" class="ddrop" >Switch to User Account</a>
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

 
