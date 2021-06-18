<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">
    <link rel="stylesheet" href="{{asset('css/explore.css')}}">


</head>
<body>


<!--navbar user-->
@if(Auth:: check())
@extends('headerwithsigin')
@else
@extends('userheader')
@endif

@section('cont')

@endsection
<!--end navbar-->


<div class="jumbotron jumbotron-fluid jumb" >
    <div class="container">
        <h5 class="display-4">You Can Explore Companies and People </h5>

    </div>
</div>




<!--start company search-->

<div class="styleexp">
    <div class="container">

        <div class="row">

            <div class="col .col-12">

                <div class="card caedhh border-light mb-3" style="max-width: 40rem; margin-left:40px;">

                    <img src="{{asset('img/person.png')}}" alt="Person With Blue Shirt"style="margin-top-130px;height:200px;width:200px">

                    <div class="card-header">Explore Companies</div>

                    <div class="card-body text-info">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"style="color:white"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<!-- Left-aligned -->
<div class="container">
    <form action="/action_page.php" id="field">
        <label for="field">Chose a Field:</label>
        <select id="field" name="field" form="field">
            <option value="volvo">kjk</option>
            <option value="saab">njk</option>
            <option value="opel">kllkhbgjvgf</option>
            <option value="audi">klkl</option>
        </select>
        <button id="submit" type="submit" class="btn btn-outline-danger btnform">OK</button>
    </form>
    <br>
</div>

<!--start company-->
<div class="container">

    <div class="card cardppp"  >
        <a id="update" href="#" class="editlink">
            <div class="card-body">


                <div class="container">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('img/images.png')}}" class="media-object imgmed" >
                        </div>


                        <div class="media-body">
                            <h5 class="media-heading">Company's Name</h5>
                            <p>industry , count of employees
                                city , country</p>

                            <h5 class="media-heading">About the Company</h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea,
                                placeat .</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>

</div>
<!-- end  company-->

<!--start company2-->

<div class="container">

    <div class="card cardppp" >
        <a id="update" href="#" class="editlink">
            <div class="card-body">
                <div class="container">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('img/images.png')}}" class="media-object imgmed" >
                        </div>


                        <div class="media-body">
                            <h5 class="media-heading">Company's Name</h5>
                            <p>industry , count of employees
                                city , country</p>

                            <h5 class="media-heading">About the Company</h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea,
                                placeat .</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>
</div>
<!-- end  company2-->
</div>
<!--end company search-->

<!--start people search-->


<div class="styleexp">
    <div class="container">

        <div class="row">

            <div class="col .col-12">

                <div class="card caedhh border-light mb-3" style="max-width: 50rem;margin-left:40px;">
                    <img src="{{asset('img/person.png')}}" alt="Person With Blue Shirt"style="margin-top-130px;height:200px;width:200px">
                    <div class="card-header">Explore People</div>

                    <div class="card-body text-info">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"style="color:white"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<!-- Left-aligned -->
<div class="container">
    <form action="/action_page.php" id="carform">
        <label for="fname">People Education:</label>
        <input type="text" id="fname" name="people education">


        <br>

        <label for="field">Chose a Field:</label>
        <select id="field" name="field" form="field">
            <option value="volvo">kjk</option>
            <option value="saab">njk</option>
            <option value="opel">kllkhbgjvgf</option>
            <option value="audi">klkl</option>
        </select>
        <button id="submit" type="submit" class="btn btn-outline-danger btnform">OK</button>
    </form>
</div>


<!--start people-->

<div class="container">

    <div class="card cardppp">
        <a id="update" href="#" class="editlink">
            <div class="card-body">
                <div class="container">

                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('img/img_avatar-1.png')}}" class="media-object imgmed" >
                        </div>


                        <div class="media-body">
                            <h5 class="media-heading">User's Name</h5>
                            <p>JOb Title ,
                                city , country</p>

                            <h5 class="media-heading">About this person</h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea,
                                placeat .</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>


</div>
<!-- end  people-->

<!--start people22-->

<div class="container">
    <div class="card cardppp">
        <a id="update" href="#" class="editlink">
            <div class="card-body">
                <div class="container">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{asset('img/img_avatar-1.png')}}" class="media-object imgmed" >
                        </div>


                        <div class="media-body">
                            <h5 class="media-heading">User's Name</h5>
                            <p>JOb Title ,
                                city , country</p>

                            <h5 class="media-heading">About this person</h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus, ea,
                                placeat .</p>


                        </div>
                    </div>


                </div>
            </div>
        </a>
    </div>

</div>
<!-- end  people2-->
</div>
<!--end people search-->


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
