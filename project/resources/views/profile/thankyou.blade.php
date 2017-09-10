@extends('front.master')
@section('title','โปรไฟล์')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <strong style="color: #D8335B; font-size: 40px;">ขอบคุณๆลูกค้าที่ใว้ใจใช้บริการเรา</strong>
                <p class="lead text-center">
                    <a class="btn btn-primary btn-lg" href="{{url('/orders')}}" role="button">ดูรายการสั่งซื้อที่นี่</a>
                </p>
            </div>
        </div>
    </div>
</div><br>
@endsection
