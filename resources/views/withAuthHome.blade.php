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



</head>
<body>


@extends('userheader')

@section('cont')

@endsection

<!--start slids-->


<section id="hero">

    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                @if (session('status'))
                    <div class="alert alert-warning">
                        <br>
                        {{ session('status') }}
                    </div>
            @endif
            <!-- Slide 1 -->
                <div class="carousel-item active" style="background: url({{asset('img/bg-masthead.jpg')}});">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Welcome to Win-Win hiring communtiy where everybody wins!</h2>
                            <p class="animate__animated animate__fadeInUp">this site aims to provide users with the right tools to help them find the most convenient job for them
                                as well as giving the users and companies the chance to post their own jobs opportunities and help them finding the right employee for the.
                            </p>

                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->

                <div class="carousel-item" style="background: url({{asset('img/slid4.jpg')}} );">
                    <div class="carousel-container">
                        <div class="carousel-content">

                            <h2 class="animate__animated animate__fadeInDown">Welcome to Win-Win hiring communtiy where everybody wins!</h2>
                            <p class="animate__animated animate__fadeInUp">this site aims to provide users with the right tools to help them find the most convenient job for them
                                as well as giving the users and companies the chance to post their own jobs opportunities and help them finding the right employee for the.</p>

                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
</section>
<!-- End Hero -->

<main id="main">

    <!--end slids-->


    <!-- ======= Why Us Section ======= -->


    <section id="why-us" class="why-us">
        <div class="container">



            <div class="row">

                <div class="col-lg-6">
                    <a id="update" href="/job-search" class="editlink">
                        <div class="box">

            <span>
            <h4>Find Job</h4>
        </span>

                            <div class='login-icon'>

                                <i class="fa fa-search fa-4x" aria-hidden="true" style="color:#073839"></i>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 mt-6 mt-lg-0">
                    <a id="update" href="/explore"  class="editlink">
                        <div class="box">

            <span>
            <h4>Explore Companies and People</h4>
            <div class='login-icon'>

                    <i class="fa fa-paper-plane-o fa-4x" aria-hidden="true" style="color:#073839"></i>

    </div>
        </span>

                        </div>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6 mt-6 mt-lg-0">
                    <a id="update" href="/create-company" class="editlink">
                        <div class="box">

            <span>
            <h4> Create a company account</h4>

            <div class='login-icon'>

                  <!--  <i class="fa fa-plus-square fa-4x" aria-hidden="true" style="color:#073839"></i>-->
                <svg xmlns="http://www.w3.org/2000/svg"  width="58" height="58" fill="#073839" class="bi bi-building" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
  <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
</svg>

            </div>
            </span>

                        </div>
                    </a>
                </div>

                <div class="col-lg-6 mt-6 mt-lg-0">
                    <a id="update" href="/create-job" class="editlink">
                        <div class="box">
              <span>
              <h4>Create a Job</h4>

            <div class='login-icon'>

                   <!-- <i class="bi bi-briefcase-fill fa-4x" aria-hidden="true" style="color:#073839"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="#073839" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
  <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
</svg>

            </div>
            </span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- Contact Start -->
    <div class="contact ">
        <div class="container  ">
            <div class="section-header baraa ">
                <p>Get In Touch</p>
                <h2>Get In Touch For Any Query</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Our Head Office</h3>
                            <p>Mezzeh, Damascus, Syria</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call for Help</h3>
                            <p>+963 952 411 855 </p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email for Information</h3>
                            <p>Win-Win@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <!-- ======= about us ======= -->
    <section id="about" class="about_d baraaa">
        <div class="container  ">
            <div class="section-title baraah">
                <h2 class="bar">About </h2>
                <br>
                <br>
                <hr>
                <br>
                <h4 class="bar1">About Win_Win hiring</h4>
                <p class="barp">Welcome to Win-Win hiring,this site aims to provide users with the right tools to help them find the most convenient job for them
                    as well as giving the users and companies the chance to post their own jobs opportunities and help them finding the right employee</p>
                <br>
                <hr>
                <br>
                <h4 class="bar">Vision</h4>
                <p  class="bar1p">to create a better everday life for many People.</p>
                <br>
                <hr>
                <br>
                <h4 class="bar2">our Mission</h4>
                <p  class="bar2p"> We unleash the power of the self-employed and help them thrive.</p>
                <br>
                <hr>
                <br>
                <h4 class="bar2">Who Are We</h4>
                <p  class="bar3p">Win-Win hiring founded by agroup of students at Damascus university in 2021,<br> and we do everything we can to strengthen your advantage and help you thrive <br>in all areas of your business.</p>
                <br>
    </section><!-- End About Us Section -->
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
