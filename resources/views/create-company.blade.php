<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create company account</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/createacompany.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


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

<!--create a company account -->



<form enctype="multipart/form-data" class="needs-validation formstyle" novalidate method="post" action="\create-company" >
    @csrf
    <h2 class="hstyle">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
        </svg>
        create company account</h2>
    <div class="container" style="margin-top: 50px; margin-left: 240px ;padding-right: 100px">
        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationCustom02"style="margin-top:40px">logo:</label>
            </div>
            <div class="col-md-3 mb-2">

                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="logo" value="{{old('logo')}}">
                    <label class="custom-file-label" for="customFile"><i class="fa fa-upload fa-1x" aria-hidden="true"style="padding-right:10px"></i>Choose file</label>
                    @error('logo')
                    <p class="help-block is-invalid">{{$errors->first('name')}}</p>
                    @enderror
                </div>

            </div>
        </div>

        <hr>

        <div class="form-row  ">
            <div class="col col-md-3">
                <label for="validationCustom02">name of the company:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="validationCustom02" placeholder="name of the company" value="{{old('name')}}" name="name" required>
                @error('name')
                <p class="help-block is-invalid">{{$errors->first('name')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-row ">

            <div class="col-md-4  mb-3">
                <label for="validationCustom01">country:</label>
                <input type="text" class="form-control  @error('country') is-invalid @enderror" id="validationCustom01" placeholder="country" value="{{old('country')}}" name="country" required>
                @error('country')
                <p class="help-block is-invalid">{{$errors->first('country')}}</p>
                @enderror
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom02">city:</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="validationCustom02" placeholder="city" value="{{old('city')}}" name="city" required>
                @error('city')
                <p class="help-block is-invalid">{{$errors->first('city')}}</p>
                @enderror
            </div>


        </div>

        <div class="form-row  ">
            <div class="col col-md-3">
                <label for="validationCustom02">slogan:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" id="validationCustom02" placeholder="slogan"
                       value="{{old('slogan')}}" name="slogan" required>
            </div>
        </div>

        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationTooltip01"> Industry: </label>
            </div>
            <div class="col-md-3 mb-3">
                <select class="custom-select" name="industry" required>
                    @foreach($industries as $industry)
                        @if(old('industry')== $industry->id)
                            <option value="{{$industry->id}}" selected> {{$industry->title}} </option>
                        @else
                        <option value="{{$industry->id}}"> {{$industry->title}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationCustom02">Count of employees:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('employees_count') is-invalid @enderror" id="validationCustom02" placeholder="count of employees" value="{{old('employees_count')}}" name="employees_count" required>
                @error('employees_count')
                <p class="help-block is-invalid">{{$errors->first('employees_count')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  ">
            <div class="col col-md-4">
                <label for="validationCustom02">other responsible user on this account:</label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('admin1') is-invalid @enderror" id="validationCustom02" placeholder="" value="{{old('admin1')}}" name="admin1" required>
                @error('admin1')
                <p class="help-block is-invalid">{{$errors->first('admin1')}}</p>
                @enderror
            </div>
            <div class="col">
                <input type="button" id="toggleDiv" value="+">

            </div>
        </div>

        <!--1-->
        <div  id="MyDiv" style="display: none;">
            <br><hr><br>
            <div class="form-row  ">
                <div class="col col-md-4">
                    <label for="validationCustom02">other responsible user on this account:</label>
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control @error('admin2') is-invalid @enderror" id="validationCustom02" placeholder="" value="{{old('admin2')}}" name="admin2" required>
                    @error('admin2')
                    <p class="help-block is-invalid">{{$errors->first('admin2')}}</p>
                    @enderror
                </div>
                <div class="col">
                    <input type="button" id="toggleDiv1" value="+">

                </div>
            </div>
        </div>
        <!--end1-->


        <!--2-->
        <div  id="MyDiv1" style="display: none;">
            <br><hr><br>
            <div class="form-row  ">
                <div class="col col-md-4">
                    <label for="validationCustom02">other responsible user on this account:</label>
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control @error('admin3') is-invalid @enderror" id="validationCustom02" placeholder="" value="{{old('admin3')}}" name="admin3" required>
                    @error('admin3')
                    <p class="help-block is-invalid">{{$errors->first('admin3')}}</p>
                    @enderror
                </div>
            </div>
            <br><hr><br>
        </div>
        <!--end2-->



        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationTooltip01">phone: </label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="validationTooltip01" placeholder="phone" value="{{old('phone_number')}}" name="phone_number" required>
                @error('phone_number')
                <p class="help-block is-invalid">{{$errors->first('phone_number')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationTooltip01"> E-mail </label>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text"  class="form-control @error('email') is-invalid @enderror" id="validationTooltip01" placeholder="email" value="{{old('email')}}" name="email" required>
                @error('email')
                <p class="help-block is-invalid">{{$errors->first('email')}}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  ">
            <div class="col col-md-2">
                <label for="validationTooltip01"> Website </label>

            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('website_url') is-invalid @enderror" id="validationTooltip01" placeholder="website URL" value="{{old('website_url')}}" name="website_url" required>
                @error('website_url')
                <p class="help-block is-invalid">{{$errors->first('website_url')}}</p>
                @enderror
            </div>
        </div>


        <div class="form-row  ">
            <label class="form-label" for="customFile">certificates:</label>
            <input type="file" class="custom-file-input1" id="customFile"name="certificate"style="padding-left:120px"  value="{{old('certificate')}}"/>
        </div>
        <div class="form-row  ">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label>About</label>
                    <textarea class="form-control" rows="5" cols="15" placeholder=""  name="about" > {{old('about')}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-info" type="submit" style="margin-left: -5px">create the company</button>

    </div>
</form>
<!--end create a company account -->

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
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
