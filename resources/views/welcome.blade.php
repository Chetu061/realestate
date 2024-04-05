@extends('layouts.master2')
@section('content')
    <!-- banner-section -->
    <section class="banner-section" style="background-image: url({{ asset('frontend/assets/images/banner/banner-1.jpg') }});">
        <div class="auto-container">
            <div class="inner-container">
                <div class="content-box centred">
                    <h2>Create Lasting Wealth Through Realshed</h2>
                    <p>Amet consectetur adipisicing elit sed do eiusmod.</p>
                </div>

                @php
                    $states = App\Models\State::latest()->get();
                    $ptypes = App\Models\ProperyType::latest()->get();
                @endphp
                <div class="search-field">
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons centred clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">BUY</li>
                                <li class="tab-btn" data-tab="#tab-2">RENT</li>
                            </ul>
                        </div>
                        <div class="tabs-content info-group">
                            <div class="tab active-tab" id="tab-1">
                                <div class="inner-box">
                                    <div class="top-search">
                                        <form action="{{ route('buy.property.search') }}" method="post"
                                            class="search-form">
                                            @csrf
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Property</label>
                                                        <div class="field-input">
                                                            <i class="fas fa-search"></i>
                                                            <input type="search" name="search"
                                                                placeholder="Search by Property, Location or Landmark..."
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select name="state" class="wide">
                                                                <option data-display="Input location">Input location
                                                                </option>
                                                                @foreach ($states as $loc)
                                                                    <option value="{{ $loc->state_name }}">
                                                                        {{ $loc->state_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <div class="select-box">
                                                            <select name="ptype_id" class="wide">
                                                                <option data-display="All Type">All Type</option>
                                                                @foreach ($ptypes as $p)
                                                                    <option value="{{ $p->id }}">{{ $p->type_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-btn">
                                                <button type="submit"><i class="fas fa-search"></i>Search</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="inner-box">
                                    <div class="top-search">
                                        <form action="{{ route('rent.property.search') }}" method="post"
                                            class="search-form">
                                            @csrf
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Property</label>
                                                        <div class="field-input">
                                                            <i class="fas fa-search"></i>
                                                            <input type="search" name="search"
                                                                placeholder="Search by Property, Location or Landmark..."
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select name="state" class="wide">
                                                                <option data-display="Input location">Input location
                                                                </option>
                                                                @foreach ($states as $loc)
                                                                    <option value="{{ $loc->state_name }}">
                                                                        {{ $loc->state_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <div class="select-box">
                                                            <select name="ptype_id" class="wide">
                                                                <option data-display="All Type">All Type</option>
                                                                @foreach ($ptypes as $p)
                                                                    <option value="{{ $p->id }}">{{ $p->type_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-btn">
                                                <button type="submit"><i class="fas fa-search"></i>Searchrent</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- category-section -->
    <section class="category-section centred">
        <div class="auto-container">
            <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <ul class="category-list clearfix">
                    @foreach ($property_type as $item)
                        @php
                            $property = App\Models\Property::where('ptype_id', $item->id)->get();
                        @endphp
                        <li>
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $item->type_icon }}"></i></div>
                                    <h5><a href="{{ route('property.type', $item->id) }}">{{ $item->type_name }}</a></h5>
                                    <span>{{ count($property) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div>
            </div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- feature-section -->
    <section class="feature-section sec-pad bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Features</h5>
                <h2>Featured Property</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="row clearfix">

                @foreach ($property1 as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($item->property_thambnail) }}"
                                            alt="">
                                    </figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img src="{{ url('upload/ariyan.jpg') }}"
                                                        alt=""></figure>
                                                <h6>Admin </h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                        alt=""></figure>
                                                <h6>{{ $item->user->name }}</h6>
                                            @endif

                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">For
                                                {{ $item->property_status }}</a></div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6></h6>
                                            <h4>{{ $item->lowest_price }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}"
                                                    onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                            <li><a aria-label="Add To Wishlist" class="action-btn"
                                                    id="{{ $item->id }}" onclick="addToWishList(this.id)"><i
                                                        class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $item->short_descp }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }}Baths</li>
                                        <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All Listing</a>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- video-section -->
    <section class="video-section centred"
        style="background-image: url({{ asset('frontend/assets/images/background/video-1.jpg') }});">
        <div class="auto-container">
            <div class="video-inner">
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                        data-caption=""><i class="icon-17"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- video-section end -->


    <!-- deals-section -->
    <section class="deals-section sec-pad">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Hot Property</h5>
                <h2>Our Best Deals</h2>
            </div>
            @php
                $property = App\Models\Property::where('status', '1')->where('hot', '1')->limit(3)->get();
            @endphp
            <div class="row clearfix">
                @foreach ($property as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($item->property_thambnail) }}"
                                            alt="">
                                    </figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Hot</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img src="{{ url('upload/ariyan.jpg') }}"
                                                        alt=""></figure>
                                                <h6>Admin </h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                        alt=""></figure>
                                                <h6>{{ $item->user->name }}</h6>
                                            @endif

                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">For
                                                {{ $item->property_status }}</a></div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>{{ $item->lowest_price }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}"
                                                    onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                            <li><a aria-label="Add To Wishlist" class="action-btn"
                                                    id="{{ $item->id }}" onclick="addToWishList(this.id)"><i
                                                        class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <p>{{ $item->short_descp }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }}Baths</li>
                                        <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach










            </div>

        </div>
    </section>
    <!-- deals-section end -->


    <!-- testimonial-section end -->
    <section class="testimonial-section bg-color-1 centred">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png') }});"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Testimonials</h5>
                <h2>What They Say About Us</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img
                                src="{{ asset('frontend/assets/images/resource/testimonial-1.jpg') }}" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To
                                make that happen we are committed to provid ing an environment in which residents can enjoy.
                            </p>
                        </div>
                        <div class="author-info">
                            <h4>Rebeka Dawson</h4>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img
                                src="{{ asset('frontend/assets/images/resource/testimonial-2.jpg') }}" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To
                                make that happen we are committed to provid ing an environment in which residents can enjoy.
                            </p>
                        </div>
                        <div class="author-info">
                            <h4>Marc Kenneth</h4>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block-one">
                    <div class="inner-box">
                        <figure class="thumb-box"><img
                                src="{{ asset('frontend/assets/images/resource/testimonial-1.jpg') }}" alt="">
                        </figure>
                        <div class="text">
                            <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To
                                make that happen we are committed to provid ing an environment in which residents can enjoy.
                            </p>
                        </div>
                        <div class="author-info">
                            <h4>Owen Lester</h4>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- chooseus-section -->
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="inner-container bg-color-2">
                <div class="upper-box clearfix">
                    <div class="sec-title light">
                        <h5>Why Choose Us?</h5>
                        <h2>Reasons To Choose Us</h2>
                    </div>
                    <div class="btn-box">
                        <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                    </div>
                </div>
                <div class="lower-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-19"></i></div>
                                    <h4>Excellent Reputation</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h4>Best Local Agents</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Personalized Service</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->

    @php
        $skipdata0 = App\Models\State::skip(0)->first();
        $property0 = App\Models\Property::where('state', $skipdata0->id)->get();

        $skipdata1 = App\Models\State::skip(1)->first();
        $property1 = App\Models\Property::where('state', $skipdata1->id)->get();

        $skipdata2 = App\Models\State::skip(2)->first();
        $property2 = App\Models\Property::where('state', $skipdata2->id)->get();

        $skipdata3 = App\Models\State::skip(3)->first();
        $property3 = App\Models\Property::where('state', $skipdata3->id)->get();

    @endphp
    <!-- place-section -->
    <section class="place-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Top Places</h5>
                <h2>Most Popular Places</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="width:370px; height:580px"
                                        src="{{ asset($skipdata0->state_image) }}" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a
                                            href="{{ route('state.details', $skipdata0->id) }}">{{ $skipdata0->state_name }}</a>
                                    </h4>
                                    <p>{{ $property0->count() }} Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="width:370px; height:275px"
                                        src="{{ asset($skipdata1->state_image) }} " alt="">
                                </figure>
                                <div class="text">
                                    <h4><a
                                            href="{{ route('state.details', $skipdata1->id) }}">{{ $skipdata1->state_name }}</a>
                                    </h4>
                                    <p>{{ $property1->count() }} Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="width:370px; height:275px"
                                        src="{{ asset($skipdata2->state_image) }}" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a
                                            href="{{ route('state.details', $skipdata2->id) }}">{{ $skipdata2->state_name }}</a>
                                    </h4>
                                    <p>{{ $property2->count() }} Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img style="width:770px; height:275px"
                                        src="{{ asset($skipdata2->state_image) }}" alt="">
                                </figure>
                                <div class="text">
                                    <h4><a
                                            href="{{ route('state.details', $skipdata3->id) }}">{{ $skipdata3->state_name }}</a>
                                    </h4>
                                    <p>{{ $property3->count() }} Properties</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->
    @php
        $agentdata = App\Models\User::where('status', 'active')
            ->where('role', 'agent')
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();

    @endphp

    <!-- team-section -->
    <section class="team-section sec-pad centred bg-color-1">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png') }});"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Agents</h5>
                <h2>Meet Our Excellent Agents</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @foreach ($agentdata as $item)
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ !empty($item->photo) ? url('upload/agent_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                    alt="" style="width:350px; height:350px;"></figure>
                            <div class="lower-content">
                                <div class="inner">

                                    <h4><a href="{{ route('agent.details', $item->id) }}">{{ $item->name }}</a></h4>
                                    <span class="designation">{{ $item->email }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- team-section end -->


    <!-- cta-section -->
    <section class="cta-section bg-color-2">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text pull-left">
                    <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                    <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->


    <!-- news-section -->
    <section class="news-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>News & Article</h5>
                <h2>Stay Update With Realshed</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="blog-details.html"><img
                                            src="{{ asset('frontend/assets/images/news/news-1.jpg') }}"
                                            alt=""></a></figure>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <h4><a href="blog-details.html">Including Animation In Your Design System</a></h4>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img
                                                src="{{ asset('frontend/assets/images/news/author-1.jpg') }}"
                                                alt=""></figure>
                                        <h5><a href="blog-details.html">Eva Green</a></h5>
                                    </li>
                                    <li>April 10, 2020</li>
                                </ul>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                </div>
                                <div class="btn-box">
                                    <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="blog-details.html"><img
                                            src="{{ asset('frontend/assets/images/news/news-3.jpg') }}"
                                            alt=""></a></figure>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <h4><a href="blog-details.html">How New Font Technologies Will Improve The Web</a></h4>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img
                                                src="{{ asset('frontend/assets/images/news/author-3.jpg') }}"
                                                alt=""></figure>
                                        <h5><a href="blog-details.html">Simon Baker</a></h5>
                                    </li>
                                    <li>April 28, 2020</li>
                                </ul>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                </div>
                                <div class="btn-box">
                                    <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="blog-details.html"><img
                                            src="{{ asset('frontend/assets/images/news/news-3.jpg') }}"
                                            alt=""></a></figure>
                                <span class="category">Featured</span>
                            </div>
                            <div class="lower-content">
                                <h4><a href="blog-details.html">Taking The Pattern Library To The Next Level</a></h4>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img
                                                src="{{ asset('frontend/assets/images/news/author-3.jpg') }}"
                                                alt=""></figure>
                                        <h5><a href="blog-details.html">Simon Baker</a></h5>
                                    </li>
                                    <li>April 28, 2020</li>
                                </ul>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                </div>
                                <div class="btn-box">
                                    <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->


    <!-- download-section -->
    <section class="download-section bg-color-3">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend/assets/images/shape/shape-3.png') }});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1 wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms"><img
                                src="{{ asset('frontend/assets/images/resource/download-1.png') }}" alt="">
                        </figure>
                        <figure class="image image-2 wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms"><img
                                src="{{ asset('frontend/assets/images/resource/download-2.png') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <span>Download</span>
                            <h2>Download Our Android and IOS App for Experience</h2>
                            <div class="download-btn">
                                <a href="index.html" class="app-store">
                                    <i class="fab fa-apple"></i>
                                    <p>Download on</p>
                                    <h4>App Store</h4>
                                </a>
                                <a href="index.html" class="google-play">
                                    <i class="fab fa-google-play"></i>
                                    <p>Get It On</p>
                                    <h4>Google Play</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- download-section end -->
@endsection
