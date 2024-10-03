<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Diagrama Leonardo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('landing/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('landing/images/carga.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="#"><img src="{{ asset('landing/images/logoLEO.png') }}"
                                                alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"> Inicio </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sobre nosotros</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contacto</a>
                                        </li>
                                    </ul>
                                    @if (Route::has('login'))
                                        <ul class="navbar-nav business_box">
                                            @auth
                                                <li class="nav-item ">
                                                    <a href="{{ url('/misdiagramas') }}" class="read_more">Volver</a>
                                                </li>
                                            @else
                                                <li class="nav-item  mr-15px ">
                                                    <a href="{{ route('login') }}" class="read_more">Iniciar Sesion</a>
                                                </li>
                                                @if (Route::has('register'))
                                                    <li class="nav-item">
                                                        <a href="{{ route('register') }}" class="read_more">Registrarse</a>
                                                    </li>
                                                @endif
                                            @endauth
                                        </ul>
                                    @endif
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
                <div class="container-fluid">
                    <div class="row d_flex">
                        <div class="col-md-5">
                            <div class="text-bg">
                                <h1>Diagramador Leonardo</h1>
                                <p>Crea tus diagramas de clases en sesiones con tu equipo de desarrollo con la mejor
                                    pagina web</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-img">
                                <figure><img src="{{ asset('landing/images/lo1.png') }}" alt="#" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <!-- end banner -->
    <!-- business -->
    <div class="business">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <span>Realiza diagramas de manera colaborativa</span>
                        <h2>Mediante sesiones</h2>
                        <p> </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="business_box ">
                                <figure><img src="{{ asset('landing/images/cla1.jpg') }}" alt="#" /></figure>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end projects -->
    <!-- Testimonial -->
    <div class="section">
        <div class="container">
            <div id="" class="Testimonial">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Comentarios</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="Testimonial_box">
                            <i><img src="{{ asset('landing/images/cr7.jpg') }}" alt="#" /></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="Testimonial_box">
                            <h4>Cristiano Ronaldo</h4>
                            <p>Me gusta esta pagina wen me ayuda con mis diagramas
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="Testimonial_box">
                            <i><img src="{{ asset('landing/images/vi7.jpg') }}" alt="#" /></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="Testimonial_box">
                            <h4>Vinicius Jr</h4>
                            <p>Es la mejor pagina web para hacer en colaboracion DB
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end contact -->
    <!--  footer -->
    <footer>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright 2024 All Right Reserved By LeoSeO </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
