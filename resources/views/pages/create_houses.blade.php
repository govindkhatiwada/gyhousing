@extends('layouts.app')
@section('title')
    Houses
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Houses Details
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> New Houses Entry
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{ route('create_houses') }}" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input class="form-control" type="text" name="title" id="title">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                                  rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="storied">Storied</label>
                                        <input class="form-control" type="text" name="storied" id="storied">
                                    </div>

                                    <div class="form-group">
                                        <label for="space">Space</label>
                                        <input class="form-control" type="text" name="space" id="space">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input class="form-control" type="text" name="price" id="price">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_rooms">Number of rooms</label>
                                        <input class="form-control" type="text" name="number_of_rooms"
                                               id="number_of_rooms">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_living_rooms">Number of Living Rooms</label>
                                        <input class="form-control" type="text" name="number_of_living_room"
                                               id="number_of_living_rooms">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_bathroom">Number of Bathrooms</label>
                                        <input class="form-control" type="text" name="number_of_bathroom"
                                               id="number_of_bathroom">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_attached_bathroom">Number of Attached Bathrooms</label>
                                        <input class="form-control" type="text" name="number_of_attached_bathroom"
                                               id="number_of_attached_bathroom">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_toilets">Number of Toilets</label>
                                        <input class="form-control" type="text" name="number_of_toilet"
                                               id="number_of_toilets">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_kitchen">Number of Kitchens</label>
                                        <input class="form-control" type="text" name="number_of_kitchen"
                                               id="number_of_kitchen">
                                    </div>


                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input class="form-control" type="text" name="location"
                                               id="location">
                                    </div>

                                    <div class="form-group">
                                        <label for="parking">Access to road</label>
                                        <div>
                                            <select name="access_to_road" id="access_to_road">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="parking">Parking</label>
                                        <div>
                                            <select name="parking" id="parking">
                                                <option value="yes">Available</option>
                                                <option value="no">Not available</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div>
                                            <select name="status" id="status">
                                                <option value="publish">Publish</option>
                                                <option value="trash">Trash</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        <small class="text-muted">Choose the House image
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection