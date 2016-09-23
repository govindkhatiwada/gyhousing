@extends('layouts.app')
@section('title')
    Lands
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Lands Details
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('lands') }}">Back to Lands</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> New Entry
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{ route('create_lands') }}" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control" type="text" name="title" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                                  rows="10"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <input class="form-control" type="text" name="area" id="area">
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input class="form-control" type="text" name="location"
                                               id="location">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input class="form-control" type="text" name="price"
                                               id="price">
                                    </div>

                                    <div class="form-group">
                                        <label for="access_to_road">Access to road</label>
                                        <div>
                                            <select name="access_to_road" id="access_to_road">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
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
                                        <small class="text-muted">Choose the land image
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