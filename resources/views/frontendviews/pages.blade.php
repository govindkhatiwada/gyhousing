@extends('layouts.frontend-app')
@foreach($pages as $page)
@section('title')
    {{$page->title}}
@endsection

@section('content')

    <section class="banner">
        <div class="banner-img">
            <img src="{{url('/images/banner.jpg')}}">
            <div class="my-overlay"></div>
        </div>
        <div class="container">
            <h2 class="heading">{{$page->title}}</h2>
        </div>
    </section>

    <section class="about-us">
        <div class="container">
            <p class="saying">
                "We equip customers with high quality products and dependable information they can use and pass down. We
                empower people to get outside, reconnect with their hands and nature, and in doing so, embark on a life
                of great adventure."
            </p>

            <div class="story">
                {!! $page->description !!}

                <div class="clearfix"></div>
            </div>

        </div>
    </section>

@endsection
@endforeach