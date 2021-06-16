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
<div class="container">
   <div class="row" >
    <!--start nav2-->

  <div class="col-sm-2  "style="margin-top:80px;">

  <div id="div">
  <div class="profile">
  <a href="index.html">
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


  <a class="nav-link" href="#" style="color:red;">
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

</div><!-- End Header -->


  </div>
  <!--end nav2-->

  <div class="col-sm-10 " style="margin-top:6px;">
   
    

<!--start form-->
<div class="styleform">
  <div class="container">
   <div class="row">
       <div class="card d-flex justify-content-center mx-auto my-3 p-5">
           
           <h2>Edite Your Published Job Information</h2>
           <h6 class="text-muted">Fill The Information Below To Publish Your Job Opportunity</h6>
           
               <div class="form-group col-md-6 first"> <label for="inputFirstName">Title job" <span>*</span></label> <input type="text" class="form-control" id="inputtitlejob" name="titlejob" required>
                   <div id="fname_error" class="val_error"></div>
               </div>
               
          
           <div class="form-row" id="box1">
               <div class="form-group col-md-6 "> <label for="inputEmail">City <span>*</span></label> <input type="text" class="form-control" id="inputcity" name="city">
                   <div id="email_error" class="val_error"></div>
               </div>
               <div class="form-group col-md-6"> <label for="inputPhone">Country <span>*</span></label> <input type="text" class="form-control" id="inputcountry" name="country">
                   <div id="phone_error" class="val_error"></div>
               </div>
           </div>

           <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="checkbox1" value="option1"> 
                <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Remote?
                    </label> 
               </div>

           <div class="form-group col-md-6 first">
                <label for="inputLastName">Role<span>*</span>
               </label> <input type="text" class="form-control" id="inputrole" name="role">
               <div id="lname_error" class="val_error">

               </div>
           </div>

<div class="form-group col-md-6 first">
                <label for="inputLastName">Required Skills<span>*</span>  </label> 
             
                <select   class="form-control chosen-select  " name="requiredskills" multiple required="">
                   <option  value=""></option>
                 <option>American Black Bear</option>
                 <option>Asiatic Black Bear</option>
                   <option>Brown Bear</option>
                                                           
                    </select>
               <div id="lname_error" class="val_error">
                   
               </div>
           </div>

           <div class="form-group col-md-6 first">
               <label for="inputLastName">Field<span>*</span>  </label> 
            
               <select   class="chosen-select  form-select mt-3 form-control" name="field" multiple required="">
                   <option  value=""></option>
                 <option>American Black Bear</option>
                   <option>Asiatic Black Bear</option>
                   <option>Brown Bear</option>
                                          
                   </select>
              <div id="lname_error" class="val_error">
                  
              </div>
          </div>

          <div class="form-group col-md-6 first">
           <label for="inputLastName">Required Experience<span>*</span>
          </label> <input type="text" class="form-control" id="inputrequiredexperience" name="requiredexperience">
          <div id="lname_error" class="val_error">

          </div>
      </div>

      <div class="form-check form-check-inline"> 
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 
          <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;Available Transport?</label> 
          <p style="font-size:10px;padding-right:200px ;margin-bottom:50px ;color:#f57e7e">in case the job is not remote</p>
       </div>

       <div class="form-group col-md-6 first">
           <label for="inputLastName">Salary<span>*</span>
          </label> <input type="text" class="form-control" id="inputsalary" name="salary">
          <div id="lname_error" class="val_error">

          </div>
      </div>

      <div class="form-group col-md-6 first">
       <label for="inputLastName">Type of Job<span>*</span>
      </label> <input type="text" class="form-control" id="inputrole" name="typeofjob">
      <div id="lname_error" class="val_error">

      </div>
  </div>


           <div class="form-group mt-0"> <label for="exampleFormControlTextarea1">Job's Description <span>*</span></label> <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="job'sdescription"></textarea>
               <div id="message_error" class="val_error"></div>
           </div>

           <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> <label class="form-check-label" for="inlineCheckbox1">&nbsp;&nbsp;I Agree To The Terms & Conditions</label> </div>
           <div class="form-button pt-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                    <span>Publish The Job</span></button> </div>
       </div>
   </div>
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