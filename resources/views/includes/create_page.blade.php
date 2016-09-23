@include('layouts.app')
@section('content')
    @if(count($errors)>0)
        <div class="row">
            <div class="col-md-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>Sign Up</h3>
            <form action="{{ route('page.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ Request::old('title') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="last_name" id="last_name"
                           value="{{ Request::old('last_name') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail id</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input class="form-control" type="text" name="contact" id="contact"
                           value="{{ Request::old('contact') }}">
                </div>
                <div class="form-group">
                    <label for="password">Create Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Create New</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>

    </div>
@endsection