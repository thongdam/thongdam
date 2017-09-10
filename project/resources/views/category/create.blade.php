@extends('admin.master')
@section('title', 'เพิ่มประเภทสินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading panel-title">เพิ่มประเทภสินค้า</div>
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
                        {!! Form::open(['url' => 'category','class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::label('name', 'ประเภทสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{ Form::text('name',null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'สถานะประเภทสินค้า',['class'=>'control-label col-md-3']) }}
                            <div class="col-md-6">
                                {{  Form::select('status', ['0' => 'ปิดขาย', '1' => 'เปิดขาย'], null,['class'=>'form-control'], ['placeholder' => 'Pick a size...']) }}
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
@if(session()->has('success'))
<script>
    swal({
        title: '<?php echo session()->get('success'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 2000
    });
</script>
@endif
@endsection()
