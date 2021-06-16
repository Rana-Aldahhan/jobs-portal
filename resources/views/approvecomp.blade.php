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
  <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">
  <link rel="stylesheet" href="{{asset('css/approvecomp.css')}}">
  
  
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  
</head>
<body>
  
<!--navbar comp-->
@extends('headercomp')

@section('include')

@endsection
  <!--end navbar-->
   <!--**********************************************************************************-->
   <!--start approve comp-->
<div class="styleapprove">
    <div class="container profile">
        <div class="col-md-9">
            <div class="panel panel-profile">
            <div class="panel-heading overflow-h">
                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>The Applicants For("Job's ID"):</h2>
                <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border">
                            <img class="rounded-x" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                            <div class="name-location">
                                <a href="#"> <strong>Maria Snort</strong></a>
                                <span><i class="fa fa-map-marker"></i>California, US</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>    
                            <p>Lorem Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                  </svg><a href="#"> Apply</a></li>
                            </ul>
                        </div>
                    </div>        
        
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border">
                            <img class="rounded-x" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            <div class="name-location">
                                <a href="#"> <strong>Mark McClerk</strong></a>
                                <span><i class="fa fa-map-marker"></i>Moscow, Russia</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>    
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                  </svg><a href="#"> Apply</a></li>
                               
                            </ul>
                        </div> 
                    </div>    
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border">
                            <img class="rounded-x" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                            <div class="name-location">
                                <a href="#">  <strong>Maria Snort</strong></a>
                                <span><i class="fa fa-map-marker"></i>California, US</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>    
                            <p>Lorem Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                  </svg><a href="#"> Apply</a></li>
                            </ul>
                        </div>
                    </div>        
        
                    <div class="col-sm-6">
                        <div class="profile-blog blog-border"style="margin-bottom:20px">
                            <img class="rounded-x" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            <div class="name-location">
                                <a href="#"><strong>Mark McClerk</strong></a>
                                <span><i class="fa fa-map-marker"></i>Moscow, Russia</span>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>    
                            <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                            <hr>
                            <ul class="list-inline share-list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2-circle " viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                  </svg><a href="#"> Apply</a></li>
                            </ul>
                        </div> 
                    </div>    
                </div>
    
            </div>        
        </div>    
        </div>
    </div>          
</div>              
   
 <!--end approve comp-->

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