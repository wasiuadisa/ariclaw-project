
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
                            <form class="form ml-5" method="post" action="{{ route('admin.new-team-member-processing') }}">
                                @csrf
                                <div class="form-group ">
                                    <label for="fullname" class="h4">
                                        Full name
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="fullname" name="fullname" aria-describedby="fullname" value="{{ old('fullname') }}">
                                    <hr/>
                                </div>
                                <div class="form-group ">
                                    <label for="title" class="h4">
                                        Job title
                                    </label>
                                    <input type="text" class="form-control border border-dark" id="title" name="title" aria-describedby="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="h4">Email address</label>
                                    <input type="text" class="form-control border border-dark" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter" class="h4">Twitter address</label>
                                    <input type="text" class="form-control border border-dark" id="twitter" name="twitter" aria-describedby="twitter" value="{{ old('twitter') }}">
                                </div>
                                <div class="form-group">
                                    <label for="skype" class="h4">Skype address</label>
                                    <input type="text" class="form-control border border-dark" id="skype" name="skype" aria-describedby="skype" value="{{ old('skype') }}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram" class="h4">Instagram address</label>
                                    <input type="text" class="form-control border border-dark" id="instagram" name="instagram" aria-describedby="instagram" value="{{ old('instagram') }}">
                                </div>

                                <div class="clearfix border-bottom border-success mb-5 mt-5"></div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">
                                        <i class="gd-save mr-3"></i> 
                                        Update
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