@extends('layouts.frontend-app')

@section('title')
    GY-Housing- {{$plots->plot}}
@endsection


@section('content')

    <section class="booking">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="ploding-img">
                        <h2>{{$plots->plot}}</h2>
                        <h3 style="text-align: right">{{$plots->location}}</h3>
                        <img src="{{ URL('/images/plotings').'/'.$plots->image_link }}" alt="" class="img-responsive">
                        {!! $plots->description !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="list-section">
                        <h2 class="text-center heading">List of Land</h2>
                        @foreach ($plots->ploting_details as $plot)
                            <ul class="nav nav-tabs">
                                <li class="first">
                                    <p>{{$plot->plot}}</p>
                                    <p>{{$plot->location}}</p>
                                    <p>{{$plot->price}}</p>
                                </li>
                                @if($plot->plot_status=='booked')
                                    <li class="status booked">Booked</li>

                                @elseif($plot->plot_status=='sold')
                                    <li class="status">Sold</li>
                                @else
                                    <li class="status available">Available</li>
                                @endif

                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    @if(Session::has('success'))

        <div class="alert alert-success">
            <strong>Congratulation!</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <div class="booking-section">
        <div class="row">
            <div class="col-sm-12">
                <div class="book-form">
                    <h2>Booking Form</h2>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{route('bookings')}}" method="POST">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Select a plot<span> *</span></label>
                            <div class="col-sm-12">
                                <select name="plot" id="plot" class="from-control selectpicker">
                                    <option value="0">Select</option>
                                    @foreach ($plots->ploting_details as  $bplots)
                                        <option value="{{ $bplots->id }}">{{ $bplots->plot }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('full name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-12 control-label">Full Name<span> *</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fname" name="fullname"
                                       placeholder="Full Name" value="{{ Request::old('fullname') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact number') ? ' has-error' : '' }}">
                            <label for="contact" class="col-sm-12 control-label">Contact Number<span> *</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="mobile" name="contact"
                                       placeholder="Contact Number" value="{{ Request::old('contact') }}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="contact" class="col-sm-12 control-label">Address<span> *</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Your Address" value="{{ Request::old('address') }}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="property_type" id="property_type"
                               value="{{'ploting'}}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default custom-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--<div class="col-sm-5">--}}
            {{--<p>Thank you, for booking. We will contact you soon.</p>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection