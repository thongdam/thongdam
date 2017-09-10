@extends('front.master')
@section('title','หน้าแรก')
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('/project/public/theme/images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('/project/public/theme/images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('/project/public/theme/images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('/p/project/public/public/theme/images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('/project/public/theme/images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
                                <img src="{{asset('/project/public/theme/images/home/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            @include('front.sitebar')
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">
                        @if (isset($msg))
                        {{$msg}}
                        @else
                        {{__('auth.category_list')}}
                        @endif
                    </h2>
                    @if($products->isEmpty())
                    <div class="col-md-12 text-center">
                        <h1 style="margin-bottom: 50px;" class="text-danger">ไม่พบรายการสินค้า</h1>
                    </div>
                    @else
                    @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/project/public/images/product_resize/'.$product->pro_img)}}" alt="" />
                                    <h2>{{$product->pro_price}} บาท</h2>
                                    <p>{{$product->pro_name}}</p>
                                    <a href="{{url('/front/product_details/'.$product->id)}}" class="btn btn-success add-to-cart"><i class="fa fa-shopping-cart"></i>หยิบใส่ตะกร้า</a>
                                </div>
                                <a href="{{url('/front/product_details/'.$product->id)}}">
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>รายละเอียด</h2>
                                            <h2>{{$product->pro_price}} บาท</h2>
                                            <p>{{$product->pro_name}}</p>
                                            <a href="{{url('/cart/additem/'.$product->id)}}" class="btn btn-success add-to-cart"><i class="fa fa-shopping-cart"></i>หยิบใส่ตะกร้า</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--features_items-->
                <div class="row">
                    <div class="co-md-12">
                        <div class="pull-right">
                            {{$products->render()}}
                        </div>
                    </div>
                </div>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">{{__('auth.Good_trade')}}</h2>
                    <div class="slider1">
                        @foreach ($slide  as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/front/product_details/'.$product->id)}}">
                                            <div class="slide"><img src="{{asset('/project/public/images/product_resize/'.$product->pro_img)}}"></div>
                                        </a>
                                        <h2>{{$product->pro_price}} บาท</h2>
                                        <p>{{$product->pro_name}}</p>
                                        <a href="{{url('/cart/additem/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>หยิบใส่ตะกร้า</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!--/recommended_items-->
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function () {
        $('.slider1').bxSlider({
            auto: true,
            slideWidth: 300,
            minSlides: 1,
            maxSlides: 3,
            startSlide: 2,
            slideMargin: 10
        });
    });
</script>
@if(session()->has('status'))
<script>
    swal({
        title: '<?php echo session()->get('status'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 2000
    });
</script>
@endif
@endsection()
