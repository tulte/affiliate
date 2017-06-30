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
                    <li><a href="{{route('affiliate.topic.article', [$topic->name])}}">Neuigkeiten</a></li>
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
                <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="pricing hidden-area">
                        <div class="pricing-head compare-image-container">
                        </div>
                        <ul  class="pricing-content list-unstyled">
                            <li class="bg-color"><div class="compare-category">Hersteller</div></li>
                            <li style="height:77px;"><div class="compare-category">Bewertung</div></li>

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
                        </ul>
                    </div>
                </div>
                @foreach($topic->products as $product)
                <div class="col-md-2 col-sm-6 block">
                    <div class="pricing">
                        <div class="pricing-head">
                            <a href="{{$product->link}}" class="btn-u btn-block btn-compare-header" target="_blank">{{$product->name}}</a>
                            <h4><img src="/{{$product->image}}" class="compare-image" /></h4>
                        </div>
                        <ul class="pricing-content list-unstyled ">
                            <li class="bg-color">
                                {{$product->provider}}
                            </li>
                            <li>
                                <ul class="list-unstyled list-inline rating compare-star" data-toggle="tooltip" title="{{$product->review_value / 10}} von 5">
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
                            @foreach($product->groups as $group)
                                @if($loop->iteration % 2)
                                    <li class="bg-color">
                                @else
                                    <li>
                                @endif

                                    @if($group->pivot->type == 'ICON')
                                        <i class="fa {{$group->pivot->value}}"></i>
                                    @else
                                        {{$group->pivot->value}}
                                    @endif
                                    <span class="hidden-md hidden-lg">{{$group->name}}</span>

                                </li>
                            @endforeach
                        </ul>
                        <div class="btn-group btn-group-justified">
                            <a href="{{$product->link}}" class="btn-u btn-block" target="_blank">
                                <i class="fa fa-amazon"></i>
                                Angebot für {{$product->price}}€
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
