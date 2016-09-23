@extends('layouts.app')
@section('title')
    Banners Lists
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Banners
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="{{ route('banners') }}">Back to banners</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists Banners
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <a href="{{ route('add_banners') }}">
                            <button type="button" class="btn btn-info">New Banner</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($banners as $banner)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/banners').'/'.$banner->image_link }}" alt=""
                                                 width="150" height="150"></td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->status }}</td>
                                        <td>{{ $banner->created_at }}</td>
                                        <td>{{ $banner->updated_at }}</td>
                                        <td><a href="{{ route('edit.banners', ['banner_id'=>$banner->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.banners', ['banner_id'=>$banner->id]) }}">Delete</a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection