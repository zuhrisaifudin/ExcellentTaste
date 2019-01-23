<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <ul>
            <li>{{ $reservation->user->name }}</li>
            <li>{{ $reservation->user->address }}</li>
            <li>{{ $reservation->user->phone }}</li>
        </ul>
        <ul>
            <li>Excellent Taste</li>
            <li>Grote Markt 12, 8011 LW ZWOLLE</li>
            <li>0591-272012</li>
        </ul>
        <ul>
            <li>Datum: {{ $reservation->date_string }}</li>
            <li>Start: {{ $reservation->tables->first()->start_time }}</li>
            <li>Start: {{ $reservation->tables->first()->end_time }}</li>
        </ul>
        <table>
            <thead>
                <tr>
                    <td>Product</td>
                    <td>Hoeveelheid</td>
                    <td>Betaalt</td>
                </tr>
            </thead>
            @foreach($reservation->orders as $order)
                <tr>
                    @foreach($order->products as $product)
                        <td>{{ $product->name }}</td><td>{{ $product->pivot->amount }}</td><td>{{ $product->pivot->payed }}</td>
                    @endforeach
                </tr>
            @endforeach
            <tr>
                <td colspan="2">totaal:</td><td>{{ $reservation->total_price }}</td>
            </tr>
        </table>
    </body>
</html>