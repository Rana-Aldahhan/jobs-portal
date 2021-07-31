<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>




    <link rel="stylesheet" href="{{asset('css/manage.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">





    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>



<!--navbar user-->
@extends('headerwithsigin')

@section('cont')

@endsection

<!--end navbar-->
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <h4 class="styleh">company reports</h4>

                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class=""><!--active-->
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{asset('img/llogo.png')}}" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>company name</span>

                                </div>
                                <button type="button" class="btn btn-info" style="margin-left: 200px">block user</button>
                            </div>

                        </li>


                        <li>

                            <div class="card w-75 " style="height: 150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                                <p>user</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="card w-75 " style="height: 150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="{{asset('img/win win hiring.png')}}" class="rounded-circle user_img">
                                                <p>company</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="card w-75 " style="height: 150px" >
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg" class="rounded-circle user_img">
                                                <p>user</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div></div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</Script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>




    <link rel="stylesheet" href="{{asset('css/manage.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">





    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>



<!--navbar user-->
@extends('headerwithsigin')

@section('cont')

@endsection

<!--end navbar-->
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <h4 class="styleh">company reports</h4>

                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class=""><!--active-->
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{asset('img/llogo.png')}}" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>company name</span>

                                </div>
                                <button type="button" class="btn btn-info" style="margin-left: 200px">block user</button>
                            </div>

                        </li>


                        <li>

                            <div class="card w-75 " style="height: 150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                                <p>user</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="card w-75 " style="height: 150px">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="{{asset('img/win win hiring.png')}}" class="rounded-circle user_img">
                                                <p>company</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>

                            <div class="card w-75 " style="height: 150px" >
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <div class="img_cont">
                                                <img src="https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg" class="rounded-circle user_img">
                                                <p>user</p>
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-sm-auto mb-3">
                                            <p>report name <br>report reason <br>report info</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div></div>

    </div>
</div>


<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</Script>
</body>
</html>
