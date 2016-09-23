<header>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-8 col-md-8  left-top-header">
                <p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp 00977-01-4780123</p>
                <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp info@hvtreks.com</p>
                <p class="login-reg"><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a href="{{ url('/login') }}">Login</a> /
                            <a href="{{ url('/register') }}">Register</a>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if( Auth::user()->user_type_id=='1' )
                                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-sign-out"></i>Dashboard</a>
                                        </li>
                                    @endif
                                    @if( Auth::user()->user_type_id!='1' )
                                        <li><a href="{{ url('/customer/dash') }}"><i class="fa fa-btn fa-sign-out"></i>Dashboard</a>
                                        </li>
                                    @endif

                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </a></p>
            </div>
            <div class="col-sm-4 col-md-4 right-top-header">
                <form action="{{route('search')}}" method="get">
                    @if ($errors->has('keyword'))
                        <span class="help-block" style="color:red;">
                                       {{ $errors->first('keyword') }}
                                    </span>
                    @endif
                    <div class="input-group">
                        <div class="input-group-addon select-option">
                            <select name="type">
                                <option value="house">House</option>
                                <option value="land">Land</option>
                                <option value="flats">Flats</option>
                                <option value="room">Rooms</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="keyword" placeholder="Search for...">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                        </div>
                    </div>


                    </span>


            </div>

            </form>
        </div>
    </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img
                                src="{{URL::to('frontend/images/logo.png')}}"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-left">
                        <li class="home_nav"><a href="{{ url('/')  }}">Home</a></li>
                        {{--<li><a href="{{route('about')}}">about</a></li>--}}
                        <li><a href="{{route('cPages',['title'=>'Services'])}}">services</a></li>
                        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">properties
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('AllHouses')}}">Houses</a></li>
                                <li><a href="{{route('AllLands')}}">Lands</a></li>
                                <li><a href="{{route('AllFlats')}}">Flats</a></li>
                                <li><a href="{{route('AllRooms')}}">Rooms</a></li>
                                {{--<li><a href="">{{ test() }}</a></li>--}}
                            </ul>
                        </li>
                        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">plotings
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach(App\plotings::all() as $ploting)
                                    <li>
                                        <a href="{{route('plotingdetails', ['plots'=>$ploting->id])}}">{{$ploting->plot}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('our_team')}}">our team</a></li>
                        <li><a href="{{route('cPages',['title'=>'Contact'])}}">contact us</a></li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>