@extends('layouts.app')
@section('title')
    Banners
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Banner
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('banners') }}">Back to Banners</a>
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


                                <form action="{{ route('create_banners') }}" method="post"
                                      enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name">Banner Title</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input class="form-control" type="text" name="link" id="link">
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
                                        <small class="text-muted">Choose the banner image
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