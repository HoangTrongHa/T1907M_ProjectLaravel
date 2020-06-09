<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {            $categories = DB::table("categories")->get();
//        dd(Auth::user());
        if (Auth::user()->role == 1) {
            return view("index",
                [
                    "categories" => $categories
                ]);
        }
        return view("fontend.home",[
            "categories" => $categories
        ]);
    }
}
