<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/logo1.png') }}">
  <title>RS Aisyiyah Muntilan</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type='text/css' href="{{ asset('css/font-awesome.min.css') }}" >
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('contactform/contactform.js') }}"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Beranda</a></li>
                <li class=""><a href="{{url('daftar')}}">Pendaftaran Online</a></li>
                <li class=""><a href="{{url('lihatjadwal')}}">Lihat Jadwal</a></li>
                <li class=""><a href="{{url('contact')}}">Kontak Kami</a></li>
                <li class=""><a href="{{url('login')}}">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
@yield('content')
<footer id="footer">
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright RS Aisyiyah Muntilan 2018 Developed By <a target="_blank" href='https://www.instagram.com/lutfi_nurlaily/'> Lutfi Nurlaily Khusniati</a>
          </div>
        </div>
      </div>
    </div>
</footer>  
  <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  @yield('extra-js')   
</body>
</html>


