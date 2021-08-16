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
    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">
    <link rel="stylesheet" href="{{asset('css/company.css')}}">



</head>
<body>

<!--navbar comp-->
@extends('userheader')

@section('include')

@endsection
<!--end navbar-->

<!--start -->
<div class="container">
    <div class="row">


        <!--start nav2-->

        <div class="col-sm-2  "style="margin-top:80px;">

            <div id="div">
                <div class="profile">
                    <a href="/company-profile">
                        <img src="{{asset('storage/profiles/'.auth()->user()->managingCompany->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle">
                    </a>

                </div>

                <div class="container">
                    <nav class="nav flex-column ">
                        <a class="nav-link " href="/company-notifications">

                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16"style="margin-right:10px;">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            Notifications

                        </a>
                        <hr>
                        <a class="nav-link " href="/company-messeging">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16" style="margin-right:10px;">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Messaging
                        </a>


                    </nav>
                </div>

            </div><!-- End Header -->


        </div>
        <!--end nav2-->

        <div class="col-lg-10 sp1 " style="padding-left: 50px">

            <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                        <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
                            <a href="{{asset('storage/profiles/'.$company->profile_thumbnail)}}">
                                <img src="{{asset('storage/profiles/'.$company->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                        <div class="row">
                            <label>{{$company->name}}</label>
                        </div>
                        <div class="row">
                            <label>{{$company->industry->title}}
                             <br> {{number_format($company->employees_count,0)}} employees in this company</label>

                        </div>
                        <div class="row">
                            <label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                {{ucwords($company->country)}},{{ucwords($company->city)}}</label>


                        </div>

                        <div class="row">
                            @if($company->slogan !=null)
                            <p><strong><span class="glyphicon glyphicon-thumbs-up">slogan </span></strong>
                            <div class="col">
                                {{$company->slogan}}
                            </div>
                            </p>
                            @endif
                            <br>
                            <a href="/company-profile/edit">
                            <button class="btn btn-info" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                </svg>Edit</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <div class="form-group">
                        <p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></span>About this company: </strong>
                        <p> {{$company->about}} .</p>
                    </div>
                </div>
            </div>
            <br><br><br>
            <hr>
            @if($company->certificate !=null)
            <div class="row">
                <div class="col mb-3">
                    <div class="form-group">
                        <p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11 8h-7v-1h7v1zm0 2h-7v1h7v-1zm8.692-.939c-.628-.436-.544-.327-.782-1.034-.099-.295-.384-.496-.705-.496h-.003c-.773.003-.64.044-1.265-.394-.129-.092-.283-.137-.437-.137-.154 0-.308.045-.438.137-.629.442-.492.398-1.265.394h-.003c-.321 0-.606.201-.705.496-.238.71-.156.6-.781 1.034-.198.137-.308.353-.308.578l.037.222c.242.708.242.572 0 1.278l-.037.222c0 .224.11.441.309.578.625.434.545.325.781 1.033.099.296.384.495.705.495h.003c.773-.003.64-.045 1.265.394.129.093.283.139.437.139.154 0 .308-.046.437-.138.625-.439.49-.397 1.265-.394h.003c.321 0 .606-.199.705-.495.238-.708.154-.599.782-1.033.198-.137.308-.355.308-.579l-.037-.222c-.242-.71-.24-.573 0-1.278l.037-.222c0-.225-.11-.443-.308-.578zm-3.192 2.939c-.828 0-1.5-.672-1.5-1.5 0-.829.672-1.5 1.5-1.5s1.5.671 1.5 1.5c0 .828-.672 1.5-1.5 1.5zm1.241 3.008l.021-.008h1.238v7l-2.479-1.499-2.521 1.499v-7h1.231c.415.291.69.5 1.269.5.484 0 .931-.203 1.241-.492zm-17.741-13.008v17h12v-2h-10v-13h20v13h-1v2h3v-17h-24zm8 11h-4v1h4v-1z"/></svg>
                                </span>      Certificate: </strong>
                        <p>company certificate :<a href="{{asset('storage/certificates/'.$company->certificate)}}"> view company's certificate</a>  .</p>
                    </div>
                </div>
            </div>
            <hr>
            @endif
            <h2>Contact info</h2>

            <form >
                <div class="form-group row ">
                    <p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></span>E-mail: </strong>
                    <div class="col-sm-10">
                        {{$company->email}}
                    </div>
                </div>


                <div class="form-group row">
                    <p><strong><span class="glyphicon glyphicon-thumbs-up"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z"/>
</svg></span>phone: </strong>
                    <div class="col-sm-10">
                        {{$company->phone_number}}
                    </div>
                </div>

            </form>


            <br>
            <hr>
            <br>


            <h2>our employees :</h2>
            @foreach($company->employees as $user)
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-auto mb-3">
                                    <div class="mx-auto" style="width: 140px;">
                                        <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 140px; background-color: rgb(233, 236, 239);">
                                            <a href="/users/{{$user->id}}">
                                                <img src="{{asset('storage/profiles/'.$user->profile_thumbnail)}}" alt="" class="img-fluid rounded-circle ">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-auto mb-3">
                                    <a href="/users/{{$user->id}}">
                                        <h5>{{$user->name}} </h5>
                                    </a>
                                    <p>{{$user->current_job_title}}<br>{{$user->country}},{{$user->city}}</p>
                                    <h5>About this user:</h5>
                                    <p>{{$user->about}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach



            <div class="d-flex justify-content-center">
                {!! $employees->links()!!}
            </div>



            <br>
            <hr>
            <br>


            </form>


        </div>
    </div>
</div>



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
