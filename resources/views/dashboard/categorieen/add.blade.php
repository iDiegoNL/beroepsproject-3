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
            Categorieën
            <small>Nieuwe categorie toevoegen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-folder-plus"></i> Categorieën</a></li>
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
                <h3 class="box-title">Nieuwe Categorie</h3>
            </div>
            <form role="form" method="post" action="{{ route('dashboard.categorieen.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" id="naam" name="naam" placeholder="Naam" required
                               autofocus>
                    </div>
                    <!-- TODO: Image upload fixen voor categorie en productfoto's -->
                    <!-- Temp fix: Placeholder foto met ingevulde input -->
                    <div class="form-group">
                        <label for="image">Categoriefoto</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="URL" required
                               autofocus>
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
                    id: 'default',
                    text: 'Selecteer een categorie'
                },
                language: "nl"
            });

            $('.subcategory').select2({
                placeholder: {
                    id: 'default',
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
                    id: 'default',
                    text: 'Selecteer een code'
                },
                language: "nl"
            });

        });
    </script>
@endsection