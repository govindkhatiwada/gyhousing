<section class="social">
    {{--<div class="youtube"><a href="#">BUY</a></div>--}}
    <div class="youtube"><a href="#">SELL</a></div>
    {{--<div class="youtube"><a href="#">RENT</a></div>--}}

</section>
<section class="slider">

    <div class="rev_slider_wrapper">

        <div class="rev_slider" data-version="5.0">

            <ul>
                @foreach(App\banners::all() as $banner)
                    <li data-transition="fade">

                        <img src="{{url('images/banners/'.$banner->image_link)}}" alt=banner_img" height="440">
                        <div class="my-overlay"></div>

                        <div class="overlay"></div>


                        <div class="tp-caption title-2"
                             data-x="530"
                             data-hoffset="30"
                             data-y="155"
                             data-start="1800"
                             data-transform_in="x:100px;opacity:0;s:700;"
                             data-transform_out="x:100px;opacity:0;s:700;">
                            {{$banner->title}} <br/> Check It Right Now
                        </div>


                        <div class="tp-caption text-2 text-left"
                             data-x="530"
                             data-hoffset="30"
                             data-y="320"
                             data-start="2000"
                             data-transform_in="x:100px;opacity:0;s:700;"
                             data-transform_out="x:100px;opacity:0;s:700;">
                            <p>{{ $banner->description }}</p>
                        </div>

                        <div class="tp-caption"
                             data-x="530"
                             data-y="440"
                             data-start="2800"
                             data-transform_in="y:100px;opacity:0;s:700;"
                             data-transform_out="y:100px;opacity:0;s:700;">
                            <a class="btn-green" href="#"><span>View</span></a>
                        </div>

                    </li>
                @endforeach
            </ul>

        </div><!-- end .rev_slider -->

    </div>
    <!-- end .rev_slider_wrapper -->
</section>


<section class="featured">
    <div class="container">
        <h2 class="heading">featured properties </h2>
        @foreach(App\houses::all() as $house)
            <div class="col-md-6">

                <div class="featured-house">

                    <div class="col-md-4 ">
                        <div class="side-corner-tag feat-img">
                            <img src="{{url('images/house/'.$house->image_path)}}" height="90" width="130">
                            <p><span>featured</span></p>
                        </div>
                    </div>
                    <div class="class-md-8 feat-desp">
                        <h3 class="for">for rent</h3>
                        <p class="desp-feat">{!! \Illuminate\Support\Str::words($house->description, 30,'...')  !!}</p>
                        <p class="district"><i class="fa fa-map-marker" aria-hidden="true">{{$house->location}}</i></p>
                    </div>

                </div>
                <div class="clear"></div>
            </div>
        @endforeach
    </div>
</section>