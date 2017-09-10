@extends('front.master')
@section('title','เช็คเอาท์')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('front')}}">หน้าแรก</a></li>
                <li class="active">เช็คเอาท์</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="panel panel-default">
            <div class="panel-heading">
                <p style="color:#27ae60; font-size:16px;">กรุณากรอกที่อยู่ของคุณให้ตรงตามความเป็นจริงเพื่อความสะดวกในการจัดส่งสินค้า</p>
            </div>
            <div class="panel-body">
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="shopper-info">
                                <form action="{{('front/formvalidate')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="fullname">ชื่อ-สกุล</label>
                                        <small style="color:red;">{{ $errors->first('fullname') }}</small>
                                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" placeholder="ชื่อ นามสกุล">
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">เบอร์โทร</label>
                                        <small style="color:red;">{{ $errors->first('phone') }}</small>
                                        <input type="text" name="phone" value="{{old('phonenumber')}}" class="form-control" placeholder="เบอร์โทรที่ติดต่อได้">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">ที่อยู่</label>
                                        <small style="color:red;">{{ $errors->first('address') }}</small>
                                        <textarea class="form-control" name="address" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="district">แขวง/ตำบล</label>
                                        <small style="color:red;">{{ $errors->first('district') }}</small>
                                        <input type="text" name="district" value="{{old('district')}}" class="form-control" placeholder="ตำบล">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">อำเภอ/เขต</label>
                                        <small style="color:red;">{{ $errors->first('amphur') }}</small>
                                        <select style="margin-bottom:20px;"  class="form-control" name="amphur">
                                            <option value="" selected>อำเภอ/เขต</option>
                                            @foreach($amphurs as $amphur)
                                            <option>{{$amphur->AMPHUR_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">จังหวัด</label>
                                        <small style="color:red;">{{ $errors->first('province') }}</small>
                                        <select style="margin-bottom:20px;" class="form-control" name="province">
                                            <option value="" selected>จังหวัด</option>
                                            @foreach($provinces as $province)
                                            <option>{{$province->PROVINCE_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="zipcode">รหัสไปษณีย์</label>
                                        <small style="color:red;">{{ $errors->first('zipcode') }}</small>
                                        <input type="text" name="zipcode" class="form-control" placeholder="รหัสไปษณีย์">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-payment">
                    <h2 class="text-center">ตรวจสอบรายละเอียดสินค้า</h2>
                    <hr>
                </div>
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
                                    <img class="img-thumnail img-responsive" src="{{asset('project/public/images/product_resize/'.$cartitem->options->img)}}" alt="" width="75">
                                </td>
                                <td class="cart_description">
                                    <h4>{{$cartitem->name}}</h4>
                                    <span>รหัสสินค้า {{$cartitem->options->pro_code}} </span><br>
                                    <span>สินค้าคงเหลือ {{$cartitem->options->stock}} ชิ้น</span>
                                </td>
                                <td class="cart_price">
                                    <p>{{number_format($cartitem->price,2)}} บาท</p>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input style="margin-right: 30px;" type="number" name="qty" class="form-control co-md-4" value="{{$cartitem->qty}}" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($cartitem->subtotal,2)}} บาท</p>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{url('/cart/delete/'.$cartitem->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(empty($cartitem))
                    <h1 class="text-center text-danger">ไม่พบสินค้าในตะกร้า</h1>
                    @endif
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
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                      <div style="font-size:19px;" class="col-md-12">
                        <label class="radio-inline">
                            <input name="pay" id="paypal" checked="" value="paypal" type="radio"> PayPal
                          </label>
                          <label class="radio-inline">
                            <input name="pay" id="cash" value="cash" type="radio">เงินสด
                          </label>
                      </div>
                      <div class="col-md-12">
                        @include('front.paypal')
                    </div>
                    <div class="col-md-5">
                          <button type="submit" class="btn btn-lg btn-block btn-primary" value="COD">ตกลง</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection()
