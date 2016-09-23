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
                    Pages
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> List of Testimonials
                    </li>
                </ol>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Testimonials</h2>
                        <!-- Contextual button for informational alert messages -->
                        <a href="{{ route('form.testimonial') }}">
                            <button type="button" class="btn btn-info">Add Testimonials</button>
                        </a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped ">
                                <thead>
                                <tr>
                                    <th>Client image</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Created Date</th>
                                    <th>Modified Date</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tests as $test)

                                    <tr class="active">
                                        <td><img src="{{ URL('/images/test').'/'.$test->image_link }}"
                                                 class="img-responsive" width="130" height="130"/></td>
                                        <td>{{ $test->name }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($test->message, 20,'...')  !!}</td>
                                        <td>{{ $test->created_at }}</td>
                                        <td>{{ $test->updated_at }}</td>
                                        <td>{{ $test->status }}</td>
                                        <td><a href="{{route('testimonial.edit', ['test_id'=>$test->id])}}">Edit</a>
                                        </td>
                                        <td><a href="{{route('testimonial.delete', ['test_id'=>$test->id])}}">Delete</a>
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