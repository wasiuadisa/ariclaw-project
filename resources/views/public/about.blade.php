
@extends('layouts.public_template')

@section('main_content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>about us</h2>
                            <p>home <span>//</span>about us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- breadcrumb start-->

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
    <section class="service_part section_padding mr_bottom">
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
    <!-- cta_part part start-->
    <section class="cta_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta_text">
                        <h2>{{ htmlspecialchars_decode($index_contents->colour_divider_text) }}</h2>
                        <a href="#" class="cta_btn">{{ htmlspecialchars_decode($index_contents->colour_divider_button) }}</a>
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
@endsection