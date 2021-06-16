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
    <link rel="stylesheet" href="{{asset('css/createacompany.css')}}">


    
</head>
<body>


 <!--navbar user-->
 
 @extends('headerwithsigin')

 @section('cont')

 @endsection
   <!--end navbar-->

<!--create a company account -->



<form class="needs-validation formstyle" novalidate>
<h4 class="hstyle">welcome to the create company wizard</h4>
<div class="container">
  <div class="form-row  ">
    <div class="col col-md-2">
        <label for="validationCustom02">logo:</label>
    </div>
    <div class="col-md-3 mb-2">
    <label class="custom-file">
        <input type="file" id="file" class="custom-file-input">
        <span class="custom-file-control"></span>
      </label>
    </div>
  </div>

  <div class="form-row  ">
    <div class="col col-md-3">
    <label for="validationCustom02">name of the company:</label>
    </div>
    <div class="col-md-4 mb-3">
        <input type="text" class="form-control" id="validationCustom02" placeholder="name of the company" value="" name="name" required>
      </div>
    </div>

  <div class="form-row ">

    <div class="col-md-4  mb-3">
    <label for="validationCustom01">country:</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="country" value="" name="country" required>
    </div>

    <div class="col-md-4 mb-3">
    <label for="validationCustom02">city:</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="city" value="" name="city" required>
    </div>

    <div class="col-md-4 mb-3">
    <label for="validationCustom02">region:</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="region" value="" name="region" required>
    </div>
  </div>

  <div class="form-row  ">
    <div class="col col-md-3">
    <label for="validationCustom02">slogan:</label>
    </div>
    <div class="col-md-4 mb-3">
        <input type="text" class="form-control" id="validationCustom02" placeholder="slogan" value="" name="slogan" required>
      </div>
    </div>

  <div class="form-row  ">
  <div class="col col-md-2">
  <label for="validationTooltip01"> industry: </label>
  </div>
    <div class="col-md-3 mb-3">
    <select class="custom-select" required>
      <option value="">Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    </div>
  </div>

  <div class="form-row  ">
  <div class="col col-md-2">
  <label for="validationCustom02">count of Employs:</label>
  </div>
  <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" placeholder="count of Employs" value="" name="count of employs" required>
    </div>
  </div>

  <div class="form-row  ">
  <div class="col col-md-4">
  <label for="validationCustom02">other responsible user on this account:</label>
  </div>
  <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" placeholder="" value="" name="other" required>
    </div>
  </div>

  <div class="form-row  ">
  <div class="col col-md-2">
  <label for="validationTooltip01">phone: </label>
  </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationTooltip01" placeholder="phone" value="" name="phone" required>
    </div>
  </div>

  <div class="form-row  ">
  <div class="col col-md-2">
  <label for="validationTooltip01"> E-mail </label>
  </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationTooltip01" placeholder="" value="" name="mail" required>
    </div>
  </div>

  <div class="form-row  ">
  <div class="col col-md-2">
  <label for="validationTooltip01"> Website </label>
  </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationTooltip01" placeholder="" value="" name="web" required>
    </div>
  </div>

  <div class="form-row  ">
    <div class="col col-md-2">
    <label for="validationTooltip01">  certificates: </label>
    </div>
    <div class="col-md-3 mb-2">
      <label class="custom-file">
          <input type="file" id="file" class="custom-file-input">
          <span class="custom-file-control"></span>
        </label>
      </div>
    </div>
    <div class="form-row  ">
      <div class="col-md-4 mb-3">
      <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" rows="5" placeholder=""></textarea>
                              </div>
      </div>
    </div>
    <button class="btn btn-outline-info" type="submit">create the company</button>
  
</div>
</form>
<!--end create a company account -->



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
