@extends('layouts.public_template')

@section('main_content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Frequently Asked Questions</h2>
                            <p>Home <span>//</span>FAQs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>{{ ucwords(htmlspecialchars_decode($faq_page_contents->title)) }}</h2>
                        <p>{{ htmlspecialchars_decode($faq_page_contents->text) }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">

                        <div class="accordion" id="accordionFAQ">
        @if(count($faq_contents) > 0)
                <?php $rowNumber = 1; ?>
                @foreach($faq_contents as $faq)
                          <div class="card">
                            <div class="card-header" id="heading{{ Str::kebab(htmlspecialchars_decode($faq->question)) }}">
                              <h2>
                                <button class="btn btn-link btn-block text-black font-weight-bold text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapse{{ Str::kebab(htmlspecialchars_decode($faq->question)) }}" aria-expanded="true" aria-controls="collapse{{ Str::kebab(htmlspecialchars_decode($faq->question)) }}">
                                  {{ ucwords(htmlspecialchars_decode($faq->question)) }}
                                </button>
                              </h2>
                            </div>
                            <div id="collapse{{ Str::kebab(htmlspecialchars_decode($faq->question)) }}" class="collapse" aria-labelledby="heading{{ Str::kebab(htmlspecialchars_decode($faq->question)) }}" data-parent="#accordionFAQ">
                              <div class="card-body">
                                <p class="text-black">{{ ucfirst(htmlspecialchars_decode($faq->answer)) }}</p>
                              </div>
                            </div>
                          </div>
                @endforeach
        @endif
                        </div>

                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

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