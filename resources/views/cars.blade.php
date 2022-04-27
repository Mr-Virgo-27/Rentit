<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ config('app.name', 'Rentit') }}</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="sweetalert2.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/hero-slider.css">
        <link rel="stylesheet" href="/css/owl-carousel.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://kit.fontawesome.com/9b62d0cfda.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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

                                <li class='active'><a href="cars">Cars</a></li>

                                <li>
                                    <a href="#">More</a>
                                    <ul class="sub-menu">
                                        <li><a href="/about-us">About Us</a></li>
                                        <li><a href="/terms">Terms</a></li>
                                        @if (Auth::check())
                                        @if (Auth::user()->is_admin == 1)
                                        <li><a href="admin/home">Dashboard</a></li>
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
                        </nav>
                <!-- / #primary-nav -->
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
                        <h2>Cars</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Vehicle Type:</label>

                                 <input wire:model="vehicle_type" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Year:</label>

                                 <input wire:model="year" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Model:</label>

                                 <input wire:model="model" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Color:</label>

                                 <input wire:model="color" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Location:</label>

                                 <input wire:model="location" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fuel:</label>

                                 <input wire:model="fuel" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Number Of Seats:</label>

                                 <input wire:model="number_of_seats" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mileage:</label>

                                 <input wire:model="mileage" type="text" class="form-control">
                            </div>
                        </div>

                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Engine size:</label>

                                 <input class="form-control" type="text">
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Power:</label>

                                 <input type="text" class="form-control">
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fuel:</label>

                                 <input type="text" class="form-control">
                            </div>
                        </div> --}}

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Gearbox:</label>

                                 <input wire:model="gearbox" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Doors:</label>

                                 <input wire:model="doors" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Price:</label>

                                 <input wire:model="price" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-center blue-button">
                        <a href="#">Search</a>
                    </div>
                </form>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Featured Cars</span>
                            <h2>Lorem ipsum dolor sit amet ctetur.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($cars as $Car)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="{{ url('storage/uploaded/'.$Car->image_path) }}" alt="">
                                </div>
                                <div class="overlay-content">
                                  <strong><i class="fa fa-dashboard"></i> {{ $Car->vehicle_type }}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                  <strong><i class="fa fa-cube"></i> {{ $Car->model }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <strong><i class="fa fa-cog"></i> {{ $Car->gearbox }}</strong>
                                </div>
                            </div>
                            <div class="down-content">
                                <p>{{ $Car->year }}</p>

                                <h4 class="text-button">{{ $Car->location }} <i style="color:blue" class="fa-solid fa-location-dot"></i></h4>

                                <p class="text-button"><span> <strong><sup>$</sup>{{ $Car->price }}</strong> per day</span></p>

                                <div class="text-button">
                                    @if(!$Car->rent_application([0])->exists())
                                    <a href="/car-details/{{ $Car->id }}">Rent It</a>
                                    @else
                                    <a href="/more-details/{{ $Car->id }}">Unavailable. View Details</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <span class="text-center blue-button">{{ $cars->links() }}</span>
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
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    @if (session()->has('message'))
        <script>
            Swal.fire(
            "Let's See",
            'You Have Applied For This Vehicle <br> Please Check Your Dashboard!',
            'success'
            )
        </script>
    @endif
</body>
</html>
