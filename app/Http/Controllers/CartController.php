<?php

namespace App\Http\Controllers;

use App\Product;
use function foo\func;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    public function add($slug)
    {

        $product = Product::where('slug',$slug)->first();
        $duplicate = Cart::search(function ($cartItem,$rowId) use ($product)
        {
            return $cartItem->id === $product->id;
        });
        if($duplicate->isNotEmpty())
        {

            $data= ['success' => "Item is already added"];
            return back()->with($data);
        }
        else
        {
            Cart::add($product->id,$product->name,1,$product->price)->associate('Product');
            $data= ['success' => "Item Inserted Successfully"];
            return back()->with($data);

        }

    }
    public function remove($rowId)
    {

        Cart::remove($rowId);
        return back()->with('success','Item Removed from Cart!');

    }

    public function destroy()
    {

        Cart::destroy();
        return back();

    }

    public function saveForLater($rowId)
    {


        $product = Cart::get($rowId);
        Cart::remove($rowId);
        $duplicate = Cart::instance('saveforlater')->search(function ($cartItem,$rowId) use ($product)
        {
            return $cartItem->id === $product->id;
        });
        if($duplicate->isNotEmpty())
        {

            $data= ['success' => "Item is already saved"];
            return back()->with($data);
        }
        else
        {
            Cart::instance('saveforlater')->add($product->id,$product->name,1,$product->price)->associate('Product');
            $data= ['success' => "Item Inserted Successfully"];
            return back()->with($data);

        }

    }

    public function removeSaveForLater($rowId)
    {

        Cart::instance('saveforlater')->remove($rowId);
        $data= ['success' => "Item Removed from Saved Items"];
        return back()->with($data);
    }

    public function update(Request $request)
    {

        //return $request->all();
        //return $rowId.'___'.$qty;
        $rowId = $request->rowId;
        $quantity = $request->qty;
        Cart::update($rowId,$quantity);
        $total = Cart::total();
        $sub_total = Cart::subtotal();
        $tax = Cart::tax();
        return Response::json(['status'=>'success','result'=>'Quantity Updated to'.$quantity,
            'data'=>['total'=>$total,'sub_total'=>$sub_total,'tax'=>$tax]]);

    }

}
