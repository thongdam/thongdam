@extends('admin.master')
@section('title', 'แก้ไขสินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading panel-title">แก้ไขข้อมูลสินค้า</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::model($cats,['url' => 'category/'.$cats->id,'method'=>'put', 'class' => 'form-horizontal']) !!}
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
                                    {{ Form::submit('แก้ไขข้อมูล', ['class' => 'btn btn-block btn-primary']) }}
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
