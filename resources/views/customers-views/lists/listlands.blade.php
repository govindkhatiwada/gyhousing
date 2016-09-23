@extends('layouts.app')
@section('title')
    Lands List
@endsection

@section('content')
    <div class="container">
    @include('customers-views.includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Lands Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Lands Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Flats</h2>

                        <a href="{{ route('add_land') }}">
                            <button type="button" class="btn btn-info">Add New Land</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Area</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Road Access</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach(App\lands::where('user_id',Auth::user()->id)->get() as $land)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/land').'/'.$land->image_path }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $land->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($land->description, 20,'...')  !!}</td>
                                        <td>{{ $land->area }}</td>
                                        <td>{{ $land->location }}</td>
                                        <td>{{ $land->price }}</td>
                                        <td>{{ $land->access_to_road }}</td>
                                        <td>{{ $land->status }}</td>
                                        <td>{{ $land->created_at }}</td>
                                        <td>{{ $land->updated_at }}</td>
                                        <td><a href="{{ route('edit.land', ['land_id'=>$land->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete.land', ['land_id'=>$land->id]) }}">Delete</a></td>
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