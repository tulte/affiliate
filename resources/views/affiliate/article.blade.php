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

    <div class="container content-sm">
        <div class="row">
            <div class="col-md-9 md-margin-bottom-50">

                @foreach($topic->articles as $article)
                <div class="row margin-bottom-50">
                    <div class="col-sm-4 sm-margin-bottom-20">
                        <img class="img-responsive" src="/{{$article->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="blog-grid">
                            <h3><a href="blog_single.html">{{$article->header}}</a></h3>
                            <ul class="blog-grid-info">
                                <li>{{ date('d.m.Y', strtotime($article->created_at)) }}</li>
                            </ul>
                            <p>{!! $article->text !!}</p>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection
