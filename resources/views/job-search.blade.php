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
    <link rel="stylesheet" href="{{asset('css/formcustomisedjob.css')}}">


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



<!--start form-->

<div class="form-body">
        <div class="row">
            <div class="form-holder">
 <div class="form-content">
                    <div class="form-items">
                        <h3>Find Jobs</h3>
      <p>Fill in the data below.</p>
        <form class="requires-validation" novalidate method="get" action="/job-search-results">

            <div class="form-check space">
                <input class="form-check-input" type="checkbox" value="1" id="checkbox1" name="remote" required>
                <label class="form-check-label">Remote?</label>&nbsp;&nbsp;

            </div>

            <div class="col-md-12 space"id="box1">

                <input class="form-control" type="text" name="city" placeholder="City" required>
                <input class="form-control" type="text" name="country" placeholder="Country" required>

            </div>


            <div class="col-md-12 space">
                <div class="sss">
                    <select data-placeholder="Job industry" class="chosen-select form-select mt-3"name="industries[]"  required>
                        @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-12 space">
              <div class="sss">
                <select multiple data-placeholder="Your Skills" class="chosen-select form-select mt-3" name="skills[]"  required>
                    @foreach($skills as $skill)
                      <option value="{{$skill->id}}">{{$skill->title}}</option>
                    @endforeach

                </select>
              </div>
            </div>


            <div class="col-md-12 space">
              <div class="sss">
            <select data-placeholder="Type of job position" class="chosen-select form-select mt-3"name="typeOfPosition[]"  required>
                @foreach($typeOfPosition as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
        </select>
              </div>
            </div>


            <div class="col-md-12 space">
                <input class="form-control" type="string" name="required_experience" placeholder="Your Experience years in that industry " required>

            </div>

            <div class="col-md-12 space">
                <input class="form-control" type="string" name="salary" placeholder="Salary" required>

            </div>



        <div class="form-check space"id="box1">
          <input class="form-check-input" type="checkbox" value="1" id="invalidCheck" name="transport" required>
          <label class="form-check-label">With transpotation?</label>

        </div>




            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary btnform">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
