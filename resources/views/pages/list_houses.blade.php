@extends('layouts.app')
@section('title')
    Houses Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Houses Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Houses Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">


                        <a href="{{ route('add_house') }}">
                            <button type="button" class="btn btn-info">Add New House</button>
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

                                @foreach($houses as $house)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/house').'/'.$house->image_path }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $house->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($house->description, 20,'...')  !!}</td>
                                        <td>{{ $house->space }}</td>
                                        <td>{{ $house->location }}</td>
                                        <td>{{ $house->parking }}</td>
                                        <td>{{ $house->number_of_rooms }}</td>
                                        <td>{{ $house->number_of_living_room }}</td>
                                        <td>{{ $house->number_of_kitchen }}</td>
                                        <td>{{ $house->number_of_toilet }}</td>
                                        <td>{{ $house->number_of_bathroom }}</td>
                                        <td>{{ $house->number_of_attached_bathroom }}</td>
                                        <td>{{ $house->price }}</td>
                                        <td>{{ $house->access_to_road }}</td>
                                        <td>{{ $house->status }}</td>
                                        <td>{{ $house->created_at }}</td>
                                        <td>{{ $house->updated_at }}</td>
                                        <td><a href="{{ route('edit.house', ['house_id'=>$house->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete.house', ['house_id'=>$house->id]) }}">Delete</a>
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