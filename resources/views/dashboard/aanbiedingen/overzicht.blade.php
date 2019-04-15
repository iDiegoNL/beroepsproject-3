@extends('dashboard.layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/datatables.min.css"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Aanbiedingen
            <small>Alle toegevoegde aanbiedingen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-badge-percent"></i> Aanbiedingen</a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Overzicht</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="{{ route('dashboard.categorieen.nieuw') }}">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table id="producten" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Product</th>
                        <th>Originele Prijs</th>
                        <th>Nieuwe Prijs</th>
                        <th>Laatste Aanpassing</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Aanbiedingen::all() as $aanbieding)
                        <tr>
                            <th>{{ $aanbieding->id }}</th>
                            <th>{{ \App\Product::where('ean', $aanbieding->product_id)->value('naam') }}</th>
                            <th>&euro; {{ \App\Product::where('ean', $aanbieding->product_id)->value('prijs') }}</th>
                            <th>&euro; {{ $aanbieding->new_price }}</th>
                            <th>{{ $aanbieding->updated_at }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection