<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="{{ route('customer/dash') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="{{ route('cust_lands') }}"><i class="fa fa-fw fa-edit"></i> Lands</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-edit"></i> Flats</a>
        </li>
        <li>
            <a href="{{ route('cust_house') }}"><i class="fa fa-fw fa-edit"></i> Houses</a>
        </li>

        <li>
            <a href="#"><i class="fa fa-fw fa-edit"></i> Rooms</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
                Plotings <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Plots</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Ploting Details</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>