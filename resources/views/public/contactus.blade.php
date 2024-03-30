
@section('extra_script')
  @if(config('app.captcha_setting') == true)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  @endif
@endsection

@extends('layouts.public_template')

@section('main_content')
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner text-center">
            <div class="breadcrumb_iner_item">
              <h2>Contact Us</h2>
              <p>home <span>//</span>Contact Us</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
        <?php /*
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>
      </div>
        */ ?>
      <div class="row">

        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>

        <div class="col-12">
      @if( session('contactUsInfo') )
          <!-- Errors for message -->
          <ul class="alert alert-success text-center">
              <li>{{ session('contactUsInfo') }}</li>
          </ul>
          <hr>
      @endif

      @if( $errors->any() )
          <!-- Errors for message -->
          <h3 class="alert alert-danger text-center">Your message could not be mailed:</h3>
          <ul class="alert alert-danger text-center list-unstyled">
        @foreach( $errors->all() as $error )                                
            <li>{{ $error }}</li>
        @endforeach
          </ul>
          <hr>
      @endif
        </div>
  
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="{{ route('public_contactus_post') }}" method="post" id="contactForm">
            @csrf
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <div class="row">
                    <label for="category" class="pull-left ml-3">Type of message</label>
                  </div>
                  <div class="row">
                    <select class="form-control border border-dark ml-3" name="category" id="category">
                      <option value=""> -- Type of message -- </option>
                @foreach( $categories as $category )
                      <option value="{{ $category->name }}" @if(old('category') == $category->name){{ 'selected' }} @endif>
                        {{ htmlspecialchars_decode(ucfirst($category->name)) }}
                      </option>
                @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label for="title">Subject</label>
                  <input class="form-control border border-dark" name="title" id="title" type="text" value="{{ old('title') }}">
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-12">
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control border border-dark w-100" name="message" id="message" cols="30" rows="9">{{ old('message') }}</textarea>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="firstname">Firstname</label>
                  <input class="form-control border border-dark" name="firstname" id="firstname" type="text" value="{{ old('firstname') }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input class="form-control border border-dark" name="surname" id="surname" type="text" value="{{ old('surname') }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">Phone (e.g. {{ $site_setting_contents->contact_phone }})</label>
                  <input class="form-control border border-dark" name="phone" id="phone" type="tel" value="{{ old('phone') }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control border border-dark" name="email" id="email" type="email" value="{{ old('email') }}">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
          @if(config('app.captcha_setting') == true)
            @if(config('app.captcha_setting_test') == false)
              <!-- reCaptcha Version 2 -->
              <div class="g-recaptcha" data-sitekey="{{ config('app.recaptchaGenuineSite') }}"></div>
            @else
              <!-- reCaptcha Version 2 -->
              <div class="g-recaptcha" data-sitekey="{{ config('app.recaptchaSampleSite') }}"></div>
            @endif
          @endif
              <button type="submit" class="button button-contactForm btn_4">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>{{ $site_setting_contents->contact_address }}</h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>{{ $site_setting_contents->contact_phone }}</h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>{{ $site_setting_contents->contact_email }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->
@endsection