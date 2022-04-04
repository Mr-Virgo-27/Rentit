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
        <link rel="stylesheet" href="/css/user.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/hero-slider.css">
        <link rel="stylesheet" href="/css/owl-carousel.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://kit.fontawesome.com/9b62d0cfda.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        @livewireStyles
    </head>

<body>
    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <div class="logo">
                            <h1 style="color:#d44457">RENTIT</h1>
                        </div>
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
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
        <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2>All Cars Applied For</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



<section class="container">
  <div class="row white">
				<div class="block">
                    @php
                        $count = 0;
                    @endphp


                    @foreach ($rents as $rent)
                    @if ($rent->status == 'pending')
					<div class="col-xs-12 col-sm-6 col-md-3">
                        <ul class="pricing p-green">
								<li style="background-image:url(/storage/uploaded/{{ $rent->cars->image_path }}); background-repeat:no-repeat; background-size:100% 100%; line-height:4;">
									<big>.</big>
								</li>
								<li>
									<h1>{{ $rent->status }}</h1>
								</li>
								<li>Needed For: <strong id="stdate">{{ $rent->pickup_date }}</strong></li>
								<li>{{ $rent->cars->vehicle_type }}</li>
								<li>Requested Until: <strong id="endate">{{ $rent->end_date }}</strong></li>
								<li>Car Location: {{ $rent->cars->location }}</li>
								<li><a style="color: gray" href="/more-details/{{ $rent->cars->id }}"><strong>Details</strong></a></li>
								<li>
                                    <h3>$<strong id="price">{{ $rent->cars->price }}</strong>.00</h3>
                                    <span>per day</span>
                                </li>
                                <li>
                                    <h3 id="totalCost"></h3>
                                    <span>Total Cost</span>
								</li>
                                @endif
                                @if ($rent->status == 'Approved')
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <ul class="pricing p-green">
                                            <li style="background-image:url(/storage/uploaded/{{ $rent->cars->image_path }}); background-repeat:no-repeat; background-size:100% 100%; line-height:4;">
                                                <big>.</big>
                                            </li>
                                            <li>
                                                <h1>{{ $rent->status }}</h1>
                                            </li>
                                            <li>Needed For: <strong id="stdate">{{ $rent->pickup_date }}</strong></li>
                                            <li>{{ $rent->cars->vehicle_type }}</li>
                                            <li>Requested Until: <strong id="endate">{{ $rent->end_date }}</strong></li>
                                            <li>Car Location: {{ $rent->cars->location }}</li>
                                            <li><a style="color: gray" href="/more-details/{{ $rent->cars->id }}"><strong>Details</strong></a></li>
                                            <li>
                                                <h3>$<strong id="price">{{ $rent->cars->price }}</strong>.00</h3>
                                                <span>per day</span>
                                            </li>
                                            <li>
                                                <h3 id="totalCost"></h3>
                                                <span>Total Cost</span>
                                            </li>
								<li>
									<a class="login-trigger" href="#" data-target="#login{{ $count }}" data-toggle="modal">PAY</a>

                                    <div id="login{{ $count }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                        <div class="modal-body">
                                            <button data-dismiss="modal" class="close">&times;</button>
                                            <h4>PAY</h4>
                                            @livewire('payment-gateway', ['car_id' => $rent->cars->id], key($rent->cars->id))
                                        </div>
                                        </div>
                                    </div>
                                    </div>
								</li>
                                @elseif ($rent->status == 'Denied')
                                @elseif ($rent->status == 'Rented')
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <ul class="pricing p-red">
                                        <li style="background-image:url(/storage/uploaded/{{ $rent->cars->image_path }}); background-repeat:no-repeat; background-size:100% 100%; line-height:4;">
                                            <big>.</big>
                                        </li>
                                        <li>
                                            <h1>{{ $rent->status }}</h1>
                                        </li>
                                        <li>Needed For: <strong id="stdate">{{ $rent->pickup_date }}</strong></li>
                                        <li>{{ $rent->cars->vehicle_type }}</li>
                                        <li>Requested Until: <strong id="endate">{{ $rent->end_date }}</strong></li>
                                        <li>Car Location: {{ $rent->cars->location }}</li>
                                        @php
                                            $start = strtotime($rent->pickup_date);
                                            $end = strtotime($rent->end_date);

                                            $days_between = ceil(abs($end - $start) / 86400);
                                        @endphp
                                        <li>days requested: {{ $days_between }}</li>
                                        <li><a style="color: gray" href="/more-details/{{ $rent->cars->id }}"><strong>Details</strong></a></li>
                                        <li>
                                            <h3>$<strong id="price">{{ $rent->cars->price }}</strong>.00</h3>
                                            <span>per day</span>
                                        </li>
                                        <li>
                                            <h3 id="totalCost"></h3>
                                            <span>Total Paid</span>
                                        </li>
                                    </ul>
                            </div>
                                @else
                                @endif
							</ul>
                        </div>
                        @php
                            ++$count;
                        @endphp
                        @endforeach


					{{-- <div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-yel">
								<li>
									<img src="http://bread.pp.ua/n/settings_y.svg" alt="">
									<big>Good</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>$299</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-red">
								<li>
									<img src="http://bread.pp.ua/n/settings_r.svg" alt="">
									<big>Ultima</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>$399</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
							<ul class="pricing p-blue">
								<li>
									<img src="http://bread.pp.ua/n/settings_b.svg" alt="">
									<big>Vip</big>
								</li>
								<li>Responsive Design</li>
								<li>Color Customization</li>
								<li>HTML5 & CSS3</li>
								<li>Styled elements</li>
								<li>
									<h3>$799</h3>
									<span>per month</span>
								</li>
								<li>
									<button>Join Now</button>
								</li>
							</ul>
					</div> --}}


				</div><!-- /block -->
			</div><!-- /row -->
            {{-- <span class="blue-button">{{ $rents->links() }}</span> --}}
            <h1>Your Rental History</span></h1>

                        <table class="responstable">

                            <tr>
                                <th data-th="Driver details">
                                    <span>Vehicle Name</span>
                                </th>
                                <th>Pickup Date</th>
                                <th>Date Of Return</th>
                                <th>Duration</th>
                                <th>Total Amount Paid</th>
                            </tr>
                            @foreach ($carHistory as $history)
                          @php
                            $start = strtotime($history->pickup_date);
                            $end = strtotime($history->end_date);

                            $days_between = ceil(abs($end - $start) / 86400);
                          @endphp

                          <tr>
                            <td>{{ $history->cars->brand }}</td>
                            <td>{{ $history->pickup_date }}</td>
                            <td>{{ $history->end_date }}</td>
                            <td>{{ $days_between }} days</td>
                            <td>${{ $days_between * $history->cars->price }}.00</td>
                          </tr>
                          @endforeach

                        </table>

        </section>

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

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="/js/vendor/bootstrap.min.js"></script>

    <script src="/js/datepicker.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="/js/main.js"></script>
    @livewireScripts

    @if (session()->has('message'))
        <script>
            Swal.fire(
            'AWESOME!',
            'Your Car has been added succsessfully!',
            'success'
            )
        </script>
    @endif

<script>
    update_days();

    function update_days() {
    const date1 = new Date(document.getElementById('stdate').innerText);
    const date2 = new Date(document.getElementById('endate').innerText);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    const totalPrice = diffDays * document.getElementById('price').innerText

    document.getElementById('totalCost').innerText += '$'+ totalPrice +'.00';
    }
</script>
</body>
</html>
