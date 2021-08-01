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
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>



</head>
<body>


<!--navbar user-->
@extends('userheader')

@section('cont')

@endsection

<!--end navbar-->


<!--navbar profile -->

<div class="container  ">


        <div class="col  col-lg-2  " style="margin-top:80px;">


            <div id="div">
                <div class="profile">
                    <a href="/profile">
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
        <!--create profile -->
        <form class="form" novalidate="" method="POST" action="/profile/edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-10 sp1 bc1 " style="padding-left: 50px">

                <div class="row ">

                    <div class="col-12 col-sm-auto mb-3">
                        <div class="mx-auto" >
                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 160px;width:180px; ">

                                <a href="{{asset('storage/profiles/'.$user->profile_thumbnail)}}">
                                    <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                                </a>

                            </div>
                            <br>
                            <input type="file" id="myFile" name="profile" class="@error('profile') is-invalid @enderror"  >
                            @error('profile')
                            <p class="help-block is-invalid">{{$errors->first('profile')}}</p>
                            @enderror

                        </div>

                    </div>

                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">

                            <div class="row">
                                <label> Name:</label>
                                <div class="col">
                                    <div class="form-group col-md-4 ">
                                        <input class="form-control fc @error('name') is-invalid @enderror" type="text" name="name" placeholder="name" value="{{$user->name}}">
                                        @error('name')
                                        <p class="help-block is-invalid">{{$errors->first('name')}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label>job title:</label>
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control fc @error('current-job-title') is-invalid @enderror" type="text" name="current-job-title" placeholder="current job title" value="{{$user->current_job_title}}">
                                        @error('current-job-title')
                                        <p class="help-block is-invalid">{{$errors->first('current-job-title')}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <label>at:</label>
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control fc @error('current-company-name') is-invalid @enderror" type="text" name="current-company-name" placeholder="current company name" value="{{$user->current_company_name}}">
                                        @error('current-company-name')
                                        <p class="help-block is-invalid">{{$errors->first('current-company-name')}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label>country:</label>
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control fc  @error('country') is-invalid @enderror" type="text" name="country" placeholder="country" value="{{$user->country}}">
                                    </div>
                                </div>
                                <label>city:</label>
                                <div class="col">
                                    <div class="form-group">
                                        <input  class="form-control fc  @error('city') is-invalid @enderror" type="text"  name="city" placeholder="city" value="{{$user->city}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label>status:</label>
                                <div class="col " style="padding-left: 50px">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input fc" type="radio" name="looking-for-job" id="inlineRadio1" value="1" @if($user->looking_for_job) checked @endif >
                                        <label class="form-check-label" for="inlineRadio1">looking for a job</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input fc" type="radio" name="looking-for-job" id="inlineRadio2" value="0" @if(! $user->looking_for_job) checked @endif >
                                        <label class="form-check-label" for="inlineRadio2">not looking for a job</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label> Birthdate:</label>
                                <div class="col">
                                    <input type="date" id="myDate" value="{{$user->birth_date}}" name="birth_date"  >
                                    <p id="demo"></p>
                                    <script>
                                        function myFunction() {
                                            var x = document.getElementById("myDate").value;
                                            document.getElementById("demo").innerHTML = x;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Add previous work places :</h2>
                <br>
                <div class="row">
                    <label>previous company name:</label>
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control fc" type="text" name="previous-company-name1" placeholder="" value="@if($workplaces->count() >0){{$workplaces[0]->company_name}}@endif"> <!-- $user->workPlaces[0]->company_name -->
                        </div>
                    </div>
                    <label>previous-job-title:</label>
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control fc" type="text" name="previous_job_title1" placeholder="" value="@if($workplaces->count() >0){{$user->workPlaces[0]->pivot->user_job_title}}@endif">
                        </div>
                    </div>

                    <div class="col">
                        <input type="button" id="toggleDiv" value="+">

                    </div>
                </div>
                <div class="row">
                    <label>start date:</label>
                    <div class="col">
                        <input type="date" id="myDate" value="@if($workplaces->count() >0){{ $user->workPlaces[0]->pivot->started_at}}@endif" name="start-date1">
                        <p id="demo"></p>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDate").value;
                                document.getElementById("demo").innerHTML = x;
                            }
                        </script>
                    </div>
                    <label>end date:</label>
                    <div class="col">
                        <input type="date" id="myDate" value="@if($workplaces->count() >0){{$user->workPlaces[0]->pivot->ended_at}}@endif" name="end-date1">
                        <p id="demo"></p>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDate").value;
                                document.getElementById("demo").innerHTML = x;
                            }
                        </script>

                    </div>

                </div>



                <!--1-->
                <div  id="MyDiv" style="display: none;">
                    <br><hr><br>
                    <div class="row">
                        <label>previous-company-name:</label>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control fc" type="text" name="previous-company-name2" placeholder="" value="@if($workplaces->count() >1){{$workplaces[1]->company_name}}@endif">
                            </div>
                        </div>
                        <label>previous-job-title:</label>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control fc" type="text" name="previous_job_title2" placeholder="" value="@if($workplaces->count() >1){{$user->workPlaces[1]->pivot->user_job_title}}@endif">
                            </div>
                        </div>
                        <div class="col">
                            <input type="button" id="toggleDiv1" value="+">

                        </div>
                    </div>
                    <div class="row">
                        <label>start date:</label>
                        <div class="col">
                            <input type="date" id="myDate" value="@if($workplaces->count() >1){{$user->workPlaces[1]->pivot->started_at}}@endif"name="start-date2">
                            <p id="demo"></p>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myDate").value;
                                    document.getElementById("demo").innerHTML = x;
                                }
                            </script>
                        </div>
                        <label>end date:</label>
                        <div class="col">
                            <input type="date" id="myDate" value="@if($workplaces->count() >1){{$user->workPlaces[1]->pivot->ended_at}}@endif"name="end-date2">
                            <p id="demo"></p>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myDate").value;
                                    document.getElementById("demo").innerHTML = x;
                                }
                            </script>
                        </div>
                    </div>



                </div>
                <!--end1-->

                <!--2-->
                <div  id="MyDiv1" style="display: none;">
                    <br><hr><br>
                    <div class="row">
                        <label>previous-company-name:</label>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control fc" type="text" name="previous-company-name3" placeholder="" value="@if($workplaces->count() >2){{$workplaces[2]->company_name}}@endif">
                            </div>
                        </div>
                        <label>previous-job-title:</label>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control fc" type="text" name="previous_job_title3" placeholder="" value="@if($workplaces->count() >2){{$user->workPlaces[2]->pivot->user_job_title}}@endif">
                            </div>
                        </div>
                        <div class="col">


                        </div>
                    </div>
                    <div class="row">
                        <label>start date:</label>
                        <div class="col">
                            <input type="date" id="myDate" value="@if($workplaces->count() >2){{$user->workPlaces[2]->pivot->started_at}}@endif"name="start-date3">
                            <p id="demo"></p>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myDate").value;
                                    document.getElementById("demo").innerHTML = x;
                                }
                            </script>
                        </div>
                        <label>end date:</label>
                        <div class="col">
                            <input type="date" id="myDate" value="@if($workplaces->count() >2){{$user->workPlaces[2]->pivot->ended_at}}@endif"name="end-date3">
                            <p id="demo"></p>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myDate").value;
                                    document.getElementById("demo").innerHTML = x;
                                }
                            </script>
                        </div>
                    </div>

                </div>

                <!--end2-->

                <br><br>


                <hr>

                <h2>Education and experience</h2>
                <div class="tab-content pt-3 ">
                    <div class="tab-pane active sp">

                        <div class="row ">

                            <div class="col col-md-3">
                                <label> school:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group ">
                                    <input class="form-control fc  @error('school') is-invalid @enderror" type="text" name="school" placeholder="school" value="@if (!is_null($school)){{ $school->name}} @endif">
                                    @error('school')
                                    <p class="help-block is-invalid">{{$errors->first('school')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col col-md-3">
                                <label for="inputState">Your industry field:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group ">
                                    <select data-placeholder="Job industry" class="chosen-select form-select mt-3"name="industry"  >
                                        <option hidden disabled selected value> -- select an option -- </option>
                                        @foreach($industries as $industry)
                                            @if($industry->id == $user->industry_id)
                                                <option value="{{$industry->id}}" selected>{{$industry->title}}</option>
                                            @else
                                                <option value="{{$industry->id}}">{{$industry->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div id="lname_error" class="val_error">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col col-md-3">
                                <label for="inputState">Years of experience:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group ">
                                    <input class="form-control fc  @error('years-of-experience') is-invalid @enderror" type="text" name="years-of-experience" placeholder="number of your experience years " value="{{$user->years_of_experience}}">
                                    @error('years-of-experience')
                                    <p class="help-block is-invalid">{{$errors->first('years-of-experience')}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col col-md-3">
                                <label for="inputState">skills:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group ">

                                    <select   class="form-control chosen-select  " name="skills[]" multiple required="">
                                        @foreach($skills as $skill)
                                            @if($user->skills->contains($skill->id))
                                                <option  value="{{$skill->id}}" selected> {{$skill->title}}</option>
                                            @else
                                                <option  value="{{$skill->id}}" > {{$skill->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div id="lname_error" class="val_error">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col col-md-3">
                                <label for="inputState">languages:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group  ">

                                    <select   class="chosen-select  form-select mt-3 form-control" name="languages[]" multiple required="">

                                        @foreach($languages as $language)
                                            @if($user->languages->contains($language->id))
                                                <option  value="{{$language->id}}" selected> {{$language->name}}</option>
                                            @else
                                                <option  value="{{$language->id}}" > {{$language->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                    <div id="lname_error" class="val_error">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row ">
                            <div class="col col-md-3">
                                <label for="inputState">Resume:</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <form action="/action_page.php">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="resume" value="{{$user->resume}}">
                                        <label class="custom-file-label" for="customFile">{{$user->resume}}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <h2>Contact info</h2>

                    <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control fc @error('email') is-invalid @enderror" id="inputEmail3" placeholder="Email" name="email" value="{{$user->email}}">
                            @error('email')
                            <p class="help-block is-invalid">{{$errors->first('email')}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control fc @error('phone-number') is-invalid @enderror" id="inputPassword3" placeholder="phone" name="phone-number" value="{{$user->phone_number}}">
                            @error('phone-number')
                            <p class="help-block is-invalid">{{$errors->first('phone-number')}}</p>
                            @enderror
                        </div>
                    </div>
                    <hr><br>


                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-group">
                                <h2>About</h2> <br>
                                <textarea class="form-control fc" rows="5" placeholder="My Bio" name="about" > {{$user->about}}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>




                    <br>

                    <br>


                    <button class="btn btn-danger" type="submit">Save Changes</button>





                </div>

            </div>
        </form>


</div>

<!-- ======= Footer ======= -->
@extends('footeruser')

@section('con')

@endsection

<!-- End #footer -->



<script>
    function toggleFields(boxId, checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        var box = document.getElementById(boxId);
        checkbox.onclick = function() {
            console.log(this);
            if (this.checked) {
                box.style['display'] = 'none';
            } else {
                box.style['display'] = 'block';
            }
        };
    }
    toggleFields('box1', 'checkbox1');

</script>

<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#toggleDiv').click(function(){
            $('#MyDiv').toggle();
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#toggleDiv1').click(function(){
            $('#MyDiv1').toggle();
        });

    });
</script>



<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/date.js')}}"></script>








</body>
</html>
