@extends('layouts.app')
@section('title')
    Pages List
@endsection

@section('content')
    <div class="container">
    @include('includes.side_nav')
    @include('includes.message')
    <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-file"></i> <a href="">Back to Pages</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Lists of Pages
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Contextual button for informational alert messages -->
                        <a href="{{ route('add_pages') }}">

                            <button type="button" class="btn btn-info">Add Pages</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Pages</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pages as $page)

                                    <tr class="active">
                                        <td>{{ $page->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($page->description, 20,'...')  !!}</td>
                                        <td>{{ $page->created_at }}</td>
                                        <td>{{ $page->updated_at }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td><a href="{{ route('edit', ['page_id'=>$page->id]) }}">Edit</a></td>
                                        <td><a href="{{ route('delete', ['page_id'=>$page->id]) }}">Delete</a></td>
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
        <!-- /.row -->
@endsection