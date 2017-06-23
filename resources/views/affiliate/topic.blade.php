@extends('layouts.master')

@section('title', $topic->meta_title)
@section('description', $topic->meta_description)
@section('image', $topic->meta_image)

@section('content')


        <!--=== Breadcrumbs ===-->
        <div class="breadcrumbs breadcrumbs-light">
            <div class="container">
                <h1 class="pull-left">{{$topic->name}}</h1>
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
                        <div class="pricing-head ">
                            <h4 class="price"></h4>
                        </div>
                        <ul  class="pricing-content list-unstyled">
                            @foreach($topic->products[0]->groups as $group)
                                <li class="bg-color">
                                    <i class="fa {{$group->icon}}"></i>{{$group->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @foreach($topic->products as $product)
                <div class="col-md-2 col-sm-6 block">
                    <div class="pricing">
                        <div class="pricing-head">
                            <h3>
                                {{$product->name}}
                            </h3>
                            <h4 class="price">
                                <img src="/{{$product->image}}" height="45" width="45"/>
                            </h4>
                        </div>
                        <ul class="pricing-content list-unstyled ">
                            @foreach($product->groups as $group)
                                <li class="bg-color">
                                    {{$group->pivot->value}}
                                    <span class="hidden-md hidden-lg">{{$group->name}}</span>

                                </li>
                            @endforeach
                        </ul>
                        <div class="btn-group btn-group-justified">
                            <button type="button" class="btn-u btn-block dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart"></i>
                                Sign Up
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">14 day Free Trial </a></li>
                                <li><a href="#">$ 9.48 One Month</a></li>
                                <li><a href="#">$ 50.00 Six Month</a></li>
                                <li><a href="#">$ 99.99 One Year</a></li>
                            </ul>
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
