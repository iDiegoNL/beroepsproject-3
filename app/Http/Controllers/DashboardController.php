<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DashboardController extends Controller
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

    public function home()
    {
        return view('dashboard.home');
    }

    public function producten()
    {
        return view('dashboard.producten.overzicht');
    }

    public function addProduct()
    {
        return view('dashboard.producten.add');
    }

    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'ean' => 'required|unique:products|max:13',
            'naam' => 'required',
            'merk' => 'required',
            'foto' => 'required',
            'prijs' => 'required',
            'categorie_id' => 'required',
            'subcategorie_id' => 'nullable',
            'gewicht' => 'nullable',
            'aantal' => 'required',
            'korteomschrijving' => 'required',
            'omschrijving' => 'required',
            'ingredienten' => 'required',
            'allergieinfo' => 'nullable',
            'kenmerken' => 'required',
            'gebruik' => 'required',
            'bewaren' => 'required',
            'oorsprong' => 'required',
            'voorraadcode' => 'required',
        ]);

        $product = new Product;

        $product->ean = $request->ean;
        $product->naam = $request->naam;
        $product->merk = $request->merk;
        $product->foto = $request->foto;
        $product->prijs = $request->prijs;
        $product->categorie_id = $request->categorie_id;
        $product->subcategorie_id = $request->subcategorie_id;
        $product->gewicht = $request->gewicht;
        $product->aantal = $request->aantal;
        $product->korteomschrijving = $request->korteomschrijving;
        $product->omschrijving = $request->omschrijving;
        $product->ingredienten = $request->ingredienten;
        $product->allergieinfo = $request->allergieinfo;
        $product->kenmerken = $request->kenmerken;
        $product->gebruik = $request->gebruik;
        $product->bewaren = $request->bewaren;
        $product->oorsprong = $request->oorsprong;
        $product->voorraadcode = $request->voorraadcode;

        $product->save();

        echo 'yass';
    }
}
