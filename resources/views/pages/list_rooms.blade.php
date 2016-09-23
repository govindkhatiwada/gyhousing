@extends('layouts.app')
@section('title')
    Rooms Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Rooms Records
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('room_details') }}">Back to rooms details</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Rooms Available
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Rooms</h2>

                        <a href="{{ route('add_rooms') }}">
                            <button type="button" class="btn btn-info">New Entry</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>RoomTitle</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($rooms as $room)

                                    <tr class="active">
                                        <td>{{ $room->title }}</td>
                                        <td>{{ $room->location }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>{{ $room->status }}</td>
                                        <td>{{ $room->created_at }}</td>
                                        <td>{{ $room->updated_at }}</td>
                                        <td><a href="{{ route('edit.rooms', ['room_id'=>$room->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete.rooms', ['room_id'=>$room->id]) }}">Delete</a>
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