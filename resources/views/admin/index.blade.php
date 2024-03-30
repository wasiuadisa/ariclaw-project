
@section('extra_script')
@endsection

@extends('layouts.admin_template')

@section('main_content')
    <div class="content">
        <div class="py-4 px-3 px-md-4">

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h2 mb-0">{{ $pageTitle }}</div>
            </div>

            <!----------------- Main page content ---------------->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3 mb-md-4">

                        <div class="card mb-3 mb-md-4">
                            @if( session('info') )
                            <!-- Message -->
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Alert!</span> {{ session('info') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif

                            @if( count($errors) > 0 )
                            <!-- Errors message -->
                            <div class="col-sm-12">
                                <ul class="alert alert-danger alert-dismissible fade show list-unstyled text-center">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                @foreach( $errors->all() as $error )                                
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                                <hr>
                            </div>
                            @endif
                        </div>

                        <div class="card mb-3 mb-md-4">
                            <form class="form ml-5" method="post" action="{{ route('admin.index_post') }}">
                                @csrf
                                <input type="hidden" name="postID" value="{{ $index_contents->id }}" />
                                <div class="form-group ">
                                    <label for="bannerTitle" class="h4">
                                        Banner Title
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="bannerTitle" name="bannerTitle" aria-describedby="bannerTitle" value="@if(count($errors) > 0){{ old('bannerTitle') }}@else{{ htmlspecialchars_decode($index_contents->banner_title) }}@endif">
                                </div>
                                <div class="form-group ">
                                    <label for="bannerExcerpt" class="h4">
                                        Banner Excerpt
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="bannerExcerpt" name="bannerExcerpt" aria-describedby="bannerExcerpt" value="@if(count($errors) > 0){{ old('bannerExcerpt') }}@else{{ htmlspecialchars_decode($index_contents->banner_excerpt) }}@endif">
                                </div>
                                <div class="form-group ">
                                    <label for="buttonTitle" class="h4">
                                        Banner Button Title
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="buttonTitle" name="buttonTitle" aria-describedby="buttonTitle" value="@if(count($errors) > 0){{ old('buttonTitle') }}@else{{ htmlspecialchars_decode($index_contents->button_title) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="banner_image" class="h4">
                                        Banner image
                                    </label>
                                </div>
                                <div class="form-group">
                                    <img class="img-fluid img-thumbnail" style="margin-top: -15px;" src="{{ asset('storage/public_template/img') . '/' . $index_contents->banner_image }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->banner_title)) }}" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.banner_home_image_form', [$index_contents->id]) }}" class="btn btn-primary">
                                        <span class="fold-item-icon mr-3">
                                            <i class="gd-gallery"></i>
                                        </span> Change Banner Image
                                    </a>
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <label for="featureTitle" class="h4">
                                        Feature Title
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureTitle" name="featureTitle" aria-describedby="featureTitle" value="@if(count($errors) > 0){{ old('featureTitle') }}@else{{ htmlspecialchars_decode($index_contents->feature_title) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureText" class="h4">
                                        Feature Text
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureText" name="featureText" aria-describedby="featureText" value="@if(count($errors) > 0){{ old('featureText') }}@else{{ htmlspecialchars_decode($index_contents->feature_text) }}@endif">
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>
                                
                                <div class="form-group">
                                    <label for="featureBannerTitle1" class="h4">
                                        Feature Banner Title 1
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerTitle1" name="featureBannerTitle1" value="@if(count($errors) > 0){{ old('featureBannerTitle1') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_title1) }}@endif">
                                </div>
                                <div class="form-group ">
                                    <label for="featureBannerSlogan1" class="h4">
                                        Feature Slogan 1
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerSlogan1" name="featureBannerSlogan1" aria-describedby="featureBannerSlogan1" value="@if(count($errors) > 0){{ old('featureBannerSlogan1') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_slogan1) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureBannerImage1" class="h4">
                                        Feature Banner Image 1
                                    </label>
                                </div>
                                <div class="form-group">
                                    <img class="img-fluid img-thumbnail" style="margin-top: -15px;" src="{{ asset('storage/public_template/img') . '/' . $index_contents->feature_banner_image1 }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title1)) }}" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.feature1_home_image_form', [$index_contents->id]) }}" class="btn btn-primary">
                                        <span class="fold-item-icon mr-3">
                                            <i class="gd-gallery"></i>
                                        </span> Change Feature 1 Banner Image
                                    </a>
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group" class="h4">
                                    <label for="featureBannerTitle2" class="h4">
                                        Feature Banner Title 2
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerTitle2" name="featureBannerTitle2" value="@if(count($errors) > 0){{ old('featureBannerTitle2') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_title2) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureBannerSlogan2" class="h4">
                                        Feature Slogan 2
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerSlogan2" name="featureBannerSlogan2" aria-describedby="featureBannerSlogan2" value="@if(count($errors) > 0){{ old('featureBannerSlogan2') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_slogan2) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureBannerImage2" class="h4">
                                        Feature Banner Image 2
                                    </label>
                                </div>
                                <div class="form-group">
                                    <img class="img-fluid img-thumbnail" style="margin-top: -15px;" src="{{ asset('storage/public_template/img') . '/' . $index_contents->feature_banner_image2 }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title2)) }}" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.feature2_home_image_form', [$index_contents->id]) }}" class="btn btn-primary">
                                        <span class="fold-item-icon mr-3">
                                            <i class="gd-gallery"></i>
                                        </span> Change Feature 2 Banner Image
                                    </a>
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <label for="featureBannerTitle3" class="h4">
                                        Feature Banner Title 3
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerTitle3" name="featureBannerTitle3" value="@if(count($errors) > 0){{ old('featureBannerTitle3') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_title3) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureBannerSlogan3" class="h4">
                                        Feature Slogan 3
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="featureBannerSlogan3" name="featureBannerSlogan3" aria-describedby="featureBannerSlogan3" value="@if(count($errors) > 0){{ old('featureBannerSlogan3') }}@else{{ htmlspecialchars_decode($index_contents->feature_banner_slogan3) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="featureBannerImage2" class="h4">
                                        Feature Banner Image 3
                                    </label>
                                </div>
                                <div class="form-group">
                                    <img class="img-fluid img-thumbnail" style="margin-top: -15px;" src="{{ asset('storage/public_template/img') . '/' . $index_contents->feature_banner_image3 }}" alt="{{ ucwords(htmlspecialchars_decode($index_contents->feature_banner_title3)) }}" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.feature3_home_image_form', [$index_contents->id]) }}" class="btn btn-primary">
                                        <span class="fold-item-icon mr-3">
                                            <i class="gd-gallery"></i>
                                        </span> Change Feature 3 Banner Image
                                    </a>
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <label for="colourDividerText" class="h4">
                                        Colour Divider Text
                                    </label>
                                    <textarea class="form-control border border-dark" id="colourDividerText" name="colourDividerText">@if(count($errors) > 0){{ old('colourDividerText') }}@else{{ htmlspecialchars_decode($index_contents->colour_divider_text) }}@endif</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="colourDividerButton" class="h4">
                                        Colour Divider Button
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="colourDividerButton" name="colourDividerButton" value="@if(count($errors) > 0){{ old('colourDividerButton') }}@else{{ htmlspecialchars_decode($index_contents->colour_divider_button) }}@endif">
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">
                                        <i class="gd-save mr-3"></i> 
                                        Update Home Page
                                    </button>
                                </div>
                            </form>
                        </div>
 
                    </div>
                </div>
            </div>
            <!----------------- End of Main page content --------->
        </div>

@endsection