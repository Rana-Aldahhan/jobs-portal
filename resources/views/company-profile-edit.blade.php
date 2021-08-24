<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/editcompany.css')}}">




</head>
<body>

<!--navbar comp-->
@extends('userheader')

@section('include')

@endsection
<!--end navbar-->

<!--edit profile -->

<!--start -->

<div class="container  ">
    <div class="row">


        <!--start nav2-->

        <div class="col-lg-2  "style="margin-top:80px;">

            <div id="div">
                <div class="profile">
                    <a href="/company-profile">
                        <img src="{{asset('storage/profiles/'.auth()->user()->managingCompany->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                    </a>

                </div>

                <div class="container">
                    <nav class="nav flex-column ">
                        <a class="nav-link " href="/company-notifications">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifications

                        </a>
                        <hr>
                        <a class="nav-link " href="/company-messeging">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Messaging
                        </a>


                    </nav>
                </div>

            </div><!-- End Header -->


        </div>
        <!--end nav2-->

        <form action="/company-profile/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-10 sp1 " style="padding-left: 50px">

                <div class="row " style="margin-bottom: 30px">

                    <div class="col-lg-4 col-sm-auto mb-4">
                        <div class="mx-auto" style="width: 140px;">
                            <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
                                <a href="{{asset('storage/profiles/'.$company->profile_thumbnail)}}">
                                    <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                                </a>

                            </div>

                            <input type="file" id="myFile" name="logo" class="@error('logo') is-invalid @enderror" >
                            @error('logo')
                            <p class="help-block is-invalid">{{$errors->first('logo')}}</p>
                            @enderror


                        </div>
                    </div>

                    <div class="col-lg-8 d-flex flex-column flex-sm-row justify-content-between mb-4">
                        <div class="text-center text-sm-left mb-2 mb-sm-0" style="margin-top: 30px; margin-left: 40px ">


                            <div class="row">
                                <label> Company's name:</label>
                                <div class="col">
                                    <div class="form-group col-md-6 ">
                                        <input type="text" style="margin-left: -25px" class="form-control @error('name') is-invalid @enderror" id="validationCustom02" placeholder="name of the company" value="{{$company->name}}" name="name" required>
                                        @error('name')
                                        <p class="help-block is-invalid">{{$errors->first('name')}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label>country:</label>
                                <div class="col">
                                    <div class="form-group ">
                                        <input type="text"  style="margin-left: 60px" class="form-control  @error('country') is-invalid @enderror" id="validationCustom01" placeholder="country" value="{{$company->country}}" name="country" required>
                                        @error('country')
                                        <p class="help-block is-invalid">{{$errors->first('country')}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <label style="margin-left: 70px">city:</label>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="validationCustom02" placeholder="city" value="{{$company->city}}" name="city" required>
                                        @error('city')
                                        <p class="help-block is-invalid">{{$errors->first('city')}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>





                        </div>
                    </div>
                </div>

                <div class="tab-pane active sp">

                    <div class="row" >
                        <label>count of employees:</label>
                        <div class="col">
                            <div class="form-group col-md-6 ">
                                <input type="text" class="form-control @error('employees_count') is-invalid @enderror" id="validationCustom02" placeholder="count of employees" value="{{$company->employees_count}}" name="employees_count" required>
                                @error('employees_count')
                                <p class="help-block is-invalid">{{$errors->first('employees_count')}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label> slogan:</label>
                        <div class="col">
                            <div class="form-group col-md-5 ">
                                <input type="text" style="margin-left: 90px" class="form-control" id="validationCustom02" placeholder="slogan"
                                       value="{{$company->slogan}}" name="slogan" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label style="padding-right: 30px"> Company's industry:</label>

                        <select class="custom-select" name="industry" required>
                            @foreach($industries as $industry)
                                @if($company->industry_id== $industry->id)
                                    <option value="{{$company->industry_id}}" selected> {{$industry->title}} </option>
                                @else
                                    <option value="{{$industry->id}}"> {{$industry->title}} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>



                    <hr>
                    <br>
                    <div class="form-row  ">
                        <label class="form-label" for="customFile">certificates:</label>
                        <div class="col-md-4 mb-3">
                            <form action="/action_page.php">
                                <div class="custom-file mb-3">
                                    <input type="file" style="margin-left: 70px" id="myFile" name="certificate" class="@error('certificate') is-invalid @enderror"
                                           value="{{$company->certificate}}" >
                                    <label class="custom-file-label" for="customFile">{{$company->certificate}}</label>
                                    @error('certificate')
                                    <p class="help-block is-invalid">{{$errors->first('certificate')}}</p>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>



                    <div class="tab-content pt-3 ">



                        <h2>Contact info</h2>


                        <div class="form-group row ">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="validationTooltip01" placeholder="" value="{{$company->email}}" name="email" required>
                                @error('email')
                                <p class="help-block is-invalid">{{$errors->first('email')}}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="validationTooltip01" placeholder="phone" value="{{$company->phone_number}}" name="phone_number" required>
                                @error('phone_number')
                                <p class="help-block is-invalid">{{$errors->first('phone_number')}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">website :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('website_url') is-invalid @enderror" id="validationTooltip01" placeholder="" value="{{$company->website_url}}" name="website_url" required>
                                @error('website_url')
                                <p class="help-block is-invalid">{{$errors->first('website_url')}}</p>
                                @enderror
                            </div>
                        </div>



                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-group">
                                    <label>About this company</label>
                                    <textarea class="form-control fc" rows="5" placeholder="Brief description of this company" name="about"> {{$company->about}}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>

                        <button class="btn btn-dark" type="submit">Save Changes</button>

                    </div>

                </div>
        </form>


    </div>
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
<script src="{{asset('js/date.js')}}"></script>








</body>
</html>
