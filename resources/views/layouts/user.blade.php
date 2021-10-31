<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Imaji Sociopreneur Store</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


        @isset($css)
            {{$css}}
        @endif



    <!-- Custom styles for this template -->

</head>

<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{route('user.kopi')}}">Kopi</a>
    <a href="#">BagOn Craft</a>
    <a href="#">Suburganic</a>
    <a href="#">Selo Maeso</a>
    <a href="#">Swajaya Kerya</a>
    <a href="#">Meubel Jatiwangi</a>
    <a href="#">Trijaya Mart</a>
    <div class="container mobile-only">
        <input id="search" type="search" placeholder="Pencarian..."/>
        <br>
        <button class="btn btn-dark mt-2">Cari</button>
    </div>
    <br><br><br>
    <div style="padding:8px">
        <p style="margin: 0px;padding: 0px;font-size: 15px;color:#a0a0a0"><b>Dipasarkan Oleh :</b></p>
        <p style="margin: 0px;padding: 0px;font-size: 12px;color:#a0a0a0">CV.Imaji Sociopreneur</p>
        <p style="margin: 0px;padding: 0px;font-size: 15px;color:#a0a0a0"><b>Layanan Konsumen : </b></p>
        <p style="margin: 0px;padding: 0px;font-size: 12px;color:#a0a0a0">082335456772</p>
        <p style="margin: 0px;padding: 0px;font-size: 15px;color:#a0a0a0"><b>Tim Pemasaran :</b></p>
        <p style="margin: 0px;padding: 0px;font-size: 12px;color:#a0a0a0">085852403917</p>
        <p style="margin: 0px;padding: 0px;font-size: 15px;color:#a0a0a0"><b>Marketing Office :</b></p>
        <p style="margin: 0px;padding: 0px;font-size: 12px;color:#a0a0a0">Jalan Tawang Mangu Gang 6 No 10 Tegal Gede,
            Sumbersari, Jember </p>
        <br>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4861803760627!2d113.72477741464198!3d-8.153671894130918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695f075fb7991%3A0xa30b82d8b8be6c5e!2sIMAJI%20Sociopreneur!5e0!3m2!1sen!2sid!4v1635051178021!5m2!1sen!2sid"
            width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class=" navbar-brand row" style="width:100%">
            <div class="col-sm-4"></div>
            <a class="col-sm-4 mt-3" style="text-align: center;" href="{{route('user.home')}}">
                <img src="{{asset('user/images/sociopreneur.png')}}" style="width:100%;" alt="" srcset="">
            </a>
            <div class="col-sm-4" style="float:right">
                <span style="font-size:30px;cursor:pointer;float:right" onclick="openNav()">&#9776;</span>
                <span class="box dekstop-only" style="float:right; margin-right: 10px;">
            <div class="container-2">
              <form action="" method="post">
                <input id="search" type="search" style="float:right" placeholder="Pencarian..."/>
              </form>
            </div>
          </span>

            </div>

        </div>
    </div>
</nav>

{{$slot}}

<script src="{{asset('user/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

</body>

</html>
