<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ config('app.name', 'Rentit') }}</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/hero-slider.css">
        <link rel="stylesheet" href="/css/owl-carousel.css">
        <link rel="stylesheet" href="/css/style.css">

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

                                <li class='active'><a href="/cars">Cars</a></li>

                                <li>
                                    <a href="#">More</a>
                                    <ul class="sub-menu">
                                        <li><a href="/about-us">About Us</a></li>
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

    <section class="banner banner-secondary" id="top" style="background-image: url(/img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>LOREM IPSUM DOLOR SIT AMET</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div>
                      <img src="{{ url('storage/uploaded/'.$cars->image_path) }}" alt="" class="img-responsive wc-image">
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-1-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-2-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-3-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>

                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-4-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-5-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-6-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>

                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-4-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-5-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                        <div class="form-group">
                            <img src="/img/product-6-720x480.jpg" alt="" class="img-responsive">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-xs-12">
                      <h2><small><del> $11999.00</del></small><strong class="text-primary">${{ $cars->price }}</strong></h2>

                      <br>

                      <ul class="list-group list-group-flush">
                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">Vehicle Type</span>

                                 <strong class="pull-right">{{ $cars->vehicle_type }}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">Brand</span>

                                 <strong class="pull-right">{{ $cars->brand }}</strong>
                            </div>
                       </li>

                       <li class="list-group-item">
                            <div class="clearfix">
                                 <span class="pull-left">Year</span>

                                 <strong class="pull-right">{{ $cars->year }}</strong>
                            </div>
                       </li>


                       <li class="list-group-item">
                           <div class="clearfix">
                               <span class="pull-left">Model</span>

                               <strong class="pull-right">{{ $cars->model }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Mileage</span>

                                <strong class="pull-right">{{ $cars->mileage }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Fuel</span>

                                <strong class="pull-right">{{ $cars->fuel }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Location</span>

                                <strong class="pull-right">{{ $cars->location }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Gearbox</span>

                                <strong class="pull-right">{{ $cars->gearbox }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Number of seats</span>

                                <strong class="pull-right">{{ $cars->number_of_seats }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Doors</span>

                                <strong class="pull-right">{{ $cars->doors }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">Color</span>

                                <strong class="pull-right">{{ $cars->color }}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                             <div class="clearfix">
                                  <span class="pull-left">Price</span>

                                  <strong class="pull-right">{{ $cars->price }}</strong>
                             </div>
                        </li>
                    </ul>

                      <div class="accordions">
                            <ul class="accordion">
                                {{-- <li>
                                    <a class="accordion-trigger">Vehicle Extras</a>

                                    <div class="accordion-content">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <p>ABS</p>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <p>Leather seats</p>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <p>Power Assisted Steering</p>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <p>Electric heated seats</p>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <p>New HU and AU</p>
                                            </div>

                                            <div class="col-sm-6 col-xs-12">
                                                <p>Xenon headlights</p>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                {{-- @if ($rents->id == $cars->id && $rents->status == 'pending')
                                <li>
                                    <a class="accordion-trigger">Rent It</a>
                                    <div class="accordion-content">
                                        <h1 class="text-center">Your Rent Application Is In Process</h1>
                                    </div>
                                </li>
                                @elseif ($rents->id == $cars->id && $rents->status == 'rented')
                                <li>
                                    <a class="accordion-trigger">Rent It</a>
                                    <div class="accordion-content">
                                        <h1>You've Already Rented This Vehicle</h1>
                                    </div>
                                </li>
                                @else --}}
                                <li>
                                    <a class="accordion-trigger">More About Vehicle</a>
                                    <div class="accordion-content">
                                        <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst. Vel sequi odit similique repudiandae ipsum iste, quidem tenetur id impedit, eaque et, aliquam quod.</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="accordion-trigger">Vehicle Terms & Conditions</a>
                                    <div class="accordion-content">
                                        <p>Aenean hendrerit metus leo, quis viverra purus condimentum nec. Pellentesque a sem semper, lobortis mauris non, varius urna. Quisque sodales purus eu tellus fringilla.<br><br>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellus, id efficitur leo. In hac habitasse platea dictumst. Vel sequi odit similique repudiandae ipsum iste, quidem tenetur id impedit, eaque et, aliquam quod.</p>
                                    </div>
                                </li>
                                {{-- @endif --}}
                                <li>
                                    <a class="accordion-trigger">Contact Details</a>

                                    <div class="accordion-content">

                                      <p>
                                        <span>Name</span>

                                        <br>

                                        <strong>John Smith</strong>

                                    </p>

                                    <p>
                                        <span>Phone</span>

                                        <br>

                                        <strong>
                                          <a href="tel:123-456-789">123-456-789</a>
                                        </strong>
                                    </p>

                                    <p>
                                        <span>Mobile phone</span>

                                        <br>

                                        <strong>
                                          <a href="tel:456789123">456789123</a>
                                        </strong>
                                    </p>

                                    <p>

                                        <span>Email</span>

                                        <br>

                                        <strong>
                                          <a href="mailto:john@carsales.com">john@carsales.com</a>
                                        </strong>
                                      </p>
                                    </div>
                                </li>
                            </ul> <!-- / accordion -->
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
                        <p><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li><span>Phone:</span><a href="#">+1 333 4040 5566</a></li>
                            <li><span>Email:</span><a href="#">contact@company.com</a></li>
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
