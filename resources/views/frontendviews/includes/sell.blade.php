@extends('layouts.frontend-app')
@section('title')
    GY-Housing
@endsection

@section('content')

    @if(Session::has('message'))

        <div class="alert alert-success">
            <strong>Congratulation!</strong> {!! Session::get('message') !!}
        </div>
    @endif
    <div class="booking-section">
        <div class="row">
            <div class="col-sm-12">
                <div class="book-form">
                    <h2>Want to Sell??</h2> <br/>
                    <h2>Other May Be Waiting This??</h2>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <form class="form-horizontal" action="{{route('sell.post')}}" method="POST"
                              enctype="multipart/form-data">

                            <div class="form-group{{ $errors->has('full name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-12 control-label">Full Name<span> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="fname" name="fullname"
                                           placeholder="Full Name" required="" value="{{ Request::old('fullname') }}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description"
                                       class="col-sm-12 control-label">Description<span> *</span></label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" rows="4" cols="20" placeholder="Property Description"
                                              name="description" id="description" required=" "></textarea>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('contact number') ? ' has-error' : '' }}">
                                <label for="contact" class="col-sm-12 control-label">Contact
                                    Number<span> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="mobile" name="contact"
                                           placeholder="Contact Number" required=""
                                           value="{{ Request::old('contact') }}">
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="contact" class="col-sm-12 control-label">Address<span> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Your Address" required="" value="{{ Request::old('address') }}">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-sm-12 control-label">Price(Nrs)<span> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="address" name="price"
                                           placeholder="Price" required="" value="{{ Request::old('price') }}">
                                </div>
                            </div>

                            <div class="form-group" class="col-sm-4">
                                <label for="image" class="col-sm-12 control-label">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" required="">
                                <small class="text-muted">Choose the Image
                                </small>
                            </div>

                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-default custom-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-5">--}}
            {{--<p>Thank you, for booking. We will contact you soon.</p>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection