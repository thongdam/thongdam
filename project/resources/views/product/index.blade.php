@extends('admin.master')
@section('title', 'สินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-title pull-left">
                            <strong>สินค้าทั้งหมด</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" pull-right panel-title ">
                            <a href="{{ url('/product/create')}}" class="btn btn-sm btn-warning">
                                <span class="fa fa-plus-circle"> เพิ่มสินค้า</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-responsive table-condensed">
                                <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>รูปภาพ</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>รหัสสินค้า</th>
                                        <th>ราคา</th>
                                        <th>ประเภท</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <img class="img-rounded img-responsive" src="{{asset('project/public/images/product_resize/'.$product->pro_img)}}" width="100">
                                        </td>
                                        <td>{{ $product->pro_name }}</td>
                                        <td>{{ $product->pro_code }}</td>
                                        <td>{{ $product->pro_price }}</td>
                                        <td>{{ $product->pro_cat->name }}</td>
                                        <td>
                                            <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-sm btn-danger" title="ลบ">
                                                <span class="fa fa-trash-o"></span>
                                            </a>
                                            <a href="{{url('/product/'.$product->id.'/edit')}}" class="btn btn-sm btn-primary" title="แก้ไข">
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                            <a href="{{url('/product/show/'.$product->id)}}" class="btn btn-sm btn-success" title="ดู">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $products->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@if(session()->has('update'))
<script>
    swal({
        title: '<?php echo session()->get('update'); ?>',
        text: 'ผลการทำงาน',
        type: 'success',
        timer: 3000
    });
</script>
@endif
@endsection()
