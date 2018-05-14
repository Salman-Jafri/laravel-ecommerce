<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $pagination = 6;

        if(request()->category)
        {

            $products = Product::with('categories')->whereHas('categories',function ($query)
            {
                $query->where('name',request()->category);
            });

        }
        else
        {
            $products = Product::where('featured',true);

        }
        if(request()->sort=='asc')
        {

            $products = $products->orderBy('price')->paginate($pagination);

        }
        elseif(request()->sort=='desc')
        {

            $products = $products->orderBy('price','desc')->paginate($pagination);

        }
        else
        {
            $products = $products->paginate($pagination);
        }


        return view('shop',compact('products','categories'));

    }

    public function show($slug)
    {
        $single_product = Product::where('slug',$slug)->firstOrfail();
        $products = Product::where('slug','!=',$slug)->inRandomOrder()->take(3)->get();
        //dd($product);
        return view('single',compact('single_product','products'));
    }

    public function search(Request $request)
    {
        //dd($request->all());
        $query = $request->search;
        $products = Product::where('name','LIKE','%'.strtolower($query).'%')->paginate(8);
        $data = ['products'=>$products,'success'=>"Search Results for '".$query."'"];
        return view('shop')->with($data);

    }

}
