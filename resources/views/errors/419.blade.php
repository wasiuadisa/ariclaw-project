<?php
$pageTitle = "Error 419! ";
$pageTag =  strtolower($pageTitle) . '-' . config('app.short_name');
?>

@section('extra_meta')
    <meta name="robots" content="noindex,nofollow">
@endsection

@section('pageTitle') {{ $pageTitle }} @endsection

@extends('layouts.public_template')

@section('main_content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>{{ $pageTitle }}</h2>
                            <p>home <span>//</span>{{ $pageTitle }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- breadcrumb start-->

    <!-- about part start-->
    <section class="about_part section_padding" style="margin-top: -100px;">
        <div class="container text-center">
           <h3 style="color: black;">{{ $pageTitle }} - Page expired!</h3>
           <h3 style="color: black;">The Page you are requesting has expired you must make fresh request.</h3>
        </div>
    </section>
@endsection