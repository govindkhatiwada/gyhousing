@extends('layouts.frontend-app')
@foreach($flat as $flats)
@section('title')
    GY-Housing-{{$flats->title}}
@endsection
@section('content')

    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="{{ URL('/images/flat').'/'.$flats->image_path }}" width="447" height="287">

                            </li>

                        </ul>
                    </div>
                    @include('frontendviews.includes.booking_form')
                </div>
                <div class="col-md-6">
                    <div class="pro-description">
                        <p class="product-id">property id: {{$flats->id}}</p>
                        <h3 class="small-head">{{$flats->title}}</h3>
                        <P class="product-desp">{!! $flats->description !!}</P>

                        <h3 class="product-price">rs. {{$flats->price}}</h3>
                        <h4>Other Details</h4>
                        <table class="table table-bordered table-hover table-striped table-responsive">
                            <tr>
                                <th>Storied</th>
                                <td> {{ $flats->storied }}</td>
                            </tr>
                            <tr>
                                <th>Space</th>
                                <td> {{ $flats->space }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td> {{ $flats->location }}</td>
                            </tr>
                            <tr>
                                <th>Parking Available</th>
                                <td> {{ $flats->parking }}</td>
                            </tr>
                            <tr>
                                <th>No. of Rooms</th>
                                <td> {{ $flats->number_of_rooms }}</td>
                            </tr>
                            <tr>
                                <th>No. of Living Rooms</th>
                                <td> {{ $flats->number_of_living_room }}</td>
                            </tr>
                            <tr>
                                <th>No. of Kitchen</th>
                                <td> {{ $flats->number_of_kitchen }}</td>
                            </tr>
                            <tr>
                                <th>No. of Toilet</th>
                                <td> {{ $flats->number_of_toilet }}</td>
                            </tr>
                            <tr>
                                <th>No. of Bathroom</th>
                                <td> {{ $flats->number_of_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>No. of Attached Bathroom</th>
                                <td> {{ $flats->number_of_attached_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>Access to Road</th>
                                <td> {{ $flats->access_to_road }}</td>
                            </tr>
                            <tr>
                                <th>Available for</th>
                                <td> {{ $flats->bsr }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endforeach
@endsection