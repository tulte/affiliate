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
            <div class="row margin-bottom-40 centered">
                @foreach($site->topics as $topic)
                    <div class="col-md-4 col-sm-6">
                        <div class="service-block service-block-blue service-or">
                            <div class="service-bg"></div>
                            <h2 class="heading-md"><a href="{{route('affiliate.topic', [$topic->name])}}" >{{$topic->name}}</a></h2>
                            <p>{!! $topic->intro !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="title-box-v2">
                <h2>Produkte</h2>
                <p>Neue Produkte im Vergleich</p>
            </div>
            <div class="container content-md">
                <ul class="row list-row margin-bottom-30">
                    @foreach($products as $product)
                        <li class="col-md-4 md-margin-bottom-30">
                            <div class="content-boxes-v2 text-center block-grid-v1 rounded">
                                <h3 class="heading-md"><strong><a href="{{route('affiliate.topic', [$product->topic_id])}}" >{{$product->name}}</a></strong></h3>
                                <figure>
                                    <img src="/{{$product->image}}" alt="">
                                </figure>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>


        <div class="parallax-quote parallaxBg" style="background-position: 50% 20px;">
            <div class="container">
                <div class="parallax-quote-in">
                    <p>{{$site->quotation_text}}</p>
                    <small>- {{$site->quotation_author}} -</small>
                </div>
            </div>
        </div>

            <div class="bg-grey">
                <div class="container content-md">
                    <ul class="row list-row margin-bottom-30">
                        @foreach($articles as $article)
                            <li class="col-md-4 md-margin-bottom-30">
                                <div class="content-boxes-v2 text-center block-grid-v1 rounded">
                                    <i class="icon-custom rounded-x icon-bg-yellow fa fa-diamond"></i>
                                    <div class="content-boxes-in-v3">

                                        <h3><a href="{{route('affiliate.topic', [$article->topic_id])}}" >{{$article->header}}</a></h3>
                                        <ul class="list-inline margin-bottom-5">
                                            <li><i class="fa fa-clock-o"></i> {{$article->created_at}}</li>
                                        </ul>
                                        <p>{!! $article->text !!}</p>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <div class="container content job-partners">
                <div class="title-box-v2">
                    <h2>Hersteller</h2>
                    <p>Unsere Herstellern aus den Vergleichen</p>
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




@endsection
