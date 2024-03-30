
@extends('layouts.public_template')

@section('main_content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>{{ ucwords(htmlspecialchars_decode($index_contents->banner_title)) }}</h1>
                            <!--<h1>Finest And <br>
                                Strongest Law <br>
                                Firm Win The World</h1>-->
                            <p>{{ ucfirst(htmlspecialchars_decode($index_contents->banner_excerpt)) }}</p>
                            <div class="banner_btn">
                                <a href="#" class="btn_1">{{ ucwords(htmlspecialchars_decode($index_contents->button_title)) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>{{ htmlspecialchars_decode($about_us_contents->divider_title) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-sm-7">
                    <div class="about_part_img">
                        <img src="{{ asset('storage/public_template/img/' . $about_us_contents->image_wide) }}" alt="#">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-5 d-none d-sm-block">
                    <div class="about_part_img">
                        <img src="{{ asset('storage/public_template/img/' . $about_us_contents->image_square) }}" alt="#">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_text text-center">
                        <p>{{ htmlspecialchars_decode($about_us_contents->image_text) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!-- Service part start-->
    <section class="service_part section_padding">
        <div class="container">
            <div class="row align-items-center">
        @if(count($marketingPitch) > 0)
                @foreach($marketingPitch as $pitch)
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <span class="{{ htmlspecialchars_decode($pitch->icon) }}"></span>
                            <h2>{{ htmlspecialchars_decode($pitch->title) }}</h2>
                            <p>{{ htmlspecialchars_decode($pitch->text) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        @endif
            </div>
        </div>
    </section>
    <!-- Service part end-->

    <!-- our_offer part start-->
    <section class="our_offer case_study section_padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-sm-10">
                    <div class="section_tittle">
                        <h2>{{ ucwords(htmlspecialchars_decode($index_contents->feature_title)) }}</h2>
                        <p>{{ ucfirst(htmlspecialchars_decode($index_contents->feature_text)) }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/' . $index_contents->feature_banner_image1) }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title1)) }}">
                            <div class="hover_text">
                                <h2>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title1)) }}</h2>
                                <p>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_slogan1)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/' . $index_contents->feature_banner_image2) }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title2)) }}">
                            <div class="hover_text">
                                <h2>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title2)) }}</h2>
                                <p>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_slogan2)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/' . $index_contents->feature_banner_image3) }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title3)) }}">
                            <div class="hover_text">
                                <h2>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title3)) }}</h2>
                                <p>{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_slogan3)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_offer part end-->

    <!-- team_part part start-->
    <section class="team_part our_offer section_bg section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>{{ ucwords(htmlspecialchars_decode($team_page_contents->title)) }}</h2>
                        <p>{{ ucfirst(htmlspecialchars_decode($team_page_contents->text)) }}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
    @if(count($teams) > 0)
            @foreach($teams as $team)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/team/' . $team->image_filename) }}" alt="{{ htmlspecialchars_decode($team->fullname) }}">
                            <div class="hover_text">
                                <p>{{ htmlspecialchars_decode($team->email) }}</p>
                                <div class="team_social_icon">
                                    <a href="{{ htmlspecialchars_decode($team->twitter) }}"> <span class="ti-twitter"></span> </a>
                                    <a href="{{ htmlspecialchars_decode($team->skype) }}"> <span class="ti-skype"></span> </a>
                                    <a href="{{ htmlspecialchars_decode($team->instagram) }}"> <span class="ti-instagram"></span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="team_member_info">
                            <h4>{{ htmlspecialchars_decode($team->fullname) }}</h4>
                            <p>{{ htmlspecialchars_decode($team->job_title) }}</p>
                        </div>
                    </div>
                </div>
                    @endforeach
            @endif

            </div>
        </div>
    </section>
    <!-- team_part part end-->

    <!-- cta_part part start-->
    <section class="cta_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta_text">
                        <h2>{{ ucwords(htmlspecialchars_decode($index_contents->colour_divider_text)) }}</h2>
                        <a href="#" class="cta_btn">{{ ucwords(htmlspecialchars_decode($index_contents->colour_divider_button)) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta_part part end-->

    <!--::review_part start::-->
    <section class="review_part section_padding section_bg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    <!-- MAIN SLIDES -->
                    <div class="slider">
            @if(count($testimonials) > 0)
                    <?php $rowNumber = 1; ?>
                    @foreach($testimonials as $testimonial)
                        <div data-index="{{ $rowNumber++ }}">
                            <div class="client_review_text text-center">
                                <p>{{ htmlspecialchars_decode($testimonial->testimony) }}</p>
                            </div>
                        </div>
                    @endforeach
            @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
            @if(count($testimonials) > 0)
                    <?php $rowNumber = 1; ?>
                    @foreach($testimonials as $testimonial)
                        <div class="slider-thumbnails">
                            <img class="rounded" src="{{ asset('storage/public_template/img/testimonial/' . $testimonial->image_filename) }}" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>{{ htmlspecialchars_decode($testimonial->fullname) }}</h3>
                                <h5>{{ htmlspecialchars_decode($testimonial->company) }}</h5>
                            </div>
                        </div>
                    @endforeach
            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
<?php /*
    <!-- team_part part start-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>Latest From Blog</h2>
                        <p>Over their the abundantly every midst place thing them them winged you're beginning
                            forth you fruit seas very does can after herb moved so was kind </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/blog/blog_1.png') }}" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/blog/blog_2.png') }}" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/blog/blog_3.png') }}" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team_part part end-->
*/ ?>
@endsection