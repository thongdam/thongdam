@extends('front.master')
@section('title','ใบสั่งซื้อ')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('profile')}}">โปร์ไฟล์</a></li>
                <li class="active">ใบสั่งซื้อ</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead style="background-color:#27ae60; color: #FFF; font-size: 15px; ">
                        <th>วัน/เวลา</th>
                        <th>ชื่อสินค้า</th>
                        <th>รหัสสินค้า</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ucwords( $order->pro_name )}}</td>
                                <td>{{ $order->pro_code }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
