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

                    <div class="form-group{{ $errors->has('full name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-12 control-label">Full Name<span> *</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fname" name="fullname" placeholder="Full Name"
                                   value="{{ Request::old('fullname') }}">
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

                    <input type="hidden" class="form-control" name="plot" id="plot" value="{{$prop_id}}">
                    <input type="hidden" class="form-control" name="property_type" id="plot" value="{{$prop_type}}">
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