<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('checkout');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        //
        //dd($request->all());

        $contents = Cart::content()->map(function ($item)
        {
            return $item->name.', '.$item->qty;
        })->values()->toJson();

        try
        {

            Stripe::setApiKey("sk_test_vFMbw9CodcOPCIwWxjYL75ff");

            $charge = Stripe::charges()->create([

                'amount' => Cart::total(),
                'currency' => 'PKR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' =>$request->email,
                'metadata' => [

                    'contents' => $contents,
                    'quantity' => Cart::count()

                ],


            ]);

            Cart::instance('default')->destroy();
            return back()->with('success','Thank you! Your payment has been successfully accepted!');
        }
        catch (CardErrorException $e)
        {
            //dd($e->getMessage());
            return back()->withErrors($e->getMessage());
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
