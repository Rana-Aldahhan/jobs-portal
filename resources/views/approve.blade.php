q<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">

  <link rel="stylesheet" href="{{asset('css/resultfindjob.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


</head>
<body>

<!--navbar user-->
@extends('headerwithsigin')

  @section('cont')

  @endsection
   <!--end navbar-->

   <!--**********************************************************************************-->

<!--start -->
  <div class="container">
<div class="row" >
    <!--start nav2-->

  <div class="col-sm-2  "style="margin-top:80px;">

  <div id="div">
  <div class="profile">
  <a href="index.html">
      <img src="{{asset('img/img_avatar-1.png')}}" alt="" class="img-fluid rounded-circle">
    </a>

    </div>

  <!-- .nav-menu -->
   <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

   <div class="container">
   <nav class="nav flex-column ">


  <a class="nav-link active" href="#" >
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16" style="margin-right:10px;">
  <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg>
  Saved List
  </a>


  <a class="nav-link" href="#" style="color:red;">
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-post-fill" viewBox="0 0 16 16"style="margin-right:10px;">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1 0-1zm0 3h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5z"/>
</svg>
  My Published Jobs
</a>


  <a class="nav-link" href="#">

  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"style="margin-right:10px;">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>

My Jobs Applications
</a>
  <a class="nav-link " href="#">

  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
  My Notification

</a>

</nav>
</div>

</div><!-- End Header -->


  </div>
  <!--end nav2-->
<!--start approve-->
<div class="col-sm-10 " style="margin-top:20px;">



  <div class="stylebody">
    <div class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
          <div class="col-md-12">
            <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm"style="padding-left:50px;">
              <table class="table manage-candidates-top mb-0">
                <thead>
                  <tr>
                    <th style="font-size: 20px;color:#006064">The Applicants For ("Job's Name"):</th>

                  </tr>
       </thead>
       <tbody>
       <tr class="candidates-list">
           <td class="title">
           <div class="thumb">
               <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
           </div>
           <div class="candidate-list-details">
               <div class="candidate-list-info">
               <div class="candidate-list-title">
                   <h5 class="mb-0"><a href="#">User's Name</a></h5>
               </div>
               <div class="candidate-list-option">
          <ul class="list-unstyled">

          <li><i class="fas fa-map-marker-alt pr-1"></i>city,country /remote or not</li>
          <li>About This Person:</li>
                   <hr>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    , ex consectetur animi atque rerum quis doloremque tempora mollitia nam rem.</p>

          <li>
Published xx days ago
          </li>
                   </ul>
               </div>
               </div>
           </div>
           </td>

           <td class="candidate-list-favourite-time text-center">
            <a class="candidate-list-favourite order-2 text-dark" href="#">

              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
              <span class="candidate-list-time order-1">Approve</span>
            </a>

          </td>


       <tr class="candidates-list">
           <td class="title">
           <div class="thumb">
               <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
           </div>
           <div class="candidate-list-details">
               <div class="candidate-list-info">
               <div class="candidate-list-title">
                   <h5 class="mb-0"><a href="#">User's Name</a></h5>
               </div>
               <div class="candidate-list-option">
                   <ul class="list-unstyled">

                   <li><i class="fas fa-map-marker-alt pr-1"></i>city,country /remote or not</li>
                   <li>About This Person:</li>
                   <hr>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    , ex consectetur animi atque rerum quis doloremque tempora mollitia nam rem.</p>


                   </ul>
               </div>
               </div>
           </div>
           </td>

           <td class="candidate-list-favourite-time text-center">
            <a class="candidate-list-favourite order-2 text-dark" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
              <span class="candidate-list-time order-1">Approve</span>
            </a>

          </td>

       <tr class="candidates-list">
           <td class="title">
           <div class="thumb">
               <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
           </div>
           <div class="candidate-list-details">
               <div class="candidate-list-info">
               <div class="candidate-list-title">
               <h5 class="mb-0"><a href="#">User's Name</a></h5>
           </div>
           <div class="candidate-list-option">
               <ul class="list-unstyled">

                   <li><i class="fas fa-map-marker-alt pr-1"></i>city,country /remote or not</li>
                   <li>About This Person:</li>
                   <hr>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    , ex consectetur animi atque rerum quis doloremque tempora mollitia nam rem.</p>
                   </ul>
               </div>
               </div>
           </div>
           </td>

           <td class="candidate-list-favourite-time text-center">
            <a class="candidate-list-favourite order-2 text-dark" href="#">

              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
              <span class="candidate-list-time order-1">Approve</span>
            </a>

          </td>

       <tr class="candidates-list">
           <td class="title">
           <div class="thumb">
               <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
           </div>
           <div class="candidate-list-details">
               <div class="candidate-list-info">
               <div class="candidate-list-title">
               <h5 class="mb-0"><a href="#">User's Name</a></h5>
           </div>
           <div class="candidate-list-option">
               <ul class="list-unstyled">

                   <li><i class="fas fa-map-marker-alt pr-1"></i>city,country /remote or not</li>
                   <li>About This Person:</li>
                   <hr>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    , ex consectetur animi atque rerum quis doloremque tempora mollitia nam rem.</p>
                   </ul>
               </div>
               </div>
           </div>
           </td>
           <td class="candidate-list-favourite-time text-center">
            <a class="candidate-list-favourite order-2 text-dark" href="#">

              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
              <span class="candidate-list-time order-1">Approve</span>
            </a>

          </td>

       <tr class="candidates-list">
           <td class="title">
           <div class="thumb">
               <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
           </div>
           <div class="candidate-list-details">
               <div class="candidate-list-info">
               <div class="candidate-list-title">
               <h5 class="mb-0"><a href="#">User's Name</a></h5>
           </div>
           <div class="candidate-list-option">
               <ul class="list-unstyled">

                   <li><i class="fas fa-map-marker-alt pr-1"></i>city,country /remote or not</li>
                   <li>About This Person:</li>
                   <hr>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    , ex consectetur animi atque rerum quis doloremque tempora mollitia nam rem.</p>
                   </ul>
               </div>
               </div>
           </div>
           </td>
           <td class="candidate-list-favourite-time text-center">
            <a class="candidate-list-favourite order-2 text-dark" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
              </svg>
              <span class="candidate-list-time order-1">Approve</span>
            </a>

          </td>


       </tbody>
   </table>
   <div class="text-center mt-3 mt-sm-3">
       <ul class="pagination justify-content-center mb-0">
       <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
       <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
       <li class="page-item"><a class="page-link" href="#">2</a></li>
       <li class="page-item"><a class="page-link" href="#">3</a></li>
       <li class="page-item"><a class="page-link" href="#">...</a></li>
       <li class="page-item"><a class="page-link" href="#">25</a></li>
       <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
       </ul>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>

   </div>


</div>

<!--end approve-->
  </div>
  </div>
<!--end-->


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
