<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    Approach Number 1
//
//    $counter = rand(1,20);
//    $products = Product::skip($counter)->take(5)->get();
//
//    Approach Number 2

        $products = Product::inRandomOrder()->take(4)->get();
        //dd($products);
        return view('index',compact('products'));
    }
}
