@extends('front.master')
@section('title','ตะกร้าสินค้า')
@section('content')
@if($cartitems->isEmpty())
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('front')}}">หน้าแรก</a></li>
                <li class="active">ตะกร้าสินค้า</li>
            </ol>
        </div>
        <div >
            <img style="margin: auto;" src="{{asset('/project/public/theme/images/home/clear_shopping.png')}}"  class="img-responsive" alt="" width="250" />
        </div>
    </div>
</section>
@else
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('front')}}">หน้าแรก</a></li>
                <li class="active">ตะกร้าสินค้า</li>
            </ol>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p style="color:#27ae60; font-size:16px;">รายละเอียดตะกร้าสินค้า</p>
            </div>
            <div class="panel-boby">
                @if ($errors->any())
                <div style="margin-top: 10px;" class="col-md-4 col-md-offset-4">
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                        <h4>{{$error}}</h4>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">ภาพสินค้า</td>
                                        <td class="description">รายละเอียด</td>
                                        <td class="price">ราคา</td>
                                        <td class="quantity">จำนวน</td>
                                        <td class="total">ราคารวม</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartitems as $cartitem)
                                    <tr>
                                        <td class="cart_product">
                                            <img class="img-thumnail img-responsive"  src="{{asset('project/public/images/product_resize/'.$cartitem->options->img)}}" alt="" width="70">
                                        </td>
                                        <td class="cart_description">
                                            <h3><span>{{$cartitem->name}}</span></h3>
                                            <span>รหัสสินค้า {{$cartitem->options->pro_code}} </span><br>
                                            <span>สินค้าคงเหลือ {{$cartitem->options->stock}} ชิ้น</span>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{number_format($cartitem->price,2)}}</p>
                                        </td>
                                        <td>
                                            <form action="{{('cart/updatecart/'.$cartitem->rowId)}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input style="margin-right: 30px;" type="number" name="qty" class="form-control co-md-4" value="{{$cartitem->qty}}">
                                                            <input style="margin-right: 30px;" type="hidden" name="pro_id" class="form-control co-md-4" value="{{$cartitem->id}}">
                                                            <button style="margin-top: 5px;" type="submit" name="btn" class="btn btn-block btn-primary" title="อัพเดทจำนวนสินค้า">
                                                                <i class="fa fa-arrow-circle-o-up fa-lg"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{number_format($cartitem->subtotal,2)}}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="{{url('/cart/delete/'.$cartitem->rowId)}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <div class="alert alert-success" role="alert">
                                <h4>รวมทั้งหมด :   <strong>{{Cart::count()}} รายการ</strong></h4>
                                <h4>ราคาสุทธิ :     <strong>{{Cart::subtotal()}} บาท</strong></h4>
                                <h4>การจัดส่งสินค้า : <strong>Free</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a class="btn btn-lg btn-primary" href="{{url('front')}}">ซื้อสิ้นค้าเพิ่ม</a>
                            @if(isset($cartitem))
                            <a class="btn btn-lg btn-primary" href="{{url('/checkout')}}">เช็คเอาท์</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
@endif
@endsection
@section('footer')
@if(session()->has('success'))
<script>
    swal({
        title: '<?php echo session()->get('success'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 2000
    });
</script>
@elseif(session()->has('error'))
<script>
    swal({
        title: '<?php echo session()->get('error'); ?>',
        text: 'ผลการทำงาน',
        type: 'error',
        timer: 2000
    });
</script>
@endif
@endsection
