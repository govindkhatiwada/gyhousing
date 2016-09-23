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
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Plotings Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Plotings</h2>

                        <a href="{{ route('add_plots') }}">
                            <button type="button" class="btn btn-info">Add New Plots</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Plot Title</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($plots as $plot)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/plotings').'/'.$plot->image_link }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $plot->plot }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($plot->description, 20,'...')  !!}</td>
                                        <td>{{ $plot->location }}</td>
                                        <td>{{ $plot->status }}</td>
                                        <td>{{ $plot->created_at }}</td>
                                        <td>{{ $plot->updated_at }}</td>
                                        <td><a href="{{ route('edit.plot', ['plot_id'=>$plot->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete.plot', ['plot_id'=>$plot->id]) }}">Delete</a></td>
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