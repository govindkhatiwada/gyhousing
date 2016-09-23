<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="{{ route('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="{{ route('banners') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Banners </a>
        </li>
        <li>
            <a href="{{ route('pages') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Pages </a>
        </li>
        <li>
            <a href="{{ route('testimonials') }}"><i class="fa fa-fw fa-table"></i> Testimonials</a>
        </li>
        <li>
            <a href="{{ route('houses') }}"><i class="fa fa-fw fa-edit"></i> Houses</a>
        </li>
        <li>
            <a href="{{ route('lands') }}"><i class="fa fa-fw fa-edit"></i> Lands</a>
        </li>
        <li>
            <a href="{{ route('flats') }}"><i class="fa fa-fw fa-edit"></i> Flats</a>
        </li>

        <li>
            <a href="{{ route('book') }}"><i class="fa fa-fw fa-edit"></i> Bookings</a>
        </li>

        <li>
            <a href="{{ route('sell.request') }}"><i class="fa fa-fw fa-edit"></i> Sale request</a>
        </li>
        {{--<li>--}}
        {{--<a href="{{ route('plots') }}"><i class="fa fa-fw fa-edit"></i> Plots</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="{{ route('ploting_details') }}"><i class="fa fa-fw fa-edit"></i> Ploting Details</a>--}}
        {{--</li>--}}
        <li>
            <a href="{{ route('room_details') }}"><i class="fa fa-fw fa-edit"></i> Rooms</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
                Plotings <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="{{ route('plots') }}"><i class="fa fa-fw fa-edit"></i> Plots</a>
                </li>
                <li>
                    <a href="{{ route('ploting_details') }}"><i class="fa fa-fw fa-edit"></i> Ploting Details</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>