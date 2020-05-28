<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    public function listProduct(){
        return view("product.list");
    }

    public function newProduct(){
        return view("product.new");
    }


    public function saveProduct(Request $request){
        $request->validate([

            "product_name"=>"required|min:6|string",
            "product_description"=>"required|min:10|string",
            "price"=>"required|number",
            "sale_price"=>"required",
            "new"=>"required|min:6|string",
            "status"=>"required",
            "ingredient"=>"required|min:6|string"
        ],[
            "product_name.required"=>"Tên sản phẩm không được để trống..",
            "product_name.min"=>"tên Sản Phẩm Phải trên 6 Kí Tự",
            "product_name.string"=>"Tên sản phẩm phải là kiểu chuỗi",
            "product_description.required"=>"mô tả sản phảm không được để trống.. ",
            "product_description.min"=>"Mô tả phẩn trên 10 kí tự",
            "product_description.string"=>"Mô tả phải là kiểu chuỗi",
            "price.required"=>"Giá tiền không được để trống",
            "price.number"=>"Giá tiền phải là kiểu số",
            "sale_price.required"=>"Khuyến mãi đấy mấy ông mãnh bà cô",
            "new.required"=>"Sẩn phẩm mơi",
            "new.min"=>"Sẩn phẩm mới phải trên 6 kí tự",
            "new.string"=>"Sẩn phẩm là kiểu chuỗi ",
            "status.required"=>"Cho cửa hàng biết của bánh",
            "ingredient"=>"thành phần không được để trống...",
            "ingredient.min"=>"thành phần phải trên 6 kí tự",
            "ingredient.string"=>"thành phần phải là kiểu chuỗi",

        ]);
        try {
            Products::create([

                "product_name"=>$request->get("product_name"),
                "product_description"=>$request->get("product_description"),
                "price"=>$request->get("price"),
                "sale_price"=>$request->get("sale_price"),
                "new"=>$request->get("new"),
                "status"=>$request->get("status"),
                "ingredient"=>$request->get("ingredient"),

            ]);
        }catch (\Exception $exception){
            return redirect()->back("admin/product/newProduct");
        }
        return  redirect()->to("admin/product/saveProduct")->with("thongbao","Thêm sản phẩm thành công");
    }
}
