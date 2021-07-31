<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/companymessaging.css')}}">
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
        <div class="col-md-4 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">


                <h4 class="styleh">companyies you can message</h4>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class="active">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img  class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>company1</span>
                                    <p>company1 is online</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img  class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>company2</span>
                                    <p>company2 left 7 mins ago</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img   class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>company3</span>
                                    <p>company3 is online</p>
                                </div>
                            </div>
                        </li>
                        <li>

                        </li>
                        <li>

                        </li>
                    </ul>


                    <h4 class="styleh">users you can message</h4>

                    <ul class="contacts">
                        <li class="active">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>Khalid</span>
                                    <p>Kalid is online</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>Taherah Big</span>
                                    <p>Taherah left 7 mins ago</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img  src="https://ptetutorials.com/images/user-profile.png" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>Sami Rafi</span>
                                    <p>Sami is online</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="http://profilepicturesdp.com/wp-content/uploads/2018/07/sweet-girl-profile-pictures-9.jpg" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>Nargis Hawa</span>
                                    <p>Nargis left 30 mins ago</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="https://static.turbosquid.com/Preview/001214/650/2V/boy-cartoon-3D-model_D.jpg" class="rounded-circle user_img">

                                </div>
                                <div class="user_info">
                                    <span>Rashid Samim</span>
                                    <p>Rashid left 50 mins ago</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer"></div>
            </div></div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
    });
</script>

</body>
</html>
