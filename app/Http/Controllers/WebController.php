<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")->get();
        return view("index",
            [
               "categories" => $categories
            ]);
    }
}
