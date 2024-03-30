@extends('layouts.public_template')

@section('main_content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Service</h2>
                            <p>home <span>//</span>Service</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!-- servicing start-->
    <section class="single_service section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>{{ ucwords(htmlspecialchars_decode($service_page_contents->divider_title)) }}</h2>
                        <p>{{ ucfirst(htmlspecialchars_decode($service_page_contents->divider_text)) }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
    @if(count($service_contents) > 0)
            @foreach($service_contents as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_single_service">
                        <img src="{{ asset('storage/public_template/img/service_icon/' . $service->icon) }}" alt="#">
                        <h4>{{ ucwords(htmlspecialchars_decode($service->title)) }}</h4>
                        <p>{{ ucfirst(htmlspecialchars_decode($service->text)) }}</p>
                    </div>
                </div>
            @endforeach
    @endif
            </div>
        </div>
    </section>
    <!-- servicing end-->

    <!--::review_part start::-->
    <section class="review_part section_padding section_bg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    <!-- MAIN SLIDES -->
                    <div class="slider">
            @if(count($testimonial_contents) > 0)
                    <?php $rowNumber = 1; ?>
                    @foreach($testimonial_contents as $testimonial)
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
            @if(count($testimonial_contents) > 0)
                    <?php $rowNumber = 1; ?>
                    @foreach($testimonial_contents as $testimonial)
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