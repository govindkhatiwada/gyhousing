@extends('layouts.app')
@section('title')
    Booking Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Booking Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Bookings
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">


                        {{--<a href="{{ route('add_house') }}">--}}
                        {{--<button type="button" class="btn btn-info">Add New House</button>--}}
                        {{--</a>--}}

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Booking Date</th>
                                    <th>Property Type</th>
                                    <th>Plot Id</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($books as $book)

                                    <tr class="active">
                                        <td>{{ $book->full_name }}</td>
                                        <td>{{ $book->contact }}</td>
                                        <td>{{ $book->address }}</td>
                                        <td>{{ $book->created_at }}</td>
                                        <td>{{ $book->property_type }}</td>
                                        <td>{{ $book->booking_number }}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection