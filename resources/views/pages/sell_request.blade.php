@extends('layouts.app')
@section('title')
    Property Sale Request
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sell Request Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Request for Property Sale
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Posted Date</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($sales as $sale)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/sell').'/'.$sale->image_path }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $sale->full_name }}</td>
                                        <td>{{ $sale->contact }}</td>
                                        <td>{{ $sale->address }}</td>
                                        <td>{{ $sale->description }}</td>
                                        <td>{{ $sale->created_at }}</td>


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