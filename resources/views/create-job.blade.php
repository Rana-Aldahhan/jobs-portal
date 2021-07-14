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
    <link rel="stylesheet" href="{{asset('css/createuserjob.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

</head>
<body>

<!--navbar user-->
@extends('headerwithsigin')

@section('cont')

@endsection

  <!--end navbar-->

  <div class="styleform">
    <div class="container">
        <form class="requires-validation" novalidate method="post" action="/create-job">
            @csrf
     <div class="row">
         <div class="card d-flex justify-content-center mx-auto my-3 p-5">

             <h2>Create New Job</h2>
             <h6 class="text-muted">Fill The Information Below To Publish Your Job Opportunity</h6>

                 <div class="form-group col-md-6 first"> <label for="inputFirstName">Title job" <span>*</span></label> <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputtitlejob" name="title"  value="{{old('title')}}" required>
                     @error('title')
                     <p class="help-block is-invalid">{{$errors->first('title')}}</p>
                     @enderror
                     <div id="fname_error" class="val_error"></div>
                 </div>
             <div class="form-check form-check-inline">
                 <input class="form-check-input" type="checkbox" id="checkbox1" value="1" name="remote">

                 <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Remote?
                 </label>
                 @error('remote')
                 <p class="help-block is-invalid">{{$errors->first('remote')}}</p>
                 @enderror
             </div>


             <div class="form-row" id="box1">
                 <div class="form-group col-md-6 "> <label for="inputEmail">City <span>*</span></label> <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputcity" name="city" value="{{old('city')}}">
                     @error('city')
                     <p class="help-block is-invalid">{{$errors->first('city')}}</p>
                     @enderror
                     <div id="email_error" class="val_error"></div>
                 </div>
                 <div class="form-group col-md-6"> <label for="inputPhone">Country <span>*</span></label> <input type="text" class="form-control  @error('country') is-invalid @enderror" id="inputcountry" name="country" value="{{old('country')}}">
                     @error('country')
                     <p class="help-block is-invalid">{{$errors->first('country')}}</p>
                     @enderror
                     <div id="phone_error" class="val_error"></div>

                 </div>
                 <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="transport">
                        <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Available Transport?</label>
                     @error('transport')
                     <p class="help-block is-invalid">{{$errors->first('transport')}}</p>
                     @enderror
                    </div>

             </div>


             <div class="form-group col-md-6 first">
                  <label for="inputLastName">Role<span>*</span>
                 </label> <input type="text" class="form-control  @error('role') is-invalid @enderror" id="inputrole" name="role" value="{{old('role')}}">
                 @error('role')
                 <p class="help-block is-invalid">{{$errors->first('role')}}</p>
                 @enderror
                 <div id="lname_error" class="val_error">

                 </div>
             </div>

             <div class="form-group col-md-6 first">
                 <label for="inputLastName">Industry field<span>*</span>  </label>

                 <select data-placeholder="Job industry"  class="chosen-select  form-select mt-3 form-control" name="industries" >
                     @foreach($industries as $industry)
                         <option value="{{$industry->id}}"> {{$industry->title}} </option>
                     @endforeach

                 </select>
                 @error('industries')
                 <p class="help-block is-invalid">{{$errors->first('industries')}}</p>
                 @enderror

             </div>

 <div class="form-group col-md-6 first">
                  <label for="inputLastName">Required Skills<span>*</span>  </label>

                  <select   class="form-control chosen-select  " name="skills[]" multiple required >
                      @foreach($skills as $skill)
                          <option value="{{$skill->id}}">{{$skill->title}}</option>
                      @endforeach


                      </select>
                     @error('skills')
                     <p class="help-block is-invalid">{{$errors->first('skills')}}</p>
                     @enderror
             </div>


             <div class="form-group col-md-6 first">
                 <label for="inputLastName">Type of job position <span>*</span>  </label>

                 <select   class="chosen-select  form-select mt-3 form-control" name="position" required="">
                     @foreach($typeOfPosition as $position)
                         <option value="{{$position->id}}">{{$position->name}}</option>
                     @endforeach

                 </select>
                 @error('position')
                 <p class="help-block is-invalid">{{$errors->first('position')}}</p>
                 @enderror
                 <div id="lname_error" class="val_error">

                 </div>
             </div>

            <div class="form-group col-md-6 first">
             <label for="inputLastName">Required years of  experience<span>*</span>
            </label> <input type="text" class="form-control @error('experience') is-invalid @enderror" id="inputrequiredexperience" name="experience" value="{{old('experience')}}">
                @error('experience')
                <p class="help-block is-invalid">{{$errors->first('experience')}}</p>
                @enderror
            <div id="lname_error" class="val_error">

            </div>
        </div>


         <div class="form-group col-md-6 first">
             <label for="inputLastName">Salary estimated in k$:<span>*</span>
            </label> <input type="text" class="form-control @error('salary') is-invalid @enderror" id="inputsalary" name="salary" value="{{old('salary')}}">
             @error('salary')
             <p class="help-block is-invalid">{{$errors->first('salary')}}</p>
             @enderror
            <div id="lname_error" class="val_error">

            </div>
        </div>




             <div class="form-group mt-0"> <label for="exampleFormControlTextarea1">Job's Description <span>*</span></label>
                 <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="6"
                           name="description"   >   </textarea>
                 @error('description')
                 <p class="help-block is-invalid">{{$errors->first('description')}}</p>
                 @enderror
                 <div id="message_error" class="val_error"></div>
             </div>

             <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;I Agree To The Terms & Conditions</label> </div>
             <div class="form-button pt-4">
                  <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                      <span>Publish The Job</span></button> </div>
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
