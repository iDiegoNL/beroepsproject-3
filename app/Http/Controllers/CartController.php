<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\BTW;
use \Darryldecode\Cart\CartCondition;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.overview');
    }

    /**
     * Add a product to the cart.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $laagBTW = new CartCondition(array(
            'name' => 'Lage BTW',
            'type' => 'tax',
            'target' => 'total',
            'value' => BTW::where('btwID', 1)->value('btw') . '%',
        ));
        $hoogBTW = new CartCondition(array(
            'name' => 'Hoge BTW',
            'type' => 'tax',
            'target' => 'total',
            'value' => BTW::where('btwID', 2)->value('btw') . '%',
        ));

        $validatedData = $request->validate([
            'ean' => 'required|max:13',
            'aantal' => 'required',
        ]);

        if (Cart::get($request->ean) !== null) {
            if (Cart::get($request->ean)->quantity >= 10) {
                return redirect(route('cart'));
            }
        } else {
            $product = Product::find($request->ean);
            if ($product->btw_id === 1) {
                $btw = $laagBTW;
            } elseif ($product->btw_id === 2) {
                $btw = $hoogBTW;
            }
            Cart::add(array(
                'id' => $request->ean,
                'name' => $product->naam,
                'price' => $product->prijs,
                'quantity' => $request->aantal,
                'attributes' => array(
                    'image' => $product->foto,
                    'weight' => $product->gewicht,
                    'aantal' => $product->aantal
                ),
                'conditions' => $btw
            ));
        }
        return redirect(route('cart'));
    }

    /**
     * Update the specified quantity of an item in the cart.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->input('value') == 'plus') {
            if (Cart::get($request->id)->quantity >= 10) {
                echo 'pakot';
            } else {
                Cart::update($request->id, array(
                    'quantity' => 1
                ));
            }
        } elseif ($request->input('value') == 'minus') {
            Cart::update($request->id, array(
                'quantity' => -1
            ));
        }

        return redirect(route('cart'));
    }

    /**
     * Remove the specified item from the cart.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Cart::remove($request->input('id'));
        return redirect(route('cart'));
    }
}
