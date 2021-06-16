<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Win-Win hiring</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/report.css')}}">
   
</head>
<body>
    
   <!--navbar user-->

   !--navbar user-->
@extends('headerwithsigin')

  @section('cont')
 
  @endsection
   <!--end navbar-->

      <!--end navbar-->
   
       <!--end navbar-->
       <div class="tm-brand-box">
       <div class="tm-double-border-1 tm-border-gray">
        <div class="tm-double-border-2 tm-border-gray-1">
       <h1 class="tm-brand text-uppercase" >REPORT PANEL</h1>

         </div>
    </div>
       </div>
       
       <div class="container">
       <div class="stylep">
        <p >Pleas Fill In The Form Below to Send Your Report: </p>
       </div>
       </div>
       <div class="container">
        <div class="stylep1">
         <p >Reason of The Report: </p>
        </div>
        </div>

<div class="container">
    <div class="form-check stylecircle">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
        <label class="form-check-label" for="exampleRadios1">
          Fraud
        </label>
    </div>
            <div class="form-check stylecircle">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" >
                <label class="form-check-label" for="exampleRadios2">
                 Inappropriate Content
                </label>
            </div>
            <div class="form-check stylecircle">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                <label class="form-check-label" for="exampleRadios3">
                  Other Reason
                </label>
              </div>
</div>
              
<div class="container">
<!--Textarea with icon prefix-->
<div class="md-form mb-4 pink-textarea active-pink-textarea">
    
    <label for="form21">Additional Information:</label>
    <textarea id="form21" class="md-textarea form-control" rows="5" style="width: 600px; height:100px;" ></textarea>
    
  </div>
</div>

<div class="container">
<button type="button" class="btn btn-outline-danger" style="margin-left: 20px;">Send Report
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
        <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
      </svg>
</button>
</div>

<div class="container ">
    
    <h5>How Report Work!:</h5>
    <p style="color:#616161">if we get many reports on a certain thing ,
        we will check if it is true ,and if so the admain of the website will handle it.
    </p>
   
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>