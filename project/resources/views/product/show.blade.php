@extends('admin.master')
@section('title', 'รายละเอียดสินค้า')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">ภาพ</a></li>
                        <li><a data-toggle="tab" href="#menu1">ราคา</a></li>
                        <li><a data-toggle="tab" href="#menu2">รายละเอียด</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <img class="img-rounded img-responsive" src="{{asset('project/public/images/product/'.$products->pro_img)}}" width="500">
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <tr style="background-color: gold;">
                                        <th>รหัส</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>รหัสสินค้า</th>
                                        <th>ราคา</th>
                                        <th>ราคาพิเศษ</th>
                                        <th>ประเภท</th>
                                    </tr>
                                    <tr>
                                        <td>{{$products->id}}</td>
                                        <td>{{$products->pro_name}}</td>
                                        <td>{{$products->pro_code}}</td>
                                        <td>{{$products->pro_price}}</td>
                                        <td>{{$products->spl_price}}</td>
                                        <td>{{$products->pro_cat->name}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <td>{{$products->pro_info}}</td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection