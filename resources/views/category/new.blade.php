@extends('components.layout',["categories"=>$categories])
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    THÊM LOẠI SẢN PHẨM
                </h2>
            </div>
            <div class="body">
                <form role="form" action="{{url("/save-category")}}" method="post">
                    @method("POST")
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control @error("name") is-invalid @enderror" type="text" name="name" placeholder="Tên Sản "/>
                            @error("name")
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category desription</label>
                            <input class="form-control @error("description") is-invalid @enderror" type="text" name="description" placeholder="Mô Tả Sản "/>
                            @error("description")
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input class="form-control @error("image") is-invalid @enderror" type="text" name="image" placeholder="Link Image"/>
                            @error("image")
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
