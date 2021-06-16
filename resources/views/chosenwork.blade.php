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
      <p style="font-size:18px;color:#009688;text-align:center">job title</p>
     
     
    </div>

    <nav class="nav-menu">
      <ul>
       <div>

       <p>
         city ,country,
         remote/not
       </p>
       <p>posted xx</p>
       </div>
<hr>

<div class="stylereport">
       <a id="update " href="#" class="editlink">
       <i class="fa fa-flag fa-2x" style="color:#e53935;"></i>
       <h6> Report</h6>
</a>
</div>

<hr>


<div class="stylego">
       <a id="update " href="#" class="editlink">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
          </svg>
       <h6> Apply</h6>
</a>
</div>

<hr>

<div class="stylego">
       <a id="update " href="#" class="editlink">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16" style="margin-right:10px;">
            <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
          </svg>
       <h6>Add To Saved</h6>
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
  
  <div class="stylechosen">

<h6>
  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16"style="margin-left: 5px">
    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
  </svg>
  Role:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita enim 
  corporis excepturi esse debitis quibusdam illum fugit, 
</p>

<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-journal-text pr-1" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
        </svg>
    Required Skills:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita enim 
</p>


<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-stack pr-1" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
        <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
        </svg>
    Required Experience:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. 
</p>


<h6>
    <i class="fa fa-usd pr-1" aria-hidden="true " style="margin-left: 5px"></i>
    Salary:</h6>
<p >
 54545444$
</p>
 
<h6>
    <i class="fa fa-bus" aria-hidden="true"style="margin-left: 5px"></i>
    Transport Availabilitly:</h6>
<p >
  Lorem 
</p>

<h6>
    <i class="fa fa-long-arrow-right" aria-hidden="true"style="margin-left: 5px"></i>
    Type Of The Position:</h6>
<p >
  Lorem 
</p>

<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
      </svg>
    Job Description:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, voluptate aut. Ipsam doloremque,
   dolor fuga adipisci quaerat non fugit nihil asperiores tenetur repellendus corrupti alias consequuntur a
  , accusamus dolorum iusto?
</p>

<h6>
    <i class="fa fa-address-card-o" aria-hidden="true"style="margin-left: 5px"></i>
    About Us:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, voluptate aut. Ipsam doloremque,
   dolor fuga adipisci quaerat non fugit nihil asperiores tenetur repellendus c
</p>

<h6>Industry:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. 
</p>

<h6>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16"style="margin-left: 5px">
        <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
        <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
      </svg>
    About The Company:</h6>
<p >
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, voluptate aut. Ipsam doloremque,
   dolor fuga adipisci quaerat non fugit nihil asperiores tenetur repellendus corrupti alias consequuntur a
  , accusamus dolorum iusto?
</p>

  
<section id="contact" class="contact">
    <div class="container">

        <h4>Contact The Company:</h4>
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