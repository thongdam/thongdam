@extends('admin.master')
@section('title', 'ประเภทสินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-title pull-left">
                            <strong>ประเภทสินค้าทั้งหมด</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" pull-right panel-title ">
                            <a href="{{ url('/category/create')}}" class="btn btn-sm btn-warning">
                                <span class="fa fa-plus-circle"> เพิ่มประเภทสินค้า</span>
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
                                        <th>ประเภทสินค้า</th>
                                        <th>สถานะ</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cats as $cat)
                                    <tr>
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->name}}</td>
                                        <td>
                                            @if($cat->status =='0')
                                            ปิดขาย
                                            @else
                                            เปิดขาย
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('/category/'.$cat->id.'/edit')}}" class="btn btn-sm btn-primary" title="แก้ไข">
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                            <a href="{{url('/category/delete/'.$cat->id)}}" class="btn btn-sm btn-danger" title="ลบ">
                                                <span class="fa fa-trash-o"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$cats->render()}}
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
