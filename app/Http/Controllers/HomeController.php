<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $categories = DB::table("categories")->get();
//        return view('components.pm',[
//            "categories"=>$categories
//        ]);
//        return view('home');
        $categories = DB::table("categories")->get();
        return view('fontend.home',[
            "categories" => $categories
        ]);
    }
    public function details(String $dataid ){
        $categories = DB::table("categories")->get();
        $detail = DB::table("products")->get();
        $data = Products::find($dataid);//lay ra du lieu theo id

//        dd($data);

        return view("fontend.details",[
            "categories" => $categories,
            "detail" => $data
        ]);
    }
    public function addToCart(){
        if (Auth::check()) {
            return view("fontend.addToCart");
        }
       return redirect("/register");
    }
    public function list(String $cat){
        $categories = DB::table("categories")->get();
        $products = DB::table('products')->where('category_id', $cat)->get();
        return view("fontend.list",[
            "categories" => $categories,
            "products" => $products
        ]);
    }
}
