<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- Site Metas -->
<title>Welocm to Mosuqe System</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('mosuqe/images/Untitled design.png') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('mosuqe/images/apple-touch-icon.png') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/css/bootstrap.min.css') }}">
<!-- Site CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/style.css') }}">
<!-- Colors CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/css/colors.css') }}">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/css/versions.css') }}">
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/css/responsive.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('mosuqe/css/custom.css') }}">
<!-- Modernizer for Portfolio -->
<script src="{{ asset('mosuqe/js/modernizer.js') }}"></script>
<!-- [if lt IE 9] -->
</head>

<body class="clinic_version">
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('mosuqe/images/loaders/heart-loading2.gif') }}" alt="">
    </div>
    <!-- END LOADER -->
    <header>
        <div class="header-top wow fadeIn green">
            <div class="container">
                <a  class="navbar-brand" href="#"><img src="{{ asset('mosuqe/images/Al-Amin-Mosque_free-file (3).png') }} "
                        alt="image"></a>
                <div class="right-header">
                    <div class="header-info">
                        <div class="info-inner">
                            <span id="user4" class="icontop"><img src="{{ asset('mosuqe/images/admin.jpeg') }}" alt="#"></span>
                            <span class="iconcont"><a id="user3" href="{{ route('auth.login') }}">Login Admin</a></span>
                        </div>

                        <div class="info-inner">
                            <span id="user2" class="icontop"><img src="{{ asset('mosuqe/images/download.jpeg') }}"
                                    alt="#"></span>
                            <span class="iconcont"><a id="user" href="#">Login User</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ahmadtop" class="header-bottom wow fadeIn">
            <div class="container">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars"
                                aria-hidden="true"></i></button>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="active" href="#">Home</a></li>
                            <li><a data-scroll href="#about">About us</a></li>
                            <li><a data-scroll href="#service">Services</a></li>
                          <!--  <li><a data-scroll href="#mosuqes">mosuqes</a></li>-->
                            <!--  <li><a data-scroll href="#price">Price</a></li>-->
                            <li><a data-scroll href="#testimonials">Testimonials</a></li>
                            <li><a data-scroll href="#getintouch">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="serch-bar">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" placeholder="Search" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="button">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4"
        style="background-image:url('images/slider-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-contant">
                        <h2>
                            <span id="ahmadcenter" class="center"><span  class="icon">
                                <img src="{{ asset('mosuqe/images/icon-logo.jpg') }}" alt="#" /></span></span>
                            <a href="" class="typewrite" data-period="2000"
                                data-type='[ "Welcome to Al-Amin-mosuqe", "You must send your children", " to the mosque!" ]'>
                                <span class="wrap"></span>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end section -->
    <div id="time-table" class="time-table-section">
        <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="service-time one" style="background:#00b167a9;">
                        <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                        <h3>المرحلة الثانوية</h3>
                        <div class="time-table-section">
                            <ul>
                                <li><span class="right">عاشر</span><span class="left">8.00 – 18.00</span>
                                </li>
                                <li><span class="right">حادي عشر</span><span class="left">8.00 – 16.00</span></li>
                                <li><span class="right">توجيهي</span><span class="left">8.00 – 13.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="service-time middle" style="background:#00b167;">
                        <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <h3>المرحلة الإبتدائية</h3>
                        <p>القسم الاول</p>
                        <p>المدرسة القرانية</p>
                        <div class="time-table-section">
                            <ul>
                                <li><span class="right">أول</span><span class="left">8.00 – 18.00</span>
                                </li>
                                <li><span class="right">ثاني</span><span class="left">8.00 – 16.00</span></li>
                                <li><span class="right">ثالث</span><span class="left">8.00 – 13.00</span></li>
                            </ul>
                        </div>
                        <p>--------------------------------------</p>
                        <p>القسم الثاني</p>
                        <p>حلقات</p>
                        <div class="time-table-section">
                            <ul>
                                <li><span class="right">رابع</span><span class="left">8.00 – 18.00</span>
                                </li>
                                <li><span class="right">خامس</span><span class="left">8.00 – 16.00</span></li>
                                <li><span class="right">سادس</span><span class="left">8.00 – 13.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="service-time three" style="background:#00b167da;">
                        <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                        <h3>المرحلة الإعدادية</h3>
                        <div class="time-table-section">
                            <ul>
                                <li><span class="right">سابع</span><span class="left">8.00 – 18.00</span>
                                </li>
                                <li><span class="right">ثامن</span><span class="left">8.00 – 16.00</span></li>
                                <li><span class="right">تاسع</span><span class="left">8.00 – 13.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div id="about" class="section wow fadeIn">
        <div class="container">
            <div class="heading">
                <span class="icon-logo"><img src="{{ asset('mosuqe/images/icon-logo.jpg') }}" alt="#"></span>
                <h2>The Leader of center</h2>
                <h6>Hamza khalil</h6>
            </div>
            <!-- end title -->
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <h3 class="h4">ِAbuot Leader</h3>
                        <h2>Hamza khalil</h2>
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim,
                            non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus
                            bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. </p>
                        <a id="learn" href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Learn
                            More</a>
                    </div>
                    <!-- end messagebox -->
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset('mosuqe/images/am1.jpg') }}" alt="" class="img-responsive">
                        <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]"
                            class="playbutton"><i class="flaticon-play-button"></i></a>
                    </div>
                    <!-- end media -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <hr class="hr1">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="{{ asset('mosuqe/images/amin1.jpg') }}" data-rel="prettyPhoto[gal]"
                                class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="{{ asset('mosuqe/images/amin1.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <h3 class="out">mosuqe Center</h3>
                    </div>
                    <!-- end service -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="{{ asset('mosuqe/images/amin2.jpg') }}" data-rel="prettyPhoto[gal]"
                                class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="{{ asset('mosuqe/images/amin2.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <h3 class="out">garden</h3>
                    </div>
                    <!-- end service -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="{{ asset('mosuqe/images/amin3.jpg') }}" data-rel="prettyPhoto[gal]"
                                class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="{{ asset('mosuqe/images/amin3.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <h3 class="out">garden mosuqe</h3>
                    </div>
                    <!-- end service -->
                </div>
                <div  class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div  class="post-media wow fadeIn">
                            <a href="{{ asset('mosuqe/images/amin4.jpg') }}" data-rel="prettyPhoto[gal]"
                                class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <img src="{{ asset('mosuqe/images/amin4.jpg') }}" alt="" class="img-responsive">
                        </div>
                        <h3 class="out">out side</h3>
                    </div>
                    <!-- end service -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <div class="serv" class="services wow fadeIn">
        <div  class="container">
            <div  class="row">
                <div  class="col-lg-8">
                    <div  class="center-services">
                        <div  class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon1.png') }}"
                                        alt="#" /></span>
                                <h4>PREMIUM FACILITIES</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon2.png') }}"
                                        alt="#" /></span>
                                <h4>LARGE LABORATORY</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon3.png') }}"
                                        alt="#" /></span>
                                <h4>DETAILED SPECIALIST</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon4.png') }}"
                                        alt="#" /></span>
                                <h4>CHILDREN CARE CENTER</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon5.png') }}"
                                        alt="#" /></span>
                                <h4>FINE INFRASTRUCTURE</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="serv">
                                <span class="icon-service"><img src="{{ asset('mosuqe/images/service-icon6.png') }}"
                                        alt="#" /></span>
                                <h4>ANYTIME BLOOD BANK</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- mosuqe -->

    <div id="mosuqes" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;"
        data-scroll-id="mosuqes" tabindex="-1">
        <div class="container">

            <div class="heading">
                <span class="icon-logo"><img src="{{ asset('mosuqe/images/icon-logo.jpg') }}" alt="#"></span>
                <h2>مشرفين الحلقات </h2>
            </div>

            <div class="serv" class="row dev-list text-center">
                <div  class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.2s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn;">
                    <div  class="widget clearfix">
                        <img src="{{ asset('mosuqe/images/mosuqe_01.jpg') }}" alt=""
                            class="img-responsive img-rounded">
                        <div  class="widget-title">
                            <h3 class="ahh">محمد أبو جبل</h3>
                            <small >(أبو مصعب)</small>
                        </div>
                        <!-- end title -->
                        <p class="ahh">مشرف الثانوية</p>

                        <div  class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.4s"
                    style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeIn;">
                    <div class="widget clearfix">
                        <img src="{{ asset('mosuqe/images/mosuqe_02.jpg') }}" alt=""
                            class="img-responsive img-rounded">
                        <div class="widget-title">
                            <h3 class="ahh">براء أبو كميل</h3>
                            <small>(أبو نضال)</small>
                        </div>
                        <!-- end title -->
                        <p class="ahh">مشرف الإعدادية</p>

                        <div class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn">
                    <div class="widget clearfix">
                        <img src="images/mosuqe_03.jpg" alt="" class="img-responsive img-rounded">
                        <div class="widget-title">
                            <h3 class="ahh">عبدالرحمن عليان</h3>
                            <small>(أبو محمد)</small>
                        </div>
                        <!-- end title -->
                        <p class="ahh">مشرف  اللإبتدائية</p>

                        <div class="footer-social">
                            <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--widget -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div>

    <div id="price" class="section pr wow fadeIn" style="background-image:url('images/price-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">

                        <!-- end pane -->
                        <div class="tab-pane fade" id="tab2">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <div class="pricing-table">
                                        <div class="pricing-table-header">
                                            <h2>Dedicated Server</h2>
                                            <h3>$85/month</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support
                                            </p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#contact" data-scroll=""
                                                class="btn btn-dark btn-radius btn-brd">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>VPS Server</h2>
                                            <h3>$59/month</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-text">
                                            <p>This is a perfect choice for small businesses and startups.</p>
                                        </div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
                                            <p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
                                            <p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
                                            <p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
                                            <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support
                                            </p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="#contact" data-scroll=""
                                                class="btn btn-light btn-radius btn-brd grd1 effect-1">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end pane -->
                    </div>
                    <!-- end content -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>

    <!-- end mosuqe section -->

    <footer id="footer" class="footer-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo padding">
                        <a href=""><img src="{{ asset('mosuqe/images/Al-Amin-Mosque_free-file (3).png') }}" alt=""></a>
                        <p>Locavore pork belly scen ester pine est chill wave microdosing pop uple itarian cliche
                            artisan.</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-info">
                        <h3>CONTACT US</h3>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><a href="https://www.facebook.com/alameen.mosque/?ref=page_internal">Facbook</a></p>
                        <p><i class="fa fa-paper-plane" aria-hidden="true"></i> </p>
                        <p><i class="fa fa-paper-plane" aria-hidden="true"></i><a href="https://www.instagram.com/masjed_alameen/">Instagram</a></p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> @alameen.mosque</p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <div id="foter" class="copyright-area wow fadeIn">
        <div  class="container">
            <div class="row">
                <div  class="col-md-8">
                    <strong>Copyright &copy; {{ now()->year }} <a href="#"><span class="badge bg-info">Al-Amin Muhammed Mosque</span></a> . </strong> All rights reserved.
                    <h3>The <span class="badge bg-danger"> Developers </span> : <span class="badge bg-dark">Ahmad Alashi (Abo_Hamza)💚<span></h3>
                </div>
                {{-- <div class="col-md-4">
                    <div class="social">
                        <ul class="social-links">
                            <li><a href=""><i class="fa fa-rss"></i>a</a>aa</li>
                            <li><a href=""><i class="fa fa-facebook"></i>a</a>a</li>
                            <li><a href=""><i class="fa fa-twitter"></i>a</a>a</li>
                            <li><a href=""><i class="fa fa-google-plus">a</i>a</a>a</li>
                            <li><a href=""><i class="fa fa-youtube"></i>a</a>a</li>
                            <li><a href=""><i class="fa fa-pinterest">a</i>a</a>a</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end copyrights -->
    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <!-- all js files -->
    <script src="{{ asset('mosuqe/js/all.js') }}"></script>
    <!-- all plugins -->
    <script src="{{ asset('mosuqe/js/custom.js') }}"></script>
    <!-- map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap">
    </script>
</body>

</html>
