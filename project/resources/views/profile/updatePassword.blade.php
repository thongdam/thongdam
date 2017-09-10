@extends('front.master')
@section('title','เปลี่ยนรหัสผ่าน')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('profile')}}">โปร์ไฟล์</a></li>
                <li class="active">เปลี่ยนรหัสผ่าน</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">
                {!! Form::open(['url' => 'UpdatePassword','method' => 'post']) !!}
                {{ csrf_field() }}
                <div class="col-md-9">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                        <label for="old_password" class="control-label">รหัสผ่านปัจจุ</label>
                        <input id="name" type="password" class="form-control" name="old_password" value="{{old('old_password')}}" autofocus>
                        @if ($errors->has('old_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="control-label">รหัสผ่านใหม่</label>
                        <input id="name" type="password" class="form-control" name="new_password" value="{{old('new_password')}}" autofocus>
                        @if ($errors->has('new_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-success">
                            แก้ไขข้อมูล
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<br>
@endsection
@section('footer')
@if(session()->has('status'))
<script>
    swal({
        title: '<?php echo session()->get('status'); ?>',
        text: 'ผลการทำงาน',
        type: 'error',
        timer: 6000
    });
</script>
@elseif(session()->has('success'))
<script>
    swal({
        title: '<?php echo session()->get('success'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 6000
    });
</script>
@endif
@endsection
