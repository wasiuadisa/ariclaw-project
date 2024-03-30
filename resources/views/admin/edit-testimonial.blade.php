
@section('extra_script')
@endsection

@extends('layouts.admin_template')

@section('main_content')
    <div class="content">
        <div class="py-4 px-3 px-md-4">

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">{{ $pageTitle }}</div>
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
                            <form class="form ml-5" method="post" action="{{ route('admin.testimony_post', $contents->id) }}">
                                @csrf
                                <input type="hidden" name="postID" value="intval($contents->id)">
                                <div class="form-group ">
                                    <label for="fullname" class="h4">
                                        Full name
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="fullname" name="fullname" aria-describedby="fullname" value="@if(count($errors) > 0){{ old('fullname') }}@else{{ htmlspecialchars_decode($contents->fullname) }}@endif">
                                </div>
                                <div class="form-group" style="width: 70%; height: 100%;">
                                    <img class="img-fluid" src="{{ asset('storage/public_template/img/testimonial/' . $contents->image_filename) }}" />
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.image_edit_form_for_testimony', ['testimonial', $contents->id]) }}" class="btn btn-primary">Change testimonial photo</a>
                                    <hr/>
                                </div>
                                <div class="form-group">
                                    <label for="position" class="h4">
                                        Job title
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="position" name="position" aria-describedby="position" value="@if(count($errors) > 0){{ old('position') }}@else{{ htmlspecialchars_decode($contents->job_title) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="business" class="h4">Company</label>
                                    <input type="text" class="form-control border border-dark" id="business" name="business" aria-describedby="business" value="@if(count($errors) > 0){{ old('business') }}@else{{ htmlspecialchars_decode($contents->company) }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="statement" class="h4">Testimony</label>
                                    <textarea class="form-control border border-dark" name="statement" id="statement">@if(count($errors) > 0){{ old('statement') }}@else{{ htmlspecialchars_decode($contents->testimony) }}@endif</textarea>
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">
                                        <i class="gd-save mr-3"></i> 
                                        Update Testimonial
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