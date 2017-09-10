<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 098-863-3922</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>  thongdamlll@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/ketmany326930"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            @if(Session::has('locale'))
                            {{session('locale')}}
                            @else
                            {{Config::get('app.locale')}}
                            @endif
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu lang">
                            <li><a href="{{url('language/en')}}">England</a></li>
                            <li><a href="{{url('language/lao')}}">Laos</a></li>
                            <li><a href="{{url('language/th')}}">Thailand</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/front')}}"><img src="{{asset('project/public/theme/images/home/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            $cartdata = Cart::content();
                            ?>
                            <li class="dropdown">
                                <a href="{{url('cart')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i> {{__('auth.cart')}}
                                    <span  class="badge">{{Cart::count()}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="pull-left">
                                                <a href="{{url('cart')}}">
                                                    <span class="text-success" style=" margin: 0px; font-size: 16px; font-weight: bold;">
                                                        <i class="fa fa-shopping-cart"> <span  class="badge">{{Cart::count()}}</span> </i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="pull-right">
                                                <span class="text-success" style=" margin: 0px; font-size: 16px; font-weight: bold;">รวม : {{Cart::subtotal()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if($cartdata->isEmpty())
                                        <h2 class="text-center text-danger">{{__('auth.cart_imty')}}</h2>
                                        @else
                                        @foreach($cartdata as $cart)
                                        <div style="padding: 5px;" class="col-xs-12 col-sm-12 col-md-6 pull-left">
                                            <a href="{{url('cart')}}">
                                                <img src="{{asset('project/public/images/product_resize/'.$cart->options->img)}}" alt="" width="80" height="80">
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 pull-right">
                                            <a href="{{url('cart')}}">
                                                <span>{{$cart->name}}</span><br>
                                                <span>{{number_format($cart->price,2)}} บาท</span><br>
                                                <span>จำนวน ({{$cart->qty}}) ชิ้น</span>
                                            </a>
                                            <hr>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{url('cart')}}">
                                                <button style="margin-right: 5px;" class=" pull-left btn btn-success">ดูตะกร้าสินค้า</button>
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{url('checkout')}}">
                                                <button style="margin-right: 5px;" class=" pull-right btn btn-primary">เช็คเอาท์</button>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </ul>
                            </li>
                            @if (Auth::guest())
                            <li><a href="{{url('login')}}"><i class="fa fa-sign-in"></i> {{__('auth.login')}}</a></li>
                            <li><a href="{{url('register')}}"><i class="fa fa-lock"></i> {{__('auth.register')}}</a></li>
                            @else
                            <li><a href="{{url('/profile') }}"><i class="fa fa-user"></i> โปร์ไพล์</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> ออกจากระบบ
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @if(Auth::user()->status=='admin')
                            <li><a href="{{url('admin') }}"><i class="fa fa-cogs"></i> สำหรับผู้ดูแลระบบ</a></li>
                            @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/front')}}" class="active">{{__('auth.front')}}</a></li>
                            <li><a href="{{url('/shop')}}">{{__('auth.shop')}}</a></li>
                            <?php $cats = DB::table('pro_cat')->get(); ?>
                            @foreach($cats as $cat)
                            @if(Config::get('app.locale')==='en')
                            <li><a href="{{url('/products/'.$cat->name)}}">{{ucwords($cat->name)}}</a></li>
                            @elseif(Config::get('app.locale')==='lao')
                            <li><a href="{{url('/products/'.$cat->name)}}">{{ucwords($cat->lao_name)}}</a></li>
                            @else
                            <li><a href="{{url('/products/'.$cat->name)}}">{{ucwords($cat->th_name)}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        {!! Form::open(['url' => 'search']) !!}
                        {{ Form::text('search_data',null,['placeholder'=>'Search']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
