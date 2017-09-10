@extends('front.master')
@section('title','รายละเอียดสินค้า')
@section('content')
<section>
    <div class="container">
        <div class="row">
            @include('front.sitebar')
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-6">
                        <div class="view-product">
                          <p class="hidden-xs">
                            <img id="zoom_01" src="{{asset('/project/public/images/product_resize/'.$product->pro_img)}}"
                                 data-zoom-image="{{asset('/project/public/images/product/'.$product->pro_img)}}" />
                          </p>
                          <p class="hidden-md hidden-sm hidden-lg">
                            <img  src="{{asset('/project/public/images/product_resize/'.$product->pro_img)}}">
                          </p>
                            <h3>ZOOM</h3>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('/project/public/theme/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <div style="color: green;" class="col-sm-12">
                                <h3>{{ $product->pro_name }}</h3>
                                รหัสสินค้า: {{ $product->pro_code }}<br>
                                สินค้าคงเหลือ: {{ $product->stock }} ชิ้น
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-12">
                                <div style="color: coral;font-size: 20px;" class="pull-right">
                                    <span>{{ $product->pro_price }} บาท</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <a href="{{ url('/cart/additem/'.$product->id)}}">
                                    <button type="button" class="btn btn-success pull-right">
                                        <i class="fa fa-shopping-cart"></i>
                                        หยิบใส่ตะกร้า
                                    </button>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <br>
                                <p style="color: green; font-size: 20px;">รายละเอียด</p>
                                {{ $product->pro_info }}
                            </div>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">รายการสินค้าแนะนำ</h2>
                    <div class="slider">
                        @foreach ($products  as $product)
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
            </div>
        </div>
    </div>
</section>
@endsection()

@section('footer')
<script type="text/javascript">
    $(document).ready(function () {
        $('.slider').bxSlider({
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
<script>
    $("#zoom_01").elevateZoom();
</script>
@endsection()
