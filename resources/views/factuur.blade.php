<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bestelling</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td valign="top"></td>
        <td align="right">
            <h3>Bani Supermarkt</h3>
            <pre>
                Bani
                Arena 301
                1213NW, Hilversum
            </pre>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>Van:</strong>
            <br>
            Bani Supermarkt
            <br>
            Arena 301
            <br>
            1213NW, Hilversum
        </td>
        <td>
            <strong>Naar:</strong>
            <br>
            {{ App\User::find($data->klant_id)->value('voornaam') }} {{ App\User::find($data->klant_id)->value('achternaam') }}
            <br>
            {{ App\Address::where('user_id', $data->klant_id)->value('adres') }}
            <br>
            {{ App\Address::where('user_id', $data->klant_id)->value('postcode') }} {{ App\Address::where('user_id', $data->klant_id)->value('stad') }}
        </td>
    </tr>

</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>EAN</th>
        <th>Naam</th>
        <th>Aantal</th>
        <th>Prijs Per Stuk</th>
        <th>Totaal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($artikelen as $artikel)
        <tr>
            <th scope="row">{{ $artikel->id }}</th>
            <td>{{ ucfirst($artikel->name) }}</td>
            <td>{{ $artikel->quantity }}</td>
            <td align="right">&euro; {{ str_replace('.', ',', $artikel->price) }}</td>
            <td align="right">&euro; {{ str_replace('.', ',', $artikel->quantity * $artikel->price) }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td align="right">Subtotaal</td>
        <td align="right">&euro; {{ $data->subtotaal }}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">BTW</td>
        <td align="right">&euro; {{ round($data->btw, 2) }}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Totaal</td>
        <td align="right" class="gray">&euro; {{ round($data->totaal, 2) }}</td>
    </tr>
    </tfoot>
</table>

</body>
</html>