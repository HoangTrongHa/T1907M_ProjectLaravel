<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listProduct(){
        $categories= Category::all();
        $product = Products::all();
        return view("product.list",[
            'categories'=>$categories,
            'product' => $product
        ]);
    }

    public function newProduct(){
        $categories= Category::all();
        return view("product.new",[
            'categories'=>$categories
        ]);    }


    public function saveProduct(Request $request){
        $request->validate([

            "product_name"=>"required|min:1|string",
            "product_description"=>"required|min:1|string",
            "price"=>"required",
            "sale_price"=>"required",
            "status"=>"required",
            "ingredient"=>"required|min:1|string"
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
            "status.required"=>"Cho cửa hàng biết của bánh",
            "ingredient"=>"thành phần không được để trống...",
            "ingredient.min"=>"thành phần phải trên 6 kí tự",
            "ingredient.string"=>"thành phần phải là kiểu chuỗi",
        ]);
        try {
//            dd(flo($request->get("price")));
            Products::create([
                "product_name"=>$request->get("product_name"),
                "category_id"=>$request->get("category_id"),
                "product_description"=>$request->get("product_description"),
                "price"=>(float) $request->get("price"),
                "sale_price"=>(float)$request->get("sale_price"),
                "status"=>$request->get("status"),
                "ingredient"=>$request->get("ingredient"),

            ]);
            return  redirect()->to("admin/product/listProduct")->with("thongbao","Thêm sản phẩm thành công");
        }catch (\Exception $exception){
            return redirect()->back("admin/product/newProduct");
        }
    }
}
