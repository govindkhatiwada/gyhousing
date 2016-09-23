@extends('layouts.app')
@section('title')
    Edit land
@endsection
@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Land Information
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i><a href="{{ route('lands') }}"> Back to Land Lists</a>
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


                                <form action="{{ route('land.update') }}" method="post"
                                      enctype="multipart/form-data">
                                    @foreach($land as $lands)

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" name="title" id="title"
                                                   value="{{ $lands->title }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="space">Area</label>
                                            <input class="form-control" type="text" name="area" id="area"
                                                   value="{{ $lands->area }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="10" name="description"
                                                      id="description">{!! $lands->description !!}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input class="form-control" type="text" name="location"
                                                   id="location"
                                                   value="{{ $lands->location }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="text" name="price"
                                                   id="price"
                                                   value="{{ $lands->price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="access_to_road">Road Access</label>
                                            <div>
                                                <select class="form-control" name="access_to_road" id="access_to_road">
                                                    <option value="yes"
                                                            @if ($lands->access_to_road=="yes")
                                                            selected="selected"
                                                            @endif>Available
                                                    </option>
                                                    <option value="no"
                                                            @if ($lands->access_to_road=="no")
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
                                                    <option value="publish" @if ($lands->status=="publish")
                                                    selected="selected"
                                                            @endif>Publish
                                                    </option>
                                                    <option value="trash" @if ($lands->status=="trash")
                                                    selected="selected"
                                                            @endif>Trash
                                                    </option>
                                                    <option value="draft" @if ($lands->status=="draft")
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
                                            <img src="{{ URL('/images/land').'/'.$lands->image_path }}" class="img-responsive image-box-img">
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="land_id" value="{{$lands->id}}">
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