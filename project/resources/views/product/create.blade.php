@extends('admin.master')
@section('title', 'เพิ่มสินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading panel-title">เพิ่มข้อมูลสินค้า</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::open(['url' => 'product', 'files' => true, 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::label('cat_id', 'หมวดสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::select('cat_id',$cat_id,null, ['class' => 'form-control','placeholder' => 'กรุณาเลือกหมวดหมู่สินค้า...']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pro_name', 'ชื่อสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::text('pro_name',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pro_code', 'รหัสสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::text('pro_code',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pro_price', 'ราคา',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::text('pro_price',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('stock', 'สต๊อก',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::text('stock',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pro_info', 'รายละเอียด',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('pro_info',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pro_img', 'ภาพสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::file('pro_img',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-3">
                                {{ Form::submit('บันทึกข้อมูล', ['class' => 'btn btn-block btn-primary']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('footer')
@if(session()->has('insert'))
<script>
    swal({
        title: '<?php echo session()->get('insert'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 3000
    });
</script>
@endif
@endsection()