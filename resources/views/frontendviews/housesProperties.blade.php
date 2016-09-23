@extends('layouts.frontend-app')
@foreach($houses as $home)
@section('title')
    GY-Housing-{{$home->title}}
@endsection
@section('content')

    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="{{ URL('/images/house').'/'.$home->image_path }}" width="447" height="287">

                            </li>

                        </ul>
                    </div>

                    @include('frontendviews.includes.booking_form')
                </div>
                <div class="col-md-6">
                    <div class="pro-description">
                        <p class="product-id">property id: {{$home->id}}</p>
                        <h3 class="small-head">{{$home->title}}</h3>
                        <P class="product-desp">{!! $home->description !!}</P>

                        <h3 class="product-price">rs. {{$home->price}}</h3>
                        <h4>Other Details</h4>
                        <table class="table table-bordered table-hover table-striped table-responsive">
                            <tr>
                                <th>Storied</th>
                                <td> {{ $home->storied }}</td>
                            </tr>
                            <tr>
                                <th>Space</th>
                                <td> {{ $home->space }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td> {{ $home->location }}</td>
                            </tr>
                            <tr>
                                <th>Parking Available</th>
                                <td> {{ $home->parking }}</td>
                            </tr>
                            <tr>
                                <th>No. of Rooms</th>
                                <td> {{ $home->number_of_rooms }}</td>
                            </tr>
                            <tr>
                                <th>No. of Living Rooms</th>
                                <td> {{ $home->number_of_living_room }}</td>
                            </tr>
                            <tr>
                                <th>No. of Kitchen</th>
                                <td> {{ $home->number_of_kitchen }}</td>
                            </tr>
                            <tr>
                                <th>No. of Toilet</th>
                                <td> {{ $home->number_of_toilet }}</td>
                            </tr>
                            <tr>
                                <th>No. of Bathroom</th>
                                <td> {{ $home->number_of_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>No. of Attached Bathroom</th>
                                <td> {{ $home->number_of_attached_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>Access to Road</th>
                                <td> {{ $home->access_to_road }}</td>
                            </tr>
                            <tr>
                                <th>Available for</th>
                                <td> {{ $home->bsr }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @endforeach

@endsection