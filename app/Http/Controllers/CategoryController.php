<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $category = DB::table("categories")->get();
//        $cakecategory = cakecategory::paginate(20);
//        $cakecategory = DB::table("cakecategory")->get();
//        $cakecategory = cakecategory::paginate(20);
        return view("category.list",
            [
                "category" => $category
            ]);
    }
    public function list()
    {
        $category = DB::table("categories")->get();
//        dd(count($category));
//        $cakecategory = cakecategory::paginate(20);
//        $cakecategory = DB::table("cakecategory")->get();
//        $cakecategory = cakecategory::paginate(20);
//        dd($category[2]->name);
        return view("components.leftsidebar",
            [
                "categories" => $category
            ]);
    }
    public function newcatrgory(){

        $categories = DB::table("categories")->get();
        return view('category.new',[
            "categories"=>$categories
        ]);
    }
    public function viewList(){

        $categories = DB::table("categories")->get();
        return view('category.viewlist',[
            "data"=>$categories
        ]);

    }
    public function saveCategory(Request $request)
    {
        try {
//            dd($request->get('name'));
            $data = new Category([
                'name' => $request->get('name'),
                'description'=>$request->get('description'),
                'image'=>$request->get('image')

            ]);
            $data->save();
            return redirect()->to("/admin/type-product/listCategory");
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }
    public function deleteCategory(String $dataid){
        try {
            $data = Category::find($dataid)->delete();
//            dd($data);
//            dd(\App\Models\Category::all());
//            dd(\App\Models\News::all());
//            dd(Category::destroy($dataid));
//            dd($categories);
            return redirect('/admin/type-product/listCategory');
//            $categories = DB::table("categories")->get();
//            return view('category.viewlist',[
//                "data"=>$categories
//            ]);
        }catch (\Exception $e){

        }
    }
}
