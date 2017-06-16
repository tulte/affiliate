@extends('layouts.master')


@section('title', $site->meta_title)
@section('description', $site->meta_description)
@section('image', $site->meta_image)

@section('content')


        <!--=== Job Img ===-->
        <div class="job-img margin-bottom-30" style="background:url(/{{$site->background}}) no-repeat">
            <div class="job-banner">
                <h2>{!! $site->intro !!}</h2>
            </div>
        </div>
        <!--=== End Job Img ===-->

        <!--=== Content Part ===-->
        <div class="container content">
            <!-- Begin Service Block -->
            <div class="row margin-bottom-40">
                <div class="col-md-4 col-sm-6">
                    <div class="service-block service-block-sea service-or">
                        <div class="service-bg"></div>
                        <i class="icon-custom icon-color-light rounded-x fa fa-lightbulb-o"></i>
                        <h2 class="heading-md">Default Box</h2>
                        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-block service-block-red service-or">
                        <div class="service-bg"></div>
                        <i class="icon-custom icon-color-light rounded-x icon-line icon-fire"></i>
                        <h2 class="heading-md">Red Box</h2>
                        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-block service-block-blue service-or">
                        <div class="service-bg"></div>
                        <i class="icon-custom icon-color-light rounded-x icon-line icon-rocket"></i>
                        <h2 class="heading-md">Dark Box</h2>
                        <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                    </div>
                </div>
            </div>
            <!-- End Begin Service Block -->

            <!-- Job Content -->
            <div class="headline"><h2>Letzte Neuigkeiten</h2></div>
            <div class="row job-content margin-bottom-40">
                <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                    <h3 class="heading-md"><strong>Accounting &amp; Finance</strong></h3>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Accounting</a> <small class="hex">(342 jobs)</small></li>
                        <li><a href="#">Admin &amp; Clerical</a> <small class="hex">(143 jobs)</small></li>
                        <li><a href="#">Banking &amp; Finance</a> <small class="hex">(66 jobs)</small></li>
                        <li><a href="#">Contract &amp; Freelance</a> <small class="hex">(12 jobs)</small></li>
                        <li><a href="#">Business Development</a> <small class="hex">(212 jobs)</small></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                    <h3 class="heading-md"><strong>Medicla &amp; Health</strong></h3>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Nurse</a> <small class="hex">(546 jobs)</small></li>
                        <li><a href="#">Health Care</a> <small class="hex">(82 jobs)</small></li>
                        <li><a href="#">General Labor</a> <small class="hex">(11 jobs)</small></li>
                        <li><a href="#">Pharmaceutical</a> <small class="hex">(109 jobs)</small></li>
                        <li><a href="#">Human Resources</a> <small class="hex">(401 jobs)</small></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                    <h3 class="heading-md"><strong>Web Development</strong></h3>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Ecommerce</a> <small class="hex">(958 jobs)</small></li>
                        <li><a href="#">Web Design</a> <small class="hex">(576 jobs)</small></li>
                        <li><a href="#">Web Programming</a> <small class="hex">(543 jobs)</small></li>
                        <li><a href="#">Other - Web Development</a> <small class="hex">(67 jobs)</small></li>
                        <li><a href="#">Website Project Management</a> <small class="hex">(45 jobs)</small></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3 class="heading-md"><strong>Sales &amp; Marketing</strong></h3>
                    <ul class="list-unstyled categories">
                        <li><a href="#">Advertising</a> <small class="hex">(123 jobs)</small></li>
                        <li><a href="#">Email Marketing</a> <small class="hex">(544 jobs)</small></li>
                        <li><a href="#">Telemarketing &amp; Telesales</a> <small class="hex">(564 jobs)</small></li>
                        <li><a href="#">Market Research &amp; Surveys</a> <small class="hex">(345 jobs)</small></li>
                        <li><a href="#">SEM - Search Engine Marketing</a> <small class="hex">(32 jobs)</small></li>
                    </ul>
                </div>
            </div>


            <!--=== Job Partners ===-->
            <div class="container content job-partners">
                <div class="title-box-v2">
                    <h2>Hersteller</h2>
                    <p>Eine Auswahl von Herstellern aus den Vergleichen</p>
                </div>

                <ul class="list-inline our-clients" id="effect-2">
                    <li>
                        <figure>
                            <img src="assets/img/clients2/ea-canada.png" alt="">
                            <div class="img-hover">
                                <h4>Ea Canada</h4>
                            </div>
                        </figure>
                    </li>
                </ul>
            </div><!--/container-->
        </div>



@endsection
