@extends('layouts.app')
@section('title')
    Edit Plots
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')

    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Plots Information
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('plots') }}">Back to Plots</a>
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


                                <form action="{{ route('ploting.update') }}" method="post"
                                      enctype="multipart/form-data">
                                    @foreach($plots as $plot)

                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                   value="{{ $plot->plot }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="area">Area</label>
                                            <input class="form-control" type="text" name="area" id="area"
                                                   value="{{ $plot->area }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="text" name="price" id="price"
                                                   value="{{ $plot->price }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="ploting_status">Plot Status</label>
                                            <div>
                                                <select class="form-control" name="plot_status" id="plot_status" >
                                                    <option value="available" @if ($plot->plot_status=="available")
                                                    selected="selected"
                                                            @endif>Available
                                                    </option>
                                                    <option value="booked" @if ($plot->plot_status=="booked")
                                                    selected="selected"
                                                            @endif>Booked
                                                    </option>
                                                    <option value="sold" @if ($plot->plot_status=="sold")
                                                    selected="selected"
                                                            @endif>Sold
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <div>
                                                <select class="form-control" name="status" id="status" >
                                                    <option value="publish" @if ($plot->status=="publish")
                                                    selected="selected"
                                                            @endif>Publish
                                                    </option>
                                                    <option value="trash" @if ($plot->status=="trash")
                                                    selected="selected"
                                                            @endif>Trash
                                                    </option>
                                                    <option value="draft" @if ($plot->status=="draft")
                                                    selected="selected"
                                                            @endif>Draft
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="plot_id" value="{{$plot->id}}">
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