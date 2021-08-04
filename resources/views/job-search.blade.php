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
@extends('headerwithsigin')

@section('cont')

@endsection

<!--end navbar-->
<div class="styleform">
    <div class="container">
        <form class="requires-validation" novalidate method="get" action="/job-search-results">
            @csrf

            <div class=" card d-flex justify-content-center mx-auto my-3 p-5" style="width: 40rem;">
                <div class="card-body">
                    <h2 class="card-title">Find Jobs</h2>
                    <h5 class="text-muted "> <i class="fa fa-hand-o-down" aria-hidden="true"></i>Fill in the data below.</h5>





                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkbox1" value="1" name="remote">

                        <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Remote?
                        </label>

                    </div>

                    <div class="form-row" id="box1">
                        <div class="form-group col-md-6 ">
                            <label for="inputEmail">City <span>*</span></label>
                            <input class="form-control" type="text" name="city" required>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPhone">Country <span>*</span></label>
                            <input class="form-control" type="text" name="country"  required>


                        </div>

                        <div class="form-check space"id="box1">
                            <input class="form-check-input" type="checkbox" value="1" id="invalidCheck" name="transport" required>
                            <label class="form-check-label">With transpotation?</label>

                        </div>

                    </div>



                    <div class="form-group col-md-6 ">
                        <label for="validationTooltip01"> Industry Field <span>*</span> </label>
                        <select class="custom-select" required>
                            <option hidden disabled selected value> -- select an option -- </option>
                            @foreach($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->title}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputState">Your Skills <span>*</span></label>

                        <select   class="form-control chosen-select  " name="skills[]" multiple required="">
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->title}}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="validationTooltip01"> Type of Job Position <span>*</span> </label>
                        <select class="custom-select" required>
                            <option hidden disabled selected value> -- select an option -- </option>
                            @foreach($typeOfPosition as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group col-md-6 ">

                        <label for="inputLastName ">Your Experience Years In That Industry <span>*</span>
                        </label>
                        <input type="string" class="form-control "  name="required_experience" required>


                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputLastName">Salary<span>*</span>
                        </label>
                        <input class="form-control" type="string" name="salary" placeholder="Salary" required>

                    </div>
                    <div class="form-group col-md-6 ">
                        <label> sort results by: </label>
                        <select name="sortBy" class="custom-select" >
                            <option hidden disabled selected value> -- select a way to sort -- </option>
                            <option value="convenient" @if(request()->old('sortBy') == 'convenient') selected @endif>
                                the most convenient </option>
                            <option value="date" @if(request()->old('sortBy') == 'date') selected @endif >
                                the latest</option>
                            <option value="salary" @if(request()->old('sortBy') == 'salary') selected @endif>
                                the highest salary</option>
                        </select>
                    </div>




                    <div class="form-button pt-4">
                        <button id="submit" type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span>Search</span></button> </div>



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
