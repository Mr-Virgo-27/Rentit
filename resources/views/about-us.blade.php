<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ config('app.name', 'Rentit') }}</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>

    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="/"><div class="logo">
                            <h1>RENTIT</h1>
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="/">Home</a></li>

                                <li><a href="cars">Cars</a></li>

                                <li class='active'>
                                    <a href="#">More</a>
                                    <ul class="sub-menu">
                                        <li class='active'><a href="/about-us">About Us</a></li>
                                        <li><a href="/terms">Terms</a></li>
                                        @if (Auth::check())
                                        @if (Auth::user()->is_admin == 1)
                                        <li><a href="/admin/home">Dashboard</a></li>
                                        @else
                                        <li><a href="{{ route('my-dashboard') }}">Dashboard</a></li>
                                        @endif
                                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                                        <li><a href="{{ route('logout') }}"
                                            class="no-underline hover:underline"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            {{ csrf_field() }}
                                        </form>
                                        @else
                                        <li><a href="/login">Login/Register</a></li>
                                        @endif
                                    </ul>
                                </li>

                                <li><a class="nav-link" href="/contact">Contact Us</a></li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>

    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>About us</h4>
                            <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst. Vel sequi odit similique repudiandae ipsum iste, quidem tenetur id impedit, eaque et, aliquam quod.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure cupiditate id unde quis ut maxime, accusantium aperiam consectetur saepe delectus ducimus accusamus, ad doloremque ea. Quam, suscipit quidem perspiciatis asperiores, libero cum saepe hic pariatur eos deleniti illum minima minus.</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/about-1-720x480.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Lorem ipsum dolor.</span>
                          <h2>Vivamus nec vehicula felis</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi blanditiis, esse deserunt assumenda! Tempora nulla natus illum soluta quasi, nisi, in quaerat cumque corrupti ipsum impedit necessitatibus expedita minus harum, fuga id aperiam autem architecto odio. Perferendis eius possimus ex itaque tenetur saepe id quis dicta voluptas, corrupti sapiente hic!</p>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </section>


    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <h1>RENTIT</h1>
                        </div>
                        <p>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellustea dictumst.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="/"><i class="fa fa-stop"></i>Home</a></li>
                                    <li><a href="/about-us"><i class="fa fa-stop"></i>About</a></li>
                                    <li><a href="/contact"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="/terms"><i class="fa fa-stop"></i>Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p><i class="fa fa-map-marker"></i> Rose Hall Montego Bay St. James JM</p>
                        <ul>
                            <li><span>Phone:</span><a href="tel:+18767879257">+1 876 787 9257</a></li>
                            <li><span>Email:</span><a href="mailto:alanzogenosys1@gmail.com">alanzogenosys1@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright Â© 2022 GENOSYS - Created by: Patrick Virgo</p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="/js/vendor/bootstrap.min.js"></script>

    <script src="/js/datepicker.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
