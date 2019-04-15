@extends('dashboard.layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/datatables.min.css"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subcategorieën
            <small>Alle toegevoegde subcategorieën</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-folder-open"></i> Subcategorieën</a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Overzicht</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="{{ route('dashboard.subcategorieen.nieuw') }}">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table id="producten" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Naam</th>
                        <th>Categorie</th>
                        <th>Subcategoriefoto</th>
                        <th>Aantal Producten</th>
                        <th>Laatste aanpassing</th>
                        <th>Actie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\SubCategory::all() as $subcategory)
                        <tr>
                            <th>{{ $subcategory->id }}</th>
                            <th>{{ $subcategory->naam }}</th>
                            <th>{{ \App\Category::where('id', $subcategory->category_id)->value('naam') }}</th>
                            <th>
                                <a href="{{ route('welcome') }}/images/categories/{{ $subcategory->image }}"
                                   target="_blank">{{ route('welcome') }}/images/categories/{{ $subcategory->image }}</a>
                            </th>
                            <th>{{ \App\Product::where('subcategorie_id', $subcategory->id)->count() }} product(en)</th>
                            <th>{{ $subcategory->created_at }}</th>
                            <th>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Bewerken</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('welcome') }}/producten/{{ strtolower(str_replace(' ', '-', (str_replace(',', '', $subcategory->naam)))) }}/{{ $subcategory->id }}"
                                               target="_blank">Bekijken</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Verwijderen</a></li>
                                    </ul>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection