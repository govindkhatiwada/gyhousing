@if(Session::has('message'))

    <div class="alert alert-success">
        <strong>Well done!</strong> {{ Session::get('message') }}
    </div>

@endif


@if(count($errors) > 0)
    <section class="info-box fail">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif