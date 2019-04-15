@extends('dashboard.layouts.app')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('dashboard/css/alt/AdminLTE-select2.min.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Aanbiedingen
            <small>Nieuwe aanbieding toevoegen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-plus-circle"></i> Aanbiedingen</a></li>
            <li class="active">Nieuw</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Er ging iets mis.</h4>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Nieuwe Aanbieding</h3>
            </div>
            <form role="form" method="post" action="{{ route('dashboard.aanbiedingen.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form group">
                        <label for="ean">Product</label>
                        <select class="ean form-control" id="ean" name="ean" required>
                            <option value="default"></option>
                            @foreach(\App\Product::all() as $product)
                                <option value="{{ $product->ean }}">{{ $product->naam }} ({{ $product->ean }})</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form group">
                        <label for="prijs">Prijs</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                            <input type="text" class="form-control" placeholder="Prijs" maxlength="13"
                                   id="price" name="price" required>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('dashboard.categorieen.overzicht') }}">Annuleren</a>
                    <button type="submit" class="btn btn-primary pull-right">Categorie Toevoegen</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/lang/summernote-nl-NL.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/nl.js"></script>

    <script>
        $(document).ready(function () {
            $('.ean').select2({
                placeholder: {
                    id: 'default',
                    text: 'Selecteer een categorie'
                },
                language: "nl"
            });
        });
    </script>
@endsection