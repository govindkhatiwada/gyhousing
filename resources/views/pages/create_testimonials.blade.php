@extends('layouts.app')
@section('title')
    Testimonials
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create Testimonials
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('testimonials') }}">Testimonial</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Post the view
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{ route('create.testimonials') }}" method="post"
                                      enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" rows="10" name="message"
                                                  id="description"></textarea>
                                    </div>

                                    <div class="form-group">

                                        <div>
                                            <label for="image">Picture</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            <small class="text-muted">Choose the client Image
                                            </small>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div>
                                            {{--<style>--}}
                                            {{--#status {--}}
                                            {{--margin-bottom: 12px;--}}
                                            {{--}--}}
                                            {{--</style>--}}
                                            <label for="status">Status</label>
                                            <div>
                                                <select name="status" id="status">
                                                    <option value="publish">Publish</option>
                                                    <option value="trash">Trash</option>
                                                    <option value="draft">Draft</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div>

                                            <button type="submit" id="submit" class="btn btn-primary">Comment</button>
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