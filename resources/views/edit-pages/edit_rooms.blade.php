@extends('layouts.app')
@section('title')
    Edit Rooms
@endsection

@section('content')
    <div class="container">
        @include('includes.side_nav')
        @include('includes.message')

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Rooms Information
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('room_details') }}">Back to Rooms</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Edit the information
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{ route('room.update') }}" method="post" enctype="multipart/form-data">
                                    @foreach($rooms as $room)

                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                   value="{{ $room->title }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="text" name="price" id="price"
                                                   value="{{ $room->price }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input class="form-control" type="text" name="location" id="location"
                                                   value="{{ $room->location }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <div>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="publish" @if ($room->status=="publish")
                                                    selected="selected"
                                                            @endif>Publish
                                                    </option>
                                                    <option value="trash" @if ($room->status=="trash")
                                                    selected="selected"
                                                            @endif>Trash
                                                    </option>
                                                    <option value="draft" @if ($room->status=="draft")
                                                    selected="selected"
                                                            @endif>Draft
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            <small class="text-muted">Choose the banner image
                                            </small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <img src="{{ URL('/images/room').'/'.$room->image_path }}" class="img-responsive image-box-img">
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="room_id" value="{{$room->id}}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">

                                    @endforeach
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection