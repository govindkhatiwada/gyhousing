@extends('layouts.frontend-app')

@section('title')
    GY-Housing
@endsection

@section('content')
    <div class="container">
        <div class="after-filter">
            @if($result->count())
                @foreach($result as $results)
                    <a href="{{route('property.houses', ['id'=>$results->id])}}">
                        <div class="col-md-4">
                            <div class="property">
                                <div class="property-img">
                                    <img src="{{url('images/house/'.$results->image_path)}}" height="180">
                                    <div class="triangle-<?php if ($results->bsr == 'sale') echo 'list';
                                    else echo 'list1'?>">
                                        <div class="for-what">
                                            <p><?php if ($results->bsr == 'sale') echo 'For sale';
                                                else echo 'For Rent';?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="area">
                                    <p class="area-sq">{{ $results->space }}</p>
                                </div>
                                <div class="small-desp">
                                    <h3 class="small-head">{{ $results->title }}</h3>
                                    <p class="small-add"><i class="fa fa-map-marker"
                                                            aria-hidden="true"></i> {{ $results->location }}</p>
                                    <p class="small-detail">{!! \Illuminate\Support\Str::words($results->description, 20,'...')  !!}</p>
                                    <p class="price">NPR {{ $results->price }}</p>
                                    <p class="share"><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        <a href="#"><i
                                                    class="fa fa-heart" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            @else
                <p>Sorry result not found</p>
            @endif
        </div>
    </div>
@endsection