<!DOCTYPE html>
<html>
<head>
    <title>Reports on {{$reportedCompany->name}}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>




    <link rel="stylesheet" href="{{asset('css/manage.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/orginal.css')}}">
    <link rel="stylesheet" href="{{asset('css/withsigin.css')}}">

    <link rel="stylesheet" href="{{asset('css/saveuser.css')}}">





    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<!--Coded With Love By Mutiullah Samim-->
<body>



<!--navbar user-->
@extends('userheader')

@section('cont')

@endsection

<!--end navbar-->
<
<h4 class="b">Reports on {{$reportedCompany->name}}</h4>


<div class="d-flex bd-highlight" style="margin-left: 420px  ; margin-bottom:30px ; margin-top:50px" >
    <div class="img_cont">
        <a href="/companies/{{$reportedCompany->id}}">
            <img src="{{asset('storage/profiles/'.$reportedCompany->profile_thumbnail)}}" class="rounded-circle user_img">
        </a>

    </div>
    <div class="user_info">
                                    <span><a href="/companies/{{$reportedCompany->id}}">
                                            {{$reportedCompany->name }}
                                        </a> <br> {{$reportedCompany->incomingReports->count()}} report on this company.</span>

    </div>
    <form action="/manage-reports/companies/{{$reportedCompany->id}}/delete" method="post" id="blockcompany">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-info" style="margin-left: 80px; margin-top:30px"
                onclick="document.getElementById('blockcompany').submit(); return false;">
            block company</button>
    </form>
</div>



<div class="container" style="margin-right: -130px">
@foreach($reports as $report)



        <div class="card cardppp w-50" style="height: 180px"  >

            <div class="card-body" >
                <div class="media">
                    <div class="media-left">

                        <div class="img_cont">
                            <a href="@if($report->sendable_type=='App\Models\User')/users/@else/companies/@endif{{$report->sendable->id}}">
                                <img src="{{asset('storage/profiles/'.$report->sendable->profile_thumbnail)}}" class="rounded-circle user_img">
                            </a>
                            <p> </p>
                        </div>

                    </div>
                    <div class="media-body" style="margin-left: 100px">
                        <p class="media-heading">reporter name :{{$report->sendable->name}}</p>
                        <p class="media-heading"> reason : {{$report->reason}}</p>
                        <p class="media-heading">report infomation: {{$report->information}}</p>
                        <p class="media-heading" style="font-size: small ;color: grey"> report sent {{$report->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
    @extends('footeruser')
@section('con')
@endsection



    <script>
        $(document).ready(function(){
            $('#action_menu_btn').click(function(){
                $('.action_menu').toggle();
            });
        });
    </Script>
</body>
</html>
