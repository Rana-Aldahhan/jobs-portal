<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/formcustomisedjob.css')}}">


    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/chosen.jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}">


</head>
<body>

<!--navbar user-->
@extends('userheader')

@section('cont')

@endsection

<!--end navbar-->
<div class="styleform">
    <div class="container">
        <form class="requires-validation" novalidate method="get" action="/job-search-results">
            @csrf

            <div class=" card d-flex justify-content-center mx-auto my-3 p-5" style="width: 40rem;">
                <div class="card-body">
                    <h2 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>      Find Jobs</h2>
                    <h5 class="text-muted ">  Fill the specifications of the job you are searching :</h5>





                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkbox1" value="1" name="remote">

                        <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Remote?
                        </label>

                    </div>

                    <div class="form-row" id="box1">
                        <div class="form-group col-md-6 ">
                            <label for="inputEmail">City </label>
                            <input class="form-control" type="text" name="city" required placeholder="city">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPhone">Country</label>
                            <input class="form-control" type="text" name="country" placeholder="country"  required>


                        </div>

                        <div class="form-check space"id="box1">
                            <input class="form-check-input" type="checkbox" value="1" id="invalidCheck" name="transport" required>
                            <label class="form-check-label">With transpotation?</label>

                        </div>

                    </div>



                    <div class="form-group col-md-6 ">
                        <label for="validationTooltip01"> Industry Field </label>
                        <select class="custom-select"  name="industry" required>
                            <option hidden disabled selected value> -- select an option -- </option>
                            @foreach($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->title}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputState">Your Skills </label>

                        <select   class="form-control chosen-select  " name="skills[]" multiple required="">
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->title}}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="validationTooltip01"> Type of Job Position  </label>
                        <select class="custom-select"  name="typeOfPosition" required>
                            <option hidden disabled selected value> select job position type </option>
                            @foreach($typeOfPosition as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group col-md-6 ">

                        <label for="inputLastName ">Your Experience Years In That Industry
                        </label>
                        <input type="string" class="form-control @error('required_experience') is-invalid @enderror "  name="required_experience"  placeholder="years of your experience" required>
                        @error('required_experience')
                        <p class="help-block is-invalid">{{$errors->first('required_experience')}}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputLastName">Salary <span  style="color:#cb1a1a; font-size:smaller;">(in K$)</span>
                        </label>
                        <input class="form-control @error('salary') is-invalid @enderror" type="string" name="salary" placeholder="Salary" required>
                        @error('salary')
                        <p class="help-block is-invalid">{{$errors->first('salary')}}</p>
                        @enderror

                    </div>
                    <div class="form-group col-md-6 ">
                        <label> sort results by: </label>
                        <select name="sortBy" class="custom-select" >
                            <!--<option hidden disabled selected value> -- select a way to sort -- </option>-->
                            <option value="convenient" @if(request()->old('sortBy') == 'convenient') selected @endif>
                                the most convenient </option>
                            <option value="date" @if(request()->old('sortBy') == 'date') selected @endif >
                                the latest</option>
                            <option value="salary" @if(request()->old('sortBy') == 'salary') selected @endif>
                                the highest salary</option>
                        </select>
                    </div>




                    <div class="form-button pt-4"style="margin-right: 70px;">
                        <button id="submit" type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span >Search</span>
                        </button>
                    </div>



                </div>

            </div>
        </form>
    </div>
</div>


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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>
