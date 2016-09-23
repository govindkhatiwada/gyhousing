<section class="featured">
    <div class="container">
        <h2 class="heading" style="background-color: red; width:150px;margin-top:50px;">featured</h2>
    </div>
    <div class="owl-slider">
        <div class="container">
            <div id="owl-demo">
                @foreach(App\houses::where('is_featured','yes')->get() as $house)
                    <div class="col-md-12">
                        <a href="{{route('property.houses', ['id'=>$house->id])}}">
                            <div class="item">
                                <div class="item-size">
                                    <div class="featured-house">

                                        <div class="col-md-4 ">
                                            <div class="side-corner-tag feat-img">
                                                <img src="{{url('images/house/'.$house->image_path)}}" height="90"
                                                     width="130" class="responsive">
                                                <p><span>featured</span></p>
                                            </div>
                                        </div>
                                        <div class="class-md-8 feat-desp">
                                            <h3 class="for">for rent</h3>
                                            <p class="desp-feat">{!! \Illuminate\Support\Str::words($house->description, 30,'...')  !!}</p>
                                            <p class="district"><i class="fa fa-map-marker"
                                                                   aria-hidden="true"></i> {{$house->location}}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

</section>

