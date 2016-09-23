@extends('layouts.frontend-app')

@section('title')
    GY-Housing
@endsection
@section('slider')
    @include('frontendviews.includes.slider')

@endsection
@section('content')

    <section class="explore-tabs">
        <div class="container">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">
                        <div class="exp-btn text-center">
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <h3>Financial support</h3>
                        </div>
                    </a></li>
                <li><a data-toggle="tab" href="#menu1">
                        <div class="exp-btn text-center">
                            <i class="fa fa-building" aria-hidden="true"></i>
                            <h3>asset management</h3>
                        </div>
                    </a></li>
                <li><a data-toggle="tab" href="#menu2">
                        <div class="exp-btn text-center">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                            <h3>industrial</h3>
                        </div>
                    </a></li>
                <li><a data-toggle="tab" href="#menu3">
                        <div class="exp-btn text-center">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h3>residental</h3>
                        </div>
                    </a></li>
            </ul>

            <div class="tab-content">
                @foreach(App\pages::all() as $page)
                    @if($page->id==1)
                        <div id="home" class="tab-pane fade in active">

                            <div class="exp-desp">
                                <div class="col-md-8">

                                    <h3 class="small-head">{{ $page->title }}</h3>
                                    <p>{{ $page->description }}</p>
                                    <a href="#">explore more</a>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('images/pages/finance.jpg')}}">

                                </div>
                            </div>

                        </div>
                    @endif
                    @if($page->id==2)
                        <div id="menu1" class="tab-pane fade">

                            <div class="exp-desp">
                                <div class="col-md-4">
                                    <img src="{{url('images/pages/asset.jpg')}}">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="small-head">{{ $page->title }}</h3>
                                    <p>{{ $page->description }}</p>
                                    <a href="#">explore more</a>
                                </div>

                            </div>

                        </div>
                    @endif
                    @if($page->id==3)
                        <div id="menu2" class="tab-pane fade">

                            <div class="exp-desp">
                                <div class="col-md-8">
                                    <h3 class="small-head">{{ $page->title }}</h3>
                                    <p>{{ $page->description }}</p>
                                    <a href="#">explore more</a>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('images/pages/industry.jpg')}}">
                                </div>
                            </div>

                        </div>
                    @endif
                    @if($page->id==4)
                        <div id="menu3" class="tab-pane fade">

                            <div class="exp-desp">
                                <div class="col-md-4">
                                    <img src="{{url('images/pages/residential.jpg')}}">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="small-head">{{ $page->title }}</h3>
                                    <p>{{ $page->description }}</p>
                                    <a href="#">explore more</a>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="property-list">
        <div class="container">

            <h2 class="heading">New house property list</h2>
            @foreach(App\houses::all() as $house)
                <a href="{{route('property.houses', ['id'=>$house->id])}}">
                    <div class="col-md-4 col-sm-6">
                        <div class="property">
                            <div class="property-img">
                                <img src="{{url('images/house/'.$house->image_path)}}" height="180">
                                <div class="triangle-<?php if ($house->bsr == 'sale') echo 'list';
                                else echo 'list1'?>">
                                    <div class="for-what">
                                        <p><?php if ($house->bsr == 'sale') echo 'For sale';
                                            else echo 'For Rent';?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="area">
                                <p class="area-sq">{{ $house->space }}</p>
                                <p class="bed-room">{{ $house->number_of_rooms }} Rooms</p>
                                <p class="bath-rooms">{{ $house->number_of_bathroom }} Bathrooms</p>
                            </div>
                            <div class="small-desp">
                                <h3 class="small-head">{{ $house->title }}</h3>
                                <p class="small-add"><i class="fa fa-map-marker"
                                                        aria-hidden="true"></i> {{ $house->location }}</p>
                                <p class="small-detail">{!! \Illuminate\Support\Str::words($house->description, 20,'...')  !!}</p>
                                <p class="price">NPR {{ $house->price }}</p>
                                <p class="share"><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a> <a
                                            href="#"><i
                                                class="fa fa-heart" aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2 class="text-center heading">What people say About us</h2>

            <div id="owl-testi" class="owl-carousel owl-theme">
                @foreach(App\testimonials::all() as $test)
                    <div class="item">
                        <div class="testi">
                            <div class="testi-img">
                                <img src="{{url('images/test/'.$test->image_link)}}">
                            </div>
                            <div class="testi-text">
                                <p>{!! $test->message !!}</p>
                                <h4 class="name">{{ $test->name }}</h4>

                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection