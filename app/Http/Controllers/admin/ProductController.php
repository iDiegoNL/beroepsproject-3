<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.producten.overzicht');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.producten.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ean' => 'required|unique:products|max:12',
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
            'ingredienten' => 'nullable',
            'allergieinfo' => 'nullable',
            'kenmerken' => 'required',
            'gebruik' => 'nullable',
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

        return redirect()->route('dashboard.producten.overzicht');
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
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
