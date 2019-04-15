@extends('dashboard.layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/datatables.min.css"/>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Producten
            <small>Alle toegevoegde producten</small>
        </h1>
        <!-- Modal -->
        <div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog" aria-labelledby="barcodeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="barcodeModalLabel">Loading EAN Code...</h4>
                    </div>
                    <div class="modal-body" id="eanbody">Loading EAN Code...</div>
                </div>
            </div>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="far fa-boxes"></i> Producten</a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Overzicht</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="{{ route('dashboard.producten.nieuw') }}"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="box-body">
                <table id="producten" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>EAN</th>
                        <th>Naam</th>
                        <th>Prijs</th>
                        <th style="width: 100px">Voorraad Code</th>
                        <th style="width: 100px"></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.0/barcodes/JsBarcode.ean-upc.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#producten').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                },
                dom: 'B<"clear">lfrtip',
                buttons: {
                    name: 'primary',
                    buttons: [ 'copy', 'csv', 'excel', 'print', 'colvis' ]
                },
                "processing": true,
                "serverSide": true,
                ajax: '{!! route('datatables.products') !!}',
                columns: [
                    { data: 'ean', name: 'ean' },
                    { data: 'naam', name: 'naam' },
                    { data: 'prijs', name: 'prijs' },
                    { data: 'voorraadcode', name: 'voorraadcode' },
                    { data: 'action', name: 'action' },
                ]
            } );
        } );

        function showBarcode(ean) {
            $('#barcodeModal').modal('show');
            document.getElementById('barcodeModalLabel').innerHTML = '<b>' + ean + '</b>';
            document.getElementById('eanbody').innerHTML = '<svg class="img-responsive center-block" id="barcode"></svg>';
            JsBarcode("#barcode", ean, {
                format: "EAN13",
            });
        }
    </script>
@endsection