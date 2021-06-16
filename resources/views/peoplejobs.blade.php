<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
  <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
  <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
  <link rel="stylesheet" href="{{asset('css/searchresults.css')}}">
  <link rel="stylesheet" href="{{asset('css/explore.css')}}">
  <link rel="stylesheet" href="{{asset('css/companysjobs.css')}}">

</head>
<body>
  
<!--navbar user-->
@extends('headerwithsigin')

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

    <div class="profile">
      <img src="{{asset('img/img_avatar-1.png')}}" alt="" class="img-fluid rounded-circle">
      <h1 class="text-light"><a href="index.html">Name</a></h1>
     
    </div>

    <nav class="nav-menu">
      <ul>
       <div>

       <p>Job Title at Company's Name,
           City,Country
       </p>

       <p style="color:#e57373;"> Status: in search of a Jobs/Not </p>
       </div>
<hr>

<div class="stylereport">
       <a id="update " href="/15" class="editlink">
       <i class="fa fa-flag fa-2x" style="color:#e53935;"></i>
       <h6> Report</h6>
</a>
</div>

<hr>


<div class="stylego">
       <a id="update " href="#" class="editlink">
       <i class="fa fa-user-plus fa-2x"></i>
       <h6> Add as a Colleague</h6>
</a>
</div>




      </ul>
    </nav><!-- .nav-menu -->
   <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

  </div>
</div><!-- End Header -->


  </div>
  <!--end nav2-->
<!--start about-->

  <div class="col-lg-8 " style="margin-top:150px;">
  <div class="container">
  <div class="styleabout">
<h4>About:</h4>

<p class="pabout">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita enim 
  corporis excepturi esse debitis quibusdam illum fugit, 
  dolores praesentium ipsum error incidunt, totam ea nobis maxime reiciendis reprehenderit commodi saepe!
</p>


<h6>Dagree & School: dagree at school</h6>

<h6>Skills:</h6>

<p>Lorem ipsum, ipsum molestiae nisi nam.
     Dicta architecto neque iure non nesciunt nemo.</p>


     <h6>Experience:</h6>

<p>Lorem ipsum, ipsum molestiae nisi nam.
     Dicta architecto neque iure non nesciunt nemo.</p>


     <h6>Languages:</h6>
     

<h5 style=" color:#757575; padding-top:20px; font-weight: 600;">Colleagues:</h5>



<!--start1-->
<div class="card cardppp"  >
  <a id="update" href="#" class="editlink">
  <div class="card-body">
<div class="container">
<div class="media">
  <div class="media-left">
    <img src="{{asset('img/img_avatar-1.png')}}" class="media-object imgmed" >
  </div>

  
  <div class="media-body">
    <h5 class="media-heading">user's Name</h5>
    <p>Job Title
        city , country</p>

        <h5 class="media-heading">About this Person</h5>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea, 
        placeat .</p>


  </div>
</div>
</div>

</div>
  </a>
</div>


<!--end1-->


<!--start2-->
<div class="card cardppp"  >
  <a id="update" href="#" class="editlink">
  <div class="card-body">
<div class="container">
<div class="media">
  <div class="media-left">
    <img src="{{asset('img/img_avatar-1.png')}}" class="media-object imgmed" >
  </div>

  
  <div class="media-body">
    <h5 class="media-heading">user's Name</h5>
    <p>Job Title
        city , country</p>

        <h5 class="media-heading">About this Person</h5>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea, 
        placeat .</p>


  </div>
</div>
</div>

</div>
  </a>
</div>

<!--end2-->

<!--start pagination-->

<nav aria-label="Page navigation example" class="page" style="margin-left:5px;">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

<!--end pagination-->

<h6>Resume:</h6>

<p>Lorem ipsum, ipsum molestiae nisi nam.
     Dicta architecto neque iure non nesciunt nemo.</p>


     <h6 style="font-weight: 600;">Contact Info:</h6>


     </div>
     <section id="contact" class="contact">
      <div class="container">

     
        <div class="info">
              <div class="address">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
              <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
            </div>
              </section>



  </div>
</div>
  <!--end about-->

  </div>

<!--end-->
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