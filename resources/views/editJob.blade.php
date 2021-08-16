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
    <link rel="stylesheet" href="{{asset('css/createuserjob.css')}}">
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">

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
        <form class="form" novalidate="" method="POST" action="/jobs/{{$job->id}}/edit">
            @csrf
            @method('PUT')

            <div class=" card d-flex justify-content-center mx-auto my-3 p-5" style="width: 40rem;">
                <div class="card-body">
                    <h2 class="card-title">Edit your published Job</h2>
                    <h6 class="text-muted">Fill The Information Below To Edit Your Published Job Opportunity</h6>


                    <div class="form-group col-md-6 first  @error('title') is-invalid @enderror"> <label for="inputFirstName">Title job" <span>*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputtitlejob" name="title"  value="{{$job->title}}" required>
                        @error('title')
                        <p class="help-block is-invalid">{{$errors->first('title')}}</p>
                        @enderror
                        <div id="fname_error" class="val_error"></div>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkbox1" value="1" @if($job->remote) checked @endif  name="remote">

                        <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Remote?
                        </label>
                        @error('remote')
                        <p class="help-block is-invalid">{{$errors->first('remote')}}</p>
                        @enderror
                    </div>


                    <div class="form-row" id="box1">
                        <div class="form-group col-md-6  @error('city') is-invalid @enderror "> <label for="inputEmail">City <span>*</span></label> <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputcity" name="city" value="{{$job->city}}">
                            @error('city')
                            <p class="help-block is-invalid">{{$errors->first('city')}}</p>
                            @enderror
                            <div id="email_error" class="val_error"></div>
                        </div>
                        <div class="form-group col-md-6  @error('country') is-invalid @enderror"> <label for="inputPhone">Country <span>*</span></label> <input type="text" class="form-control  @error('country') is-invalid @enderror" id="inputcountry" name="country" value="{{$job->country}}">
                            @error('country')
                            <p class="help-block is-invalid">{{$errors->first('country')}}</p>
                            @enderror
                            <div id="phone_error" class="val_error"></div>

                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"@if($job->transportation) checked @endif name="transport">
                            <label class="form-check-label " for="inlineCheckbox1" >&nbsp;&nbsp;Available Transport?</label>
                            @error('transport')
                            <p class="help-block is-invalid">{{$errors->first('transport')}}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label class="stylelable"@error('role') is-invalid @enderror> Role<span>*</span></label>
                        <input type="text" class="form-control  @error('role') is-invalid @enderror" id="inputrole" name="role" value="{{$job->role}}">
                        @error('role')
                        <p class="help-block is-invalid">{{$errors->first('role')}}</p>
                        @enderror
                        <div id="lname_error" class="val_error">

                        </div>
                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="validationTooltip01"> Industry field <span>*</span> </label>
                        <select class="custom-select" required name="industry">
                            @foreach($industries as $industry)
                                @if($job->industry_id == $industry->id)
                                    <option  value="{{$industry->id}}" selected> {{$industry->title}}</option>
                                @else
                                    <option  value="{{$industry->id}}" > {{$industry->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('industries')
                        <p class="help-block is-invalid">{{$errors->first('industries')}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputState">skills <span>*</span></label>

                        <select   class="form-control chosen-select  " name="skills[]" multiple required="">
                            @foreach($skills as $skill)
                                @if($job->requiredSkills->contains($skill->id))
                                    <option  value="{{$skill->id}}" selected> {{$skill->title}}</option>
                                @else
                                    <option  value="{{$skill->id}}" > {{$skill->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('skills')
                        <p class="help-block is-invalid">{{$errors->first('skills')}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputLastName">Type of job position <span>*</span>  </label>

                        <select   class="custom-select" name="position" required="">
                            @foreach($typeOfPositions as $typeOfPosition)
                                @if($job->positionType_id == $typeOfPosition->id)
                                    <option  value="{{$typeOfPosition->id}}" selected> {{$typeOfPosition->name}}</option>
                                @else
                                    <option  value="{{$typeOfPosition->id}}" > {{$typeOfPosition->name}}</option>
                                @endif
                            @endforeach

                        </select>
                        @error('position')
                        <p class="help-block is-invalid">{{$errors->first('position')}}</p>
                        @enderror
                        <div id="lname_error" class="val_error">

                        </div>
                    </div>

                    <div class="form-group col-md-6 ">

                        <label for="inputLastName "class="@error('experience') is-invalid @enderror">Required years of  experience<span>*</span>
                        </label>

                        <input type="text" class="form-control @error('experience') is-invalid @enderror" id="inputrequiredexperience" name="experience" value="{{$job->required_experience}}">
                        @error('experience')
                        <p class="help-block is-invalid">{{$errors->first('experience')}}</p>
                        @enderror
                        <div id="lname_error" class="val_error">

                        </div>

                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="inputLastName"class="@error('salary') is-invalid @enderror">Salary estimated in k$:<span>*</span>
                        </label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" id="inputsalary" name="salary" value="{{$job->salary}}">
                        @error('salary')
                        <p class="help-block is-invalid">{{$errors->first('salary')}}</p>
                        @enderror
                        <div id="lname_error" class="val_error">

                        </div>
                    </div>

                    <div class="form-group mt-0 ">
                        <label for="exampleFormControlTextarea1">Job's Description <span>*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="6"
                                  name="description"   > {{$job->description}}  </textarea>
                        @error('description')
                        <p class="help-block is-invalid">{{$errors->first('description')}}</p>
                        @enderror
                        <div id="message_error" class="val_error"></div>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;I Agree To The Terms & Conditions</label> </div>
                    <div class="form-button pt-4" style="margin-right: 70px;">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" >
                            <span>Save edits</span></button> </div>


                </div>
            </div>
        </form>
    </div>
</div>


<!-- main -->
<!--end form-->
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
