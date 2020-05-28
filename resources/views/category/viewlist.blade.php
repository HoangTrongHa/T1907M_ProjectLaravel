@extends('components.layout',["categories"=>$data])
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{$category->image}}"style="width: 50px;height: 50px"></td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                            </tr>
                        @endforeach
                        {{--                lay du lieu tu bang categories tren db --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

