@extends('layouts.master')


@section('content')


        <!--=== End Header ===-->

        <!--=== Content Part ===-->
        <div class="container content">

            <div class="heading heading-v1 margin-bottom-20">
                <h2>{{$topic->name}}</h2>
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
                                    <i class="fa fa-users"></i>{{$group->name}}
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
                                <img src="{{$product->image}}" height="45" width="45"/>
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



@endsection
