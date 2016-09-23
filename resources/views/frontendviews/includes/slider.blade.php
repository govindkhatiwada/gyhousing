<section class="social">
    {{--<div class="youtube"><a href="#">BUY</a></div>--}}
    <div class="youtube"><a href="{{ route('sell') }}">SELL</a></div>
    {{--<div class="youtube"><a href="#">RENT</a></div>--}}

</section>

<section class="slider">
    <ul class="rslides">
        @foreach(App\banners::all() as $banner)

            <li><img src="{{url('images/banners/'.$banner->image_link)}}" alt="" width="100%"></li>

        @endforeach
    </ul>

    @include('frontendviews.includes.feature')
</section>
