<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upit broj 33</title>
  <style>
    .container {
      width: 100%;
      font-family: Arial
    }

    .content {
      margin: 10px auto;
      max-width: 900px;
      color: #333;
      font-weight: semi-bold
    }

    .user_info {
      display: inline-block;
      min-width: 80px;
    }

    .m-top {
      margin-top: 40px
    }

    table {
      width: 100%;
      min-width: 300px;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    th {
      background-color: #f5f5f5;
    }

    h3 {
      background-color: #999;
      align-items: center;
      color: #FFF;
      padding: 15px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="content">
      <h3>UPIT: #{{$order->id}}</h3>
      <b>
        <p>Podaci o pošiljaocu</p>
      </b>
      <div>
        <p><span class="user_info">Ime:</span> {{$order->billing_name}}</p>
        <p><span class="user_info">e-mail:</span> {{$order->billing_email}}</p>
        <p><span class="user_info">Telefon:</span> {{$order->billing_phone}}</p>
        <p><span class="user_info">Adresa:</span> {{$order->billing_address}}, {{$order->billing_postalCode}}, {{$order->billing_city}}</p>
        <b>
          <p class="m-top">Lista za upit</p>
        </b>
        <div>
          <table>
            <tr>
              <th>Artikal</th>
              <th>Cijena</th>
              <th>Količina</th>
            </tr>
            @foreach($order->products as $product)
            <tr>
              <td>{{ $product->name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->pivot->quantity }}</td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>