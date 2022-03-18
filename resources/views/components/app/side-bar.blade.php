
<div class="navbar nav_title" >
</div>
<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix" >
    <div class="profile_pic">
        <center>
            <img src="{{ asset('build/images/logo.png') }}"
                 alt="..." width="200" style="margin-top:-50px">
        </center>
    </div>
</div>
<!-- /menu profile quick info -->
<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>TO DO'S</h3>
        <ul class="nav side-menu">
            <li><a href="{{route('home')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            <li>
                <a href="{{ route('medicine.category') }}">
                    <i class="fa fa-list-alt"></i>
                    Medicine Category
                </a>
            </li>
            <li>
                <a href="{{ route('medicine') }}">
                    <i class="fa fa-medkit"></i>
                    Medicine
                </a>
            </li>
            <li>
                <a href="{{ route('stock') }}">
                    <i class="fa fa-check-square-o"></i>
                    Stock
                </a>
            </li>
            <li>
                <a href="{{ route('sale') }}">
                    <i class="fa fa-shopping-cart"></i>
                    Sales
                </a>
            </li>
            <li><a href="company.php"><i class="fa fa-building-o"></i> Company</a></li>
            <li><a href="report.php"><i class="fa fa-bar-chart"></i> Report</a></li>
            <li><a href="supplier.php"><i class="fa fa-truck"></i> Supplier</a></li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
