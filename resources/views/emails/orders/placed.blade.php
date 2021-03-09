<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upit broj 33</title>
  <style>
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <div style="width: 100%; font-family: Arial">
    <div style="margin: 10px auto; max-width: 900px; color: #333; font-weight: semi-bold">
      <h3 style="background-color: #999; align-items: center; color: #FFF; padding: 15px;">UPIT: #{{$order->id}}</h3>
      <b>
        <p>Podaci o pošiljaocu</p>
      </b>
      <div>
        <p><span style="display: inline-block; min-width: 80px;">Ime:</span> {{$order->billing_name}}</p>
        <p><span style="display: inline-block; min-width: 80px;">e-mail:</span> {{$order->billing_email}}</p>
        <p><span style="display: inline-block; min-width: 80px;">Telefon:</span> {{$order->billing_phone}}</p>
        <p><span style="display: inline-block; min-width: 80px;">Adresa:</span> {{$order->billing_address}}, {{$order->billing_postalCode}}, {{$order->billing_city}}</p>
        <b>
          <p style="margin-top: 40px">Lista za upit</p>
        </b>
        <div>
          <table style="width: 100%; min-width: 300px; border-collapse: collapse;">
            <tr>
              <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f5f5f5;">Artikal</th>
              <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f5f5f5;">Cijena</th>
              <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f5f5f5;">Količina</th>
            </tr>
            @foreach($order->products as $product)
            <tr>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $product->name }}</td>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $product->price }}</td>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $product->pivot->quantity }}</td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>