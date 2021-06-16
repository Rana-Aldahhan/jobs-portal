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
    <link rel="stylesheet" href="{{asset('css/pagecompany.css')}}">
    <link rel="stylesheet" href="{{asset('css/craetecompjob.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>


</head>
<body>
    
 <!--navbar comp-->
 @extends('headercomp')

 @section('include')

 @endsection
   <!--end navbar-->



<!--start form-->

<!-- main -->
<div class="main-w3layouts wrapper main">
    <h1>Create New Job</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="#" method="post">
                <input class="text" type="text" name="titlejob" placeholder="Title job" required="">




                <div class="form-group">
                <div class="col-md-4" id="box1" >
  <input class="text email" type="text" name="city" placeholder="City" required="">
  <input class="text" type="text" name="country" placeholder="Country" required="">
  </div>
  <div class="col-md-12">
    <label style="color:white;padding-top:10px">Remote?</label>&nbsp;&nbsp;
    <!--<input id="checkbox" type="checkbox">-->
    <input id="checkbox1" type="checkbox" name="remote">
  </div>
  <!--<div class="col-md-4" id="box" style="display: none;">-->

</div>

                <input class="text w3lpass" type="text" name="role" placeholder="Role" required="">


      <div class="col-md-12  ">
        <div class="space">
        <select data-placeholder="Required Skills"  class="formcontrol chosen-select  " name="requiredskills" multiple required="">
        <option  value=""></option>
      <option>American Black Bear</option>
      <option>Asiatic Black Bear</option>
        <option>Brown Bear</option>
                                                
         </select>
        </div>
            </div>


            <div class="col-md-12  ">
              <div class="space">
              <select data-placeholder="Field"  class="chosen-select  form-select mt-3 " name="field" multiple required="">
                 <option  value=""></option>
               <option>American Black Bear</option>
                 <option>Asiatic Black Bear</option>
                 <option>Brown Bear</option>
                                        
                 </select>
              </div>             
                  </div>


     <input class="text w3lpass" type="text" name="RequiredExperience" placeholder="Required Experience" required="">


     <div class="form-group">
  <div class="col-md-12">
    <label style="color:white;padding-top:10px;padding-bottom:10px">Available Transport?</label>&nbsp;&nbsp;
   
    <!--<input id="checkbox" type="checkbox">-->
    <input id="checkbox1" type="checkbox" name="availabletransport">
    <p style="font-size:10px;padding-right:200px ;margin-bottom:30px ;color:#ef9a9a">in case the job is not remote</p>
  </div>

  <input class="text w3lpass" type="text" name="salary" placeholder="Salary" required="" >


  <input class="text w3lpass" type="text" name="typeofjob" placeholder="Type of Job" required="">

  <div class="form-group">
<label for="exampleFormControlTextarea1" style="color:white">Job's Description</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="job'sdescription"></textarea>
</div>



                <div class="wthree-text">
                    <label class="anim">
                        <input type="checkbox" class="checkbox" required="" name="agree">
                        <span>I Agree To The Terms & Conditions</span>
                    </label>
                    <div class="clear"> </div>
                </div>


                <input type="submit" value="Publish The Job" name="publish">
            </form>
        
        </div>
    </div>

</div>
<!-- //main -->


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