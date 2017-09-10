@extends('front.master')
@section('title','ช็อปปิ้ง')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="{{asset('project/public/theme/images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>
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
                        รายการที่น่าสนใจ
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
                    <h2 class="title text-center">รายการสินค้าแนะนำ</h2>
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
