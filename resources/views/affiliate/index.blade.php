@extends('layouts.master')


@section('title', $site->meta_title)
@section('description', $site->meta_description)
@section('image', $site->meta_image)

@section('content')


        <!--=== Job Img ===-->
        <div class="job-img background-index" style="background:url(/{{$site->background}}) no-repeat">
            <div class="job-banner">
                <h2>{{ $site->intro }}</h2>
            </div>
        </div>
        <!--=== End Job Img ===-->


        <div class="bg-grey">
                <div class="container content-md site-description">
                {!! $site->description !!}
            </div>
        </div>

        <!--=== Content Part ===-->
        <div class="container content">
            <div class="row margin-bottom-40 centered">
                @foreach($site->topics as $topic)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{route('affiliate.topic', [$topic->name])}}" >
                            <div class="service-block service-block-blue service-or product-block">
                                <div class="service-bg"></div>
                                <h2 class="heading-md">{{$topic->name}}</h2>
                                <p>{{  count(explode("\n",wordwrap($topic->intro, 150))) > 1 ? explode("\n",wordwrap($topic->intro, 150))[0] . ' ...' : $topic->intro   }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="title-box-v2">
                <h2>Produkte</h2>
                <p>Wir suchen für sie ständig nach neuen Produkten. Hier sehen sie eine kleine Auswahl der neuen Produkte aus den Vergleichen. Wir hoffen für sie ist etwas dabei.</p>
            </div>
            <div class="container content-md">
                <ul class="row list-row margin-bottom-30">
                    @foreach($products as $product)
                        <li class="col-md-4">
                            <a href="{{route('affiliate.topic', [$product->topic_id])}}" >
                                <div class="content-boxes-v2 text-center block-grid-v1 rounded">
                                    <h3 class="heading-md"><strong>{{$product->name}}</strong></h3>
                                    <figure>
                                        <img src="/{{$product->image}}" alt="{{$product->name}}" width="218" height="218">
                                    </figure>
                                </div>
                            </a>
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
                    <ul class="row list-row">
                        @foreach($articles as $article)
                            <li class="col-md-4 md-margin-bottom-30">
                                <div class="content-boxes-v2 text-center block-grid-v1 rounded">
                                    <i class="icon-custom rounded-x icon-bg-blue fa fa-sun-o"></i>
                                    <div class="content-boxes-in-v3">

                                        <h3><a href="{{route('affiliate.topic', [$article->topic_id])}}" >{{$article->header}}</a></h3>
                                        <ul class="list-inline margin-bottom-5">
                                            <li><i class="fa fa-clock-o"></i> {{ date('d.m.Y', strtotime($article->created_at)) }}</li>
                                        </ul>
                                        <p>{!! $article->text !!}</p>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <div class="container content">
                <div class="title-box-v2">
                    <h2>Hersteller</h2>
                    <p>Die Hersteller der Produkte sind vielfältig wie die Produkte selbst. Damit sie sich aber schon einmal einen Überblich verschaffen können, zeigen wir ihnen hier eine Auswahl der unterschiedlichen Hersteller aus den Vergleichen.</p>
                </div>

                <div class="row margin-bottom-40 centered">
                    @foreach($providers as $provider)
                        <div class="col-md-2 col-sm-3">
                            <div class="service-block service-block-blue service-or provider-block">
                                <p>{{$provider->provider}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!--/container-->




@endsection
