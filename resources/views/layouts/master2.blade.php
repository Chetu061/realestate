{{-- frontend dashboard user --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Easy - RealState </title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
    {{-- for wishlist --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- end wishlist link for ajax code --}}
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}">


</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader[loading screen] -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="far fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="E" class="letters-loading">
                                E
                            </span>
                            <span data-text-preloader="A" class="letters-loading">
                                A
                            </span>
                            <span data-text-preloader="S" class="letters-loading">
                                S
                            </span>
                            <span data-text-preloader="Y" class="letters-loading">
                                Y
                            </span>
                            <span data-text-preloader="L" class="letters-loading">
                                L
                            </span>
                            <span data-text-preloader="A" class="letters-loading">
                                A
                            </span>
                            <span data-text-preloader="N" class="letters-loading">
                                N
                            </span>
                            <span data-text-preloader="D" class="letters-loading">
                                D
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!-- switcher menu -->

        <!-- end switcher menu -->


        <!-- main header -->
        <header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <ul class="info clearfix">
                            <li><i class="far fa-map-marker-alt"></i>Discover St, New York, NY 10012, USA</li>
                            <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                            <li><i class="far fa-phone"></i><a href="tel:2512353256">+251-235-3256</a></li>
                        </ul>
                    </div>
                    <div class="right-column pull-right">
                        <ul class="social-links clearfix">
                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>

                        @auth
                            <div class="sign-box">
                                <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Dashboard</a>
                                <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>

                            </div>
                        @else
                            <div class="sign-box">
                                <a href="{{ route('login') }}"><i class="fas fa-user"></i>Sign In</a>


                            </div>
                        @endauth



                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="{{ url('/') }}"><img
                                        src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{ url('/') }}">
                                                <span>Home</span></a>

                                        </li>
                                        <li><a href="{{ url('/') }}">
                                                <span>About Us</span></a>

                                        </li>

                                        <li class="dropdown"><a href="index.html"><span>Property</span></a>
                                            <ul>
                                                <li><a href="{{ route('rent.property') }}"> Rent Property </a>
                                                </li>
                                                <li><a href="{{ route('buy.property') }}">Buy Property</a></li>

                                            </ul>
                                        </li>

                                        <li><a href="{{ url('/') }}">
                                                <span>Agent</span></a>

                                        </li>
                                        <li><a href="{{ url('/') }}">
                                                <span>Blog</span></a>

                                        </li>


                                        <li><a href="contact.html"><span>Contact</span></a></li>
                                        <li>
                                            <a href="{{ route('agent.login') }}"
                                                class="btn btn-success"><span>+</span>Add Listing</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="index.html"><img
                                        src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                            </figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="btn-box">
                            <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img
                            src="{{ asset('frontend/assets/images/logo-2.png') }}" alt=""
                            title=""></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
        @yield('content')
        <!-- main-footer -->
        <footer class="main-footer">
            <div class="footer-top bg-color-2">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget about-widget">
                                <div class="widget-title">
                                    <h3>About</h3>
                                </div>
                                <div class="text">
                                    <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt
                                        ut labore dolore magna aliqua enim ad minim venitam</p>
                                    <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml-70">
                                <div class="widget-title">
                                    <h3>Services</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list class">
                                        <li><a href="index.html">About Us</a></li>
                                        <li><a href="index.html">Listing</a></li>
                                        <li><a href="index.html">How It Works</a></li>
                                        <li><a href="index.html">Our Services</a></li>
                                        <li><a href="index.html">Our Blog</a></li>
                                        <li><a href="index.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget post-widget">
                                <div class="widget-title">
                                    <h3>Top News</h3>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img
                                                    src="{{ asset('frontend/assets/images/resource/footer-post-1.jpg') }}"
                                                    alt=""></a></figure>
                                        <h5><a href="blog-details.html">The Added Value Social Worker</a></h5>
                                        <p>Mar 25, 2020</p>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img
                                                    src="{{ asset('frontend/assets/images/resource/footer-post-2.jpg') }}"
                                                    alt=""></a></figure>
                                        <h5><a href="blog-details.html">Ways to Increase Trust</a></h5>
                                        <p>Mar 24, 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>Flat 20, Reynolds Neck, North
                                            Helenaville, FV77 8WS</li>
                                        <li><i class="fas fa-microphone"></i><a href="tel:23055873407">+2(305)
                                                587-3407</a></li>
                                        <li><i class="fas fa-envelope"></i><a
                                                href="mailto:info@example.com">info@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-box clearfix">
                        <figure class="footer-logo"><a href="index.html"><img
                                    src="{{ asset('frontend/assets/images/footer-logo.png') }}" alt=""></a>
                        </figure>
                        <div class="copyright pull-left">
                            <p><a href="index.html">Realshed</a> &copy; 2021 All Right Reserved</p>
                        </div>
                        <ul class="footer-nav pull-right clearfix">
                            <li><a href="index.html">Terms of Service</a></li>
                            <li><a href="index.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-helper.js') }}"></script>
    {{-- map script end --}}
    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>



    <script type="text/javascript"
        src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- code for add to wishlist  --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function addToWishList(property_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishList/" + property_id,
                success: function(data) {
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }
    </script>

    {{-- end wishlist --}}
    {{-- note:remove wishlist are done by my technique --}}
    {{-- Add to compare script start --}}
    <script type="text/javascript">
        function addToCompare(property_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-compare/" + property_id,
                success: function(data) {
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }
    </script>
    {{-- End Compare script  --}}
    <!-- // start load Wishlist Data  -->

    <script type="text/javascript">
        function compare() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-compare-property/",
                success: function(response) {

                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += ` <tr>
                <th>Property Info</th>
                <th>
                    <figure class="image-box"><img src="/${value.property.property_thambnail}" alt=""></figure>
                    <div class="title">${value.property.property_name}</div>
                    <div class="price">$${value.property.lowest_price}</div>
                </th>
                
               
            </tr>    
            <tr>
                <td>
                    <p>City</p>
                </td>
                <td>
                    <p>${value.property.city}</p>
                </td>
                 
            </tr>
            <tr>
                <td>
                    <p>Area</p>
                </td>
                <td>
                    <p>${value.property.property_size} Sq Ft</p>
                </td>
                 
            </tr>
            <tr>
                <td>
                    <p>Rooms</p>
                </td>
                <td>
                    <p>${value.property.bedrooms}</p>
                </td>
                 
            </tr>
            <tr>
                <td>
                    <p>Bathrooms</p>
                </td>
                <td>
                    <p>${value.property.bathrooms}</p>
                </td>
                 
            </tr>
            
            <tr>
                <td>
                    <p>Action</p>
                </td>
                <td>
                    <a type="submit" class="text-body" id="${value.id}" onclick="compareRemove(this.id)" ><i class="fa fa-trash"></i></a>
                </td>
                 
            </tr> `
                    });
                    $('#compare').html(rows);
                }
            })
        }
        compare();
        // Wishlist Remove Start 
        function compareRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/compare-remove/" + id,
                success: function(data) {
                    compare();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }


        /// End Compare Remove  
    </script>

</body><!-- End of .page_wrapper -->

</html>
