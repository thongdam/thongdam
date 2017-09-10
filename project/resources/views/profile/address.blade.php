@extends('front.master')
@section('title','ที่อยู่')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('profile')}}">โปร์ไฟล์</a></li>
                <li class="active">ที่อยู่</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">
                {!! Form::open(['url' => 'address','method' => 'post']) !!}
                {{ csrf_field() }}
                @foreach($address_data as $address)
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                        <label for="fullname" class="control-label">ชื่อ-สกุล</label>
                        <input id="name" type="text" class="form-control" name="fullname" value="{{ $address->fullname }}" autofocus>
                        @if ($errors->has('fullname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fullname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="control-label">เบอร์โทร</label>
                        <input id="name" type="text" class="form-control" name="phone" value="{{ $address->phone }}" autofocus>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="control-label">ที่อยู่</label>
                        <input id="name" type="text" class="form-control" name="address" value="{{ $address->address }}" autofocus>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                        <label for="district" class="control-label">แขวง/ตำบล</label>
                        <input id="name" type="text" class="form-control" name="district" value="{{ $address->district }}" autofocus>
                        @if ($errors->has('district'))
                        <span class="help-block">
                            <strong>{{ $errors->first('district') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('amphur') ? ' has-error' : '' }}">
                        <label for="amphur" class="control-label">เขต/อำเภอ</label>
                        <input id="name" type="text" class="form-control" name="amphur" value="{{ $address->amphur }}" autofocus>
                        @if ($errors->has('amphur'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amphur') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                        <label for="province" class="control-label">จังหวัด</label>
                        <input id="name" type="text" class="form-control" name="province" value="{{ $address->province }}" autofocus>
                        @if ($errors->has('province'))
                        <span class="help-block">
                            <strong>{{ $errors->first('province') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                        <label for="zipcode" class="control-label">รหัสไปษณีย์</label>
                        <input id="name" type="text" class="form-control" name="zipcode" value="{{ $address->zipcode }}" autofocus>
                        @if ($errors->has('zipcode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zipcode') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @endforeach

                @if(isset($address))
                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-lg btn-success">
                            แก้ไขข้อมูล
                        </button>
                    </div>
                </div>
                @endif
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
        type: 'success',
        timer: 3000
    });
</script>
@endif
@endsection

