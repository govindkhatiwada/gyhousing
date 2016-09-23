@extends('layouts.app')
@section('title')
    Plotings Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Plotings Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('ploting_details') }}">Back to plotting details</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Plotings Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Plotings</h2>

                        <a href="{{ route('add_ploting.details') }}">
                            <button type="button" class="btn btn-info">New Entry</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Plot Title</th>
                                    <th>Area</th>
                                    <th>Price</th>
                                    <th>Plot</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($ploting as $plot)

                                    <tr class="active">
                                        <td>{{ $plot->plot }}</td>
                                        <td>{{ $plot->area }}</td>
                                        <td>{{ $plot->price }}</td>
                                        <td>{{$plot->plotings->plot}}</td>
                                        <td>{{ $plot->status }}</td>
                                        <td>{{ $plot->created_at }}</td>
                                        <td>{{ $plot->updated_at }}</td>
                                        <td><a href="{{ route('edit.ploting', ['ploting_id'=>$plot->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.ploting', ['ploting_id'=>$plot->id]) }}">Delete</a>
                                        </td>
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