@extends('front.master')
@section('title','โปรไฟล์')
@section('header')
@section('content')
<section>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('profile')}}">โปร์ไฟล์</a></li>
                <li class="active">โปร์ไฟล์</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="row">
            @include('profile.menu')
            <h1><strong style="color:#27ae60;"> {{Auth::user()->name}}</strong> ยินดีต้อนรับ</h1>
        </div>
    </div>
</section>
@endsection
