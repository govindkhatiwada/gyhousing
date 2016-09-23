@extends('layouts.app')

@section('content')
    <div class="container">
        @include('customers-views.includes.side_nav')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        GYHousing.com
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
