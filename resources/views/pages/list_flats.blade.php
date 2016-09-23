@extends('layouts.app')
@section('title')
    Flat Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Flats Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Flats Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Flats</h2>

                        <a href="{{ route('add_flats') }}">
                            <button type="button" class="btn btn-info">Add New Flats</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Space</th>
                                    <th>Location</th>
                                    <th>Parking</th>
                                    <th>No.of Rooms</th>
                                    <th>No.of Living Rooms</th>
                                    <th>No.of Kitchens</th>
                                    <th>No.of Toilets</th>
                                    <th>No.of Bathrooms</th>
                                    <th>No.of Attached Bathrooms</th>
                                    <th>Price</th>
                                    <th>Road Access</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($flats as $flat)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/flat').'/'.$flat->image_path }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $flat->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($flat->description, 20,'...')  !!}</td>
                                        <td>{{ $flat->space }}</td>
                                        <td>{{ $flat->location }}</td>
                                        <td>{{ $flat->parking }}</td>
                                        <td>{{ $flat->number_of_rooms }}</td>
                                        <td>{{ $flat->number_of_living_rooms }}</td>
                                        <td>{{ $flat->number_of_kitchen }}</td>
                                        <td>{{ $flat->number_of_toilet }}</td>
                                        <td>{{ $flat->number_of_bathroom }}</td>
                                        <td>{{ $flat->number_of_attached_bathroom }}</td>
                                        <td>{{ $flat->price }}</td>
                                        <td>{{ $flat->access_to_road }}</td>
                                        <td>{{ $flat->status }}</td>
                                        <td>{{ $flat->created_at }}</td>
                                        <td>{{ $flat->updated_at }}</td>
                                        <td><a href="{{ route('edit.flat', ['flat_id'=>$flat->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete.flat', ['flat_id'=>$flat->id]) }}">Delete</a></td>
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