@extends('components.layout')
@section('head-title','Category')
@section('title','ListCategory')
@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        LOẠI SẢN PHẨM
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{route('newPro')}}/new">Thêm mới loại sản phẩm</a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center" >Description</th>
                            <td>hellos</td>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->image}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td action="{{url("/admin/type-product/deleteCategory/{$category->__get("id")}")}}" method="delete">
                                    {{--                                method theo routers--}}
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        {{--                lay du lieu tu bang categories tren db --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DANH SÁCH HỆ THỐNG CỬA HÀNG

                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a class=" waves-effect waves-block" href="{{url('admin/store')}}">Thêm mới cửa hàng</a></li>

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
                            <th>Khu vực</th>
                            <th>Tên cửa hàng</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Tác vụ</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->image}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td action="{{url("/admin/type-product/deleteCategory/{$category->__get("id")}")}}" method="delete">
                                    {{--                                method theo routers--}}
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $category->links() !!}
            </div>
        </div>
    </div>
@endsection

