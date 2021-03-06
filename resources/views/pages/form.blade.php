@extends('layouts.app')
@section('title')
    Add Pages
@endsection

@section('content')
    <div class="container">
        @include('includes.side_nav')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Pages
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add pages</h2>

                        <!-- input field for title, description, status And parent -->

                        <form class="form-horizontal" action="{{ route('page-store') }}" method="post"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputTitle" placeholder="Title"
                                           name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" cols="20" name="description"
                                              id="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status1" value="publish" checked>
                                        Publish
                                    </label>
                                </div>


                                <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="status2"
                                                       value="draft">
                                                Draft
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="status3"
                                                       value="trash">
                                                Trash
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- parent selection -->
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="parent" class="col-sm-2 control-label">Parent</label>
                                    <div>
                                        <select name="parent" id="parent" class="from-control selectpicker">
                                            <option value="0">Select</option>

                                            @foreach($pages as $key=>$page)

                                                <option value="{{ $key }}">{{ $page }} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Page</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection