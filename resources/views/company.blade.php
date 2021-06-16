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
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/company.css')}}">



</head>
<body>

<!--navbar comp-->
@extends('headercomp')

@section('include')

@endsection
  <!--end navbar-->
 
<!--start -->
<div class="container">
  <div class="row">


    <div class="col  col-lg-2  " style="margin-top:80px;">


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
          
          
            <a class="nav-link" href="#" >
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
          
          </div>

    </div>

    <div class="col-lg-10 sp1 " style="padding-left: 50px">

      <div class="row">
        <div class="col-12 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
              <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"></span>
            </div>
          </div>
        </div>

        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
          <div class="text-center text-sm-left mb-2 mb-sm-0">
          <div class="row">
              <label>company's name</label>
         </div>
         <div class="row">
                    <label>industry,</label>
                  <label>count of employees</label>

         </div>
         <div class="row">
                  <label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>country,city,region</label>


        </div>

             <div class="row">
             <p><strong><span class="glyphicon glyphicon-thumbs-up"></span>slogan </strong>
              <div class="col">

                </div>
        <br>
                <button class="btn btn-info" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
<path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
</svg>Edit</button>

           </div>
          </div>
        </div>
      </div>

      <div class="row">
                  <div class="col mb-3">
                    <div class="form-group">
                    <p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></span>About this company: </strong>

                    </div>
                  </div>
                </div>
                <br><br><br>
     <hr>
     <h2>our available job opportunities</h2>
     <br>
            <div class="card w-100" >
                <div class="card-body">
                <div class="row">
                 <div class="col-lg-4 col-sm-auto mb-3">

                   <div class="mx-auto" style="width: 140px;">
                     <div class="d-flex justify-content-center align-items-center border border-info rounded-circle  " style="height: 140px; background-color: rgb(233, 236, 239);">
                       <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"  >company logo</span>
                     </div>
                   </div>

                 </div>
                              <div class="col-lg-8 col-sm-auto mb-3">

                                <h5 class="card-title">software engineer</h5>
                                  <p class="card-text">User's name <br>Redmond,USA<br><br>required skills:
                                    C#,NET,JavaScript<br>required experience:
                                    +3 years<br>Salary:109K$-130K$<bR><br>published 1week ago


                                  </p>

                              </div>

                               </div>
                </div>
              </div>
              <br>
              <div class="card w-100" >
                <div class="card-body">
                <div class="row">
                 <div class="col-lg-4 col-sm-auto mb-3">

                   <div class="mx-auto" style="width: 140px;">
                     <div class="d-flex justify-content-center align-items-center border border-info rounded-circle  " style="height: 140px; background-color: rgb(233, 236, 239);">
                       <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"  >company logo</span>
                     </div>
                   </div>

                 </div>
                              <div class="col-lg-8 col-sm-auto mb-3">

                                <h5 class="card-title">software engineer</h5>
                                  <p class="card-text">User's name <br>Redmond,USA<br><br>required skills:
                                    C#,NET,JavaScript<br>required experience:
                                    +3 years<br>Salary:109K$-130K$<bR><br>published 1week ago


                                  </p>

                              </div>

                               </div>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-lg btn-block">more</button>
         <br>
<hr>
<br>
<h2>our employees</h2>

<div class="card w-100">
    <div class="card-body">
       <div class="row">
        <div class="col-lg-4 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
              <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">User profile</span>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-sm-auto mb-3">
        <h5>user name</h5>
        <p>job title<br>county,city</p>
        <h5>About this person</h5>
        <p> </p>
        </div>
         </div>


</div>
</div>
<br>
<div class="card w-100">
<div class="card-body">
<div class="row">
        <div class="col-lg-4 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div class="d-flex justify-content-center align-items-center  rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
              <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">User profile</span>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-sm-auto mb-3">
        <h5>user name</h5>
        <p>job title<br>county,city</p>
        <h5>About this person</h5>
        <p> </p>
        </div>
         </div>

</div>
</div>
<button type="button" class="btn btn-secondary btn-lg btn-block">more</button>



<br>
<hr>
<br>

       <h2>Contact info</h2>

         <form >
<div class="form-group row ">
<p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></span>E-mail: </strong>
<div class="col-sm-10">

</div>
</div>


<div class="form-group row">
<p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z"/>
</svg></span>phone: </strong>
<div class="col-sm-10">

</div>
</div>

</form>


            <br>
<hr>
<br>

          </form>


      </div>
    </div>
  </div>



 <!--end create a company account -->
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
