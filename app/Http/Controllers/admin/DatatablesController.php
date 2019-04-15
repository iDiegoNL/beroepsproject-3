<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Product;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class DatatablesController extends Controller
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

    public function products()
    {
        return Datatables::of(Product::query())
            ->editColumn('ean', 'dashboard.datatables.ean')
            ->editColumn('prijs', '€ {{ $prijs }}')
            ->editColumn('voorraadcode', 'dashboard.datatables.voorraadcode')
            ->addColumn('action', 'dashboard.datatables.action')
            ->escapeColumns([])
            ->make(true);
    }
}
