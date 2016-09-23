@extends('layouts.app')
@section('title')
    Edit
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit pages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Pages to be edited
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-md-12">


                                <form action="{{route('page.update')}}" method="post">

                                    @foreach($pages as $page)
                                        <div class="form-group">
                                            <label for="page_tile">Title</label>
                                            <input class="form-control" type="text" name="title" id="title"
                                                   value="{{ $page->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="page_description">Description</label>
                                            <textarea class="form-control" rows="10" name="description"
                                                      id="description">{!!   $page->description !!}</textarea>
                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label for="sub_page">Parent ID </label>--}}
                                            {{--<select name="parent" id="parent">--}}
                                                {{--@foreach($pages as $key=>$pa)--}}
                                                    {{--<option value="0">Select</option>--}}
                                                    {{--<option value="{{ $key }}"--}}
                                                            {{--@if($page->parent_id==$key)selected="selected">{{ $pa }} </option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}

                                            {{--<input class="form-control" type="text" name="parent" id="parent"--}}
                                                   {{--value="{{ $page->parent_id }}">--}}
                                        {{--</div>--}}



                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="publish" @if ( $page->status=="publish")
                                                selected="selected"
                                                        @endif>Publish
                                                </option>
                                                <option value="trash" @if ( $page->status=="trash")
                                                selected="selected"
                                                        @endif>Trash
                                                </option>
                                                <option value="draft" @if ( $page->status=="draft")
                                                selected="selected"
                                                        @endif>Draft
                                                </option>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <input type="hidden" name="page_id" value="{{$page->id}}">
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