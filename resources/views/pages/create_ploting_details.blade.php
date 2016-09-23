@extends('layouts.app')
@section('title')
    Plotings
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Ploting Details
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('ploting_details') }}">Back to Plotings</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> New Ploting Entry
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{ route('create_ploting') }}" method="post"
                                      enctype="multipart/form-data">
                                    <!-- parent selection -->
                                    <div class="form-group">

                                        <label for="ploting_id" class="col-sm-2 control-label">Select Ploting</label>

                                        <select name="ploting_id" id="ploting_id" class="form-control">
                                            <option value="0">Select</option>

                                            @foreach($plots as $key=>$page)

                                                <option value="{{ $key }}">{{ $page }} </option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Plot Title</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <input class="form-control" type="text" name="area"
                                               id="area">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input class="form-control" type="text" name="price"
                                               id="price">
                                    </div>

                                    <div class="form-group">
                                        <label for="ploting_status">Plot Status</label>
                                        <div>
                                            <select name="plot_status" id="plot_status" class="form-control">
                                                <option value="available">Available</option>
                                                <option value="booked">Booked</option>
                                                <option value="sold">Sold</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div>
                                            <select name="status" id="status" class="form-control">
                                                <option value="publish">Publish</option>
                                                <option value="trash">Trash</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>


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