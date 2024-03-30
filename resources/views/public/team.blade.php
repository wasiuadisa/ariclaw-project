@extends('layouts.public_template')

@section('main_content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Attorneys</h2>
                            <p>home <span>//</span>attorneys</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- team_part part start-->
    <section class="team_part our_offer single_attorneys section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>{{ ucwords(htmlspecialchars_decode($team_page_contents->title)) }}</h2>
                        <p>{{ htmlspecialchars_decode($team_page_contents->text) }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
            @if(count($team_members_contents) > 0)
                @foreach($team_members_contents as $team_member)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="{{ asset('storage/public_template/img/team/' . $team_member->image_filename) }}" alt="{{ htmlspecialchars_decode($team_member->fullname) }}'s photo">
                            <div class="hover_text">
                                <p>{{ htmlspecialchars_decode($team_member->email) }}</p>
                                <div class="team_social_icon">
                                    <a href="{{ htmlspecialchars_decode($team_member->twitter) }}"> <span class="ti-twitter"></span> </a>
                                    <a href="{{ htmlspecialchars_decode($team_member->skype) }}"> <span class="ti-skype"></span> </a>
                                    <a href="{{ htmlspecialchars_decode($team_member->instagram) }}"> <span class="ti-instagram"></span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="team_member_info">
                            <h4>{{ htmlspecialchars_decode($team_member->fullname) }}</h4>
                            <p>{{ htmlspecialchars_decode($team_member->job_title) }}</p>
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
                        <h2>{{ ucfirst($index_contents->colour_divider_text) }}</h2>
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
@endsection