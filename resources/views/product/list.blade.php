@extends('components.layout',["categories"=>$categories])
@section('head-title','Product')
@section('title','listProduct')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DANH SÁCH Các Sản Phẩm Có Trong Cửa Hàng
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('newPro')}}">Thêm mới Sản Phẩm</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
                @if(session('thong_bao'))
                    <div class="header">
                        <div class="alert alert-success">
                            {{session('thong_bao')}}
                        </div>
                    </div>
                @endif
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên </th>
                            <th>Mô </th>
                            <th>Giá </th>
                            <th>Khuyến </th>
                            <th>Thành Phần</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $product as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->sale_price}}</td>
                                <td>{{$product->ingredient}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
