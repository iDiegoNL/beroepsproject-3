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
            Producten
            <small>Nieuw product toevoegen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-parachute-box"></i> Producten</a></li>
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
                <h3 class="box-title">Nieuw Product</h3>
            </div>
            <form role="form" method="post" action="{{ route('dashboard.producten.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Productnaam</label>
                        <input type="text" class="form-control" id="naam" name="naam" placeholder="Naam" required
                               autofocus>
                    </div>
                    <div class="form-group">
                        <label for="foto">Productfoto</label>
                        <input type="text" class="form-control" id="foto" name="foto" placeholder="Productfoto"
                               value="https://static.ahold.com/image-optimization/cmgtcontent/media//000998200/000/000998216_003_127393_708.jpg"
                               required>
                    </div>
                    <div class="form group">
                        <label for="ean">EAN</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                            <input type="number" class="form-control" placeholder="EAN Nummer" maxlength="12" id="ean"
                                   name="ean" required>
                        </div>
                        <br>
                    </div>
                    <div class="form group">
                        <label for="prijs">Prijs</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                            <input type="text" class="form-control" placeholder="Prijs" maxlength="13"
                                   id="prijs" name="prijs" required>
                        </div>
                        <br>
                    </div>
                    <div class="form group">
                        <label for="categorie_id">Categorie</label>
                        <select class="category form-control" id="categorie_id" name="categorie_id" required>
                            <option value="0"></option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->naam }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form group">
                        <label for="subcategorie">Subcategorie (optioneel)</label>
                        <select class="subcategory form-control" id="subcategorie" name="subcategorie">
                            <option value="0"></option>
                            @foreach(\App\SubCategory::all() as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->naam }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" required>
                    </div>
                    <div class="form group">
                        <label for="gewicht">Gewicht</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Gewicht" id="gewicht" name="gewicht"
                                   min="0" value="0">
                            <span class="input-group-addon">g</span>
                        </div>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="name">Aantal</label>
                        <input type="number" class="form-control" id="aantal" name="aantal" placeholder="Aantal"
                               min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label for="korteomschrijving">Korte Omschrijving</label>
                        <textarea class="form-control" name="korteomschrijving" id="korteomschrijving"
                                  required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="omschrijving">Omschrijving</label>
                        <textarea class="form-control" name="omschrijving" id="omschrijving" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ingredienten">Ingrediënten (optioneel)</label>
                        <textarea class="form-control" name="ingredienten" id="ingredienten"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="allergieinfo">Allergie-informatie (optioneel)</label>
                        <textarea class="form-control" name="allergieinfo" id="allergieinfo"></textarea>
                    </div>
                    <div class="form group">
                        <label for="kenmerken">Kenmerken (optioneel)</label>
                        <select class="kenmerken form-control" id="kenmerken" name="kenmerken" required>
                            <option value="default"></option>
                            <option value="Biologisch">Biologisch</option>
                            <option value="Vegan">Vegan</option>
                            <option value="Biologisch & Vegan">Biologisch & Vegan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gebruik">Gebruik (optioneel)</label>
                        <textarea class="form-control" name="gebruik" id="gebruik"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gebruik">Bewaren</label>
                        <textarea class="form-control" name="bewaren" id="bewaren" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="oorsprong">Land van Oorsprong</label>
                        <input type="text" class="form-control" id="oorsprong" name="oorsprong"
                               placeholder="Land van Oorsprong" required>
                    </div>
                    <div class="form group">
                        <label for="voorraadcode">Voorraadcode</label>
                        <select class="voorraadcode form-control" id="voorraadcode" name="voorraadcode" required>
                            <option value="0"></option>
                            <option value="111">111 (Normaal Product)</option>
                            <option value="666">666 (Terugroepactie)</option>
                            <option value="999">999 (Uit assortiment of ernstige terugroepactie)</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('dashboard.producten.overzicht') }}">Annuleren</a>
                    <button type="submit" class="btn btn-primary pull-right">Product Toevoegen</button>
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
            $('.summernote').summernote({
                lang: 'nl-NL',
                toolbar: [
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'hr', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['misc', ['fullscreen']],
                    ['misc', ['codeview']],
                    ['misc', ['undo', 'redo']],
                ],
                disableDragAndDrop: true
            });

            $('.category').select2({
                placeholder: {
                    id: '0',
                    text: 'Selecteer een categorie'
                },
                language: "nl"
            });

            $('.subcategory').select2({
                placeholder: {
                    id: '0',
                    text: 'Selecteer een subcategorie'
                },
                language: "nl"
            });

            $('.kenmerken').select2({
                placeholder: {
                    id: 'default',
                    text: 'Selecteer een kenmerk'
                },
                language: "nl"
            });

            $('.voorraadcode').select2({
                placeholder: {
                    id: '0',
                    text: 'Selecteer een code'
                },
                language: "nl"
            });

        });
    </script>
@endsection