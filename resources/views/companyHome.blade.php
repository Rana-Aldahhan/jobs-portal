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



</head>
<body>


 <!--navbar comp-->
 @extends('userheader')

 @section('include')

 @endsection
   <!--end navbar-->

   <!--start slids-->

   <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
        <div class="carousel-item active" style="background: url({{asset('img/ll.jpg')}}); background-repeat: no-repeat">
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
 <div class="carousel-item" style="background: url({{asset('img/80.jpg')}} ); background-repeat: no-repeat;padding-top:50px ">
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


 <!-- Fact Start -->

 <div class="fact">
            <div class="container">

    <div class="row align-items-center">

        <div class="col-lg-6 mt-6 mt-lg-0">
        <a id="update " class="editlink" href="#">
            <div class="fact-item">


                <i class="fa fa-plus-square fa-3x" style="color:#FF8A65"></i>
                <h2>Create a Job</h2>
            </div>
            </a>
        </div>



        <div class="col-lg-6 mt-6 mt-lg-0">
        <a id="update " class="editlink" href="#">
            <div class="fact-item">


                <i class="fa fa-cog fa-3x" aria-hidden="true" style="color:#FF8A65"></i>

                <h2>Manage Company's Jobs</h2>

            </div>
            </a>
        </div>

    </div>
</div>
</div>

<!-- Fact Start -->

<!-- ======= Contact Us Section ======= -->
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
        <h4 class="bar">About Win_Win hiring</h4>
        <p class="bar">Welcome to Win-Win hiring,this site aims to provide users with the right tools to help them find the most convenient job for them
                  as well as giving the users and companies the chance to post their own jobs opportunities and help them finding the right employee</p>
        <br>
          <hr>
          <br>
        <h4 class="bar">Vision</h4>
        <p  class="bar">to create a better everday life for many People.</p>
        <br>
          <hr>
          <br>
        <h4 class="bar">our Mission</h4>
        <p  class="bar"> We unleash the power of the self-employed and help them thrive.</p>
        <br>
          <hr>
          <br>
        <h4 class="bar">Who Are We</h4>
        <p  class="bar">Win-Win hiring founded by agroup of students at Damascus university in 2021,<br> and we do everything we can to strengthen your advantage and help you thrive <br>in all areas of your business.</p>
        <br>
      </div>
    </div>
  </section>
  <!-- End About Us Section -->




<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container btoo">
    <div class="copyright">
      &copy; Copyright <strong><span>Win-Win hiring</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer>
<!-- End #footer -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>






</body>
</html>
