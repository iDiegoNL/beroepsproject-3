<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Address;
use Auth;
use Cart;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Mail;

class AfrekenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the page where the user enters or edits their address.
     *
     * @return \Illuminate\Http\Response
     */
    public function adres()
    {
        return view('order.adres');
    }

    /**
     * Store the address that the user provided in the adres function.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdres(Request $request)
    {
        $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'adres' => 'required',
            'postcode' => 'required',
            'stad' => 'required',
            'provincie' => 'required',
            'land' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->voornaam = $request->voornaam;
        $user->achternaam = $request->achternaam;
        $user->save();

        Address::updateOrCreate(
            ['user_id' => Auth::id(), 'adres' => $request->adres, 'postcode' => $request->postcode, 'stad' => $request->stad, 'provincie' => $request->provincie, 'land' => 'Nederland']
        );

        return redirect(route('afrekenen.bezorgmoment'));
    }

    public function bezorgMoment()
    {
        return view('order.bezorgmoment');
    }

    /**
     * Show the confirmation page that let's the user see and confirm that the order is correct.
     *
     * @param $dag
     * @return \Illuminate\Http\Response
     */
    public function confirmation($dag)
    {
        echo Cart::getContent();
        return view('order.confirmation', ['bezorgdag' => $dag]);
    }

    /**
     * Place the order
     *
     * @param $dag
     * @return \Illuminate\Http\Response
     */
    public function order($dag)
    {
        $order = new Order;

        $order->klant_id = Auth::id();
        $order->artikelen = Cart::getContent()->toJson();
        $order->subtotaal = Cart::getSubTotalWithoutConditions();
        $order->totaal = Cart::getTotal();
        $order->btw = Cart::getTotal() - Cart::getSubTotalWithoutConditions();
        $order->bezorgdag = $dag;

        $order->save();

        $order = Order::findOrFail($order->id);

        Mail::to(User::find($order->klant_id)->value('email'))->send(new OrderPlaced($order));
        return redirect(route('afrekenen.factuur', ['id' => $order->id]));
    }

    public function testZooi()
    {
        $data = Order::find(1);
        $artikelen = Order::find(1)->value('artikelen');
        $artikelen = json_decode($artikelen);

        foreach ($artikelen as $artikel) {
            echo $artikel->name;
            echo '<br>';
        }

        $pdf = PDF::loadView('factuur', compact('artikelen'), compact('data'));
        return $pdf->stream();
    }
}
