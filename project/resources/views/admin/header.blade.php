<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                {{ config('app.name', 'EASYSHOP') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                <!-- Authentication Links -->
                <li><a href="{{ url('admin') }}">หน้าหลัก</a></li>
                <li><a href="{{ url('category') }}">ประเภทสินค้า</a></li>
                <li><a href="{{ url('product')}}">สินค้า</a></li>
                <li><a href="{{ url('product')}}">ตะกร้าสินค้า</a></li>
                <li><a href="{{ url('product')}}">ใบสั่งซื้อ</a></li>
                <li class="dropdown">
                    <ul class="dropdown-menu" role="menu">
                        <li></li>
                    </ul>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="{{ url('admin') }}">ยินดีต้อนรับ ({{(Auth::user()->status)}})</a></li>
                <li><a href="{{ url('front') }}">หน้าบ้าน</a></li>
            </ul>
        </div>
    </div>
</nav>
