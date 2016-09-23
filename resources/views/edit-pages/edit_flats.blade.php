@extends('layouts.app')
@section('title')
    Edit Flats
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Flats Information
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
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


                                <form action="{{ route('flat.update') }}" method="post" enctype="multipart/form-data">
                                    @foreach($flats as $flat)

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" name="title" id="title"
                                                   value="{{ $flat->title }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="space">Space</label>
                                            <input class="form-control" type="text" name="space" id="space"
                                                   value="{{ $flat->space }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="10" name="description"
                                                      id="description">{!!  $flat->description !!}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input class="form-control" type="text" name="location" id="location"
                                                   value="{{ $flat->location }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="parking">Parking</label>
                                            <input class="form-control" type="text" name="parking" id="parking"
                                                   value="{{ $flat->parking }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_rooms">No. of Rooms</label>
                                            <input class="form-control" type="text" name="number_of_rooms"
                                                   id="number_of_rooms"
                                                   value="{{ $flat->number_of_rooms }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_living_rooms">No.of Living Rooms</label>
                                            <input class="form-control" type="text" name="number_of_living_rooms"
                                                   id="number_of_living_rooms"
                                                   value="{{ $flat->number_of_living_room }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_kitchen">No.of Kitchens</label>
                                            <input class="form-control" type="text" name="number_of_kitchen"
                                                   id="number_of_kitchen"
                                                   value="{{ $flat->number_of_kitchen }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_toilet ">No.of Toilets</label>
                                            <input class="form-control" type="text" name="number_of_toilet"
                                                   id="number_of_toilet"
                                                   value="{{ $flat->number_of_toilet }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_bathroom ">No.of Bathrooms</label>
                                            <input class="form-control" type="text" name="number_of_bathroom"
                                                   id="number_of_bathroom"
                                                   value="{{ $flat->number_of_bathroom }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="number_of_attached_bathroom ">No.of Attached Bathrooms</label>
                                            <input class="form-control" type="text" name="number_of_attached_bathroom"
                                                   id="number_of_attached_bathroom "
                                                   value="{{ $flat->number_of_attached_bathroom  }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="text" name="price"
                                                   id="price"
                                                   value="{{ $flat->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="access_to_road">Road Access</label>
                                            <div>
                                                <select class="form-control" name="access_to_road" id="access_to_road">
                                                    <option value="yes"
                                                            @if ($flat->access_to_road=="yes")
                                                            selected="selected"
                                                            @endif>Available
                                                    </option>
                                                    <option value="no"
                                                            @if ($flat->access_to_road=="no")
                                                            selected="selected"
                                                            @endif>Not available
                                                    </option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="parking">Parking</label>
                                            <div>
                                                <select class="form-control" name="parking" id="parking">
                                                    <option value="yes"
                                                            @if ($flat->parking=="yes")
                                                            selected="selected"
                                                            @endif>Available
                                                    </option>
                                                    <option value="no"
                                                            @if ($flat->parking=="no")
                                                            selected="selected"
                                                            @endif>Not available
                                                    </option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <div>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="publish" @if ($flat->status=="publish")
                                                    selected="selected"
                                                            @endif>Publish
                                                    </option>
                                                    <option value="trash" @if ($flat->status=="trash")
                                                    selected="selected"
                                                            @endif>Trash
                                                    </option>
                                                    <option value="draft" @if ($flat->status=="draft")
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
                                            <img src="{{ URL('/images/flat').'/'.$flat->image_path }}" class="img-responsive image-box-img">
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="flat_id" value="{{$flat->id}}">
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
    </div>
    <!-- /.row -->
@endsection