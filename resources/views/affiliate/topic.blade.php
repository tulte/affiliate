@extends('layouts.master')

@section('title', $topic->meta_title)
@section('description', $topic->meta_description)
@section('image', $topic->meta_image)

@section('content')


        <!--=== Breadcrumbs ===-->
        <div class="breadcrumbs breadcrumbs-light">
            <div class="container">
                <h3 class="pull-left breadcrumb">{{$topic->name}}</h3>
                <ul class="pull-right breadcrumb">
                    <li><a href="{{route('affiliate.topic.compare', [$topic->name])}}">Vergleich</a></li>
                    @if($topic->articles->count() > 0)
                        <li><a href="{{route('affiliate.topic.article', [$topic->name])}}">Neuigkeiten</a></li>
                    @endif
                </ul>
            </div>
        </div><!--/breadcrumbs-->
        <!--=== End Breadcrumbs ===-->

        <!--=== Content Part ===-->
        <div class="container content">

            <div class="heading heading-v1 margin-bottom-20">
                <p>{!! $topic->intro !!}</p>
            </div>

            <!-- Pricing Mega v1 -->
            <div class="row no-space-pricing pricing-mega-v1">
                <div class="col-md-2 col-sm-6 hidden-sm hidden-xs">
                    <div class="pricing hidden-area">
                        <div class="pricing-head compare-image-container">
                        </div>
                        <ul  class="pricing-content list-unstyled">
                            <li class="bg-color"><div class="compare-category">Hersteller</div></li>
                            <li><div class="compare-category compare-category-rating">Bewertung</div></li>

                            @foreach($topic->products[0]->groups as $group)
                                @if($loop->iteration % 2)
                                    <li class="bg-color">
                                @else
                                    <li>
                                @endif
                                    <div class="compare-category">
                                        <i class="fa {{$group->icon}}"></i>{{$group->name}}
                                    </div>
                                </li>
                            @endforeach

                                @if($topic->products[0]->groups->count() % 2)
                                    <li>
                                @else
                                    <li class="bg-color">
                                @endif
                                    <div class="compare-category compare-category-attribute">
                                        Besonderheiten
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
                @foreach($topic->products as $product)
                <div class="col-md-2 col-sm-6 block">
                    <div class="pricing">
                        <div class="pricing-head">
                            <a href="{{$product->link}}" class="btn-u btn-block btn-compare-header" target="_blank">{{$product->name}}</a>
                            <h4>
                                <a href="{{$product->link}}" target="_blank">
                                <img src="/{{$product->image}}" alt="{{$product->name}}" class="compare-image" />
                                </a>
                            </h4>
                        </div>
                        <ul class="pricing-content list-unstyled ">
                            <li class="bg-color">
                                {{$product->provider}}
                            </li>
                            <li>
                                <ul class="list-unstyled list-inline rating compare-star compare-category-rating" data-toggle="tooltip" title="{{$product->review_value / 10}} von 5">
                                    @for ($i = 10; $i <= 50; $i += 10)
                                         @if ($product->review_value >= $i)
                                            <li class="compare-star"><i class="fa fa-star fa-2x"></i></li>
                                         @elseif ($product->review_value >= ($i-10))
                                            <li class="compare-star"><i class="fa fa-star-half-empty fa-2x"></i></li>
                                         @else
                                            <li class="compare-star"><i class="fa fa-star-o fa-2x"></i></li>
                                         @endif
                                    @endfor
                                    <a href="{{$product->link}}" target="_blank"><p>{{$product->review_count}} Bewertungen</p></a>
                                </ul>
                                <span class="hidden-md hidden-lg">{{$group->name}}</span>
                            </li>
                            @foreach($topic->products[0]->groups as $group)

                                @php($product_group = ViewHelper::first_eloquent($product->groups,'id', $group->id))

                                @if($loop->iteration % 2)
                                    <li class="bg-color">
                                @else
                                    <li>
                                @endif

                                @if($product_group)
                                    @if($product_group->pivot->type == 'BOOLEAN')
                                        @if($product_group->pivot->value == '1')
                                            <i class="fa fa-check"></i>
                                        @else
                                            <i class="fa fa-times"></i>
                                        @endif
                                    @elseif($product_group->pivot->type == 'ICON')
                                        <i class="fa {{$product_group->pivot->value}}"></i>
                                    @else
                                        {{$product_group->pivot->value}}
                                    @endif
                                    <span class="hidden-md hidden-lg">{{$product_group->name}}</span>
                                @else
                                    unbekannt
                                @endif

                                </li>
                            @endforeach


                                @if($topic->products[0]->groups->count() % 2)
                                    <li>
                                @else
                                    <li class="bg-color">
                                @endif

                                    <div class="compare-category-attribute">
                                        @foreach($product->attributes as $attribute)
                                            <span class="compare-category-attribute-value">{{$attribute->value}}</span>
                                        @endforeach
                                    </div>

                                </li>

                        </ul>
                        <div class="btn-group btn-group-justified">
                            <a href="{{$product->link}}" class="btn-u btn-block" target="_blank">
                                <i class="fa fa-amazon"></i>
                                Angebot für {{substr($product->price,0 , strlen($product->price) - 2) . ',' . substr($product->price,-2)}} €
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Pricing Mega v1 -->
        </div>

        @foreach($topic->infos as $info)
            @if($loop->iteration % 2)
                <div class="bg-color-light margin-bottom-60">
            @else
                <div class="bg-color-white margin-bottom-60">
            @endif
                <div class="container content-md">
                    <div class="headline-center-v2 headline-center-v2-dark margin-bottom-60">
                        <h2>{{$info->header}}</h2>
                        <span class="bordered-icon"><i class="fa fa-th-large"></i></span>
                        {!! $info->text !!}
                    </div><!--/Headline Center v2-->
                </div><!--/end container-->
            </div>
        @endforeach


@endsection

@section('scripts')

<script type="text/javascript">

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

</script>

@endsection
