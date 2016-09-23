@extends('layouts.frontend-app')
@section('title')
    GY-Housing
@endsection
@section('content')
    <section class="category-listing">
        <div class="container">
            <div class="col-md-12">
                <div class="cate-banner">
                    <img src="images/banner.jpg">
                    <div class="cat-overlay"></div>
                    <div class="banner-detail">
                        <h3 class="bann-head">Consectetuer adipiscing elit</h3>
                        <p class="bann-msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo </p>
                    </div>
                </div>

                <div class="after-filter">
                    @foreach($rooms as $room)
                        <a href="{{route('property.room', ['id'=>$room->id])}}">
                            <div class="col-md-4">
                                <div class="property">
                                    <div class="property-img">
                                        <img src="{{url('images/rooms/'.$room->image_path)}}" height="180">
                                        <div class="triangle-<?php if ($room->bsr == 'sale') echo 'list';
                                        else echo 'list1'?>">
                                            <div class="for-what">
                                                <p><?php if ($room->bsr == 'sale') echo 'For sale';
                                                    else echo 'For Rent';?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="area">
                                        <p class="area-sq">{{ $room->space }}</p>
                                    </div>
                                    <div class="small-desp">
                                        <h3 class="small-head">{{ $room->title }}</h3>
                                        <p class="small-add"><i class="fa fa-map-marker"
                                                                aria-hidden="true"></i> {{ $room->location }}</p>
                                        <p class="small-detail">{!! \Illuminate\Support\Str::words($room->description, 20,'...')  !!}</p>
                                        <p class="price">NPR {{ $room->price }}</p>
                                        <p class="share"><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            <a href="#"><i
                                                        class="fa fa-heart" aria-hidden="true"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
            <center>{{$rooms->links()}}</center>
        </div>
    </section>
@endsection
