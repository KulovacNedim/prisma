<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $subject }}</title>
  <style>
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <div style="width: 100%; font-family: Arial">
    <div style="margin: 10px auto; max-width: 900px; color: #333; font-weight: semi-bold">
      <h3 style="background-color: #999; align-items: center; color: #FFF; padding: 15px;">MAIL POSLAN SA KONTAKT FORME</h3>
      <b>
        <p>Podaci o pošiljaocu</p>
      </b>
      <div>
        <p><span style="display: inline-block; min-width: 80px;">Ime:</span> {{ $name }}</p>
        <p><span style="display: inline-block; min-width: 80px;">e-mail:</span> {{ $email }}</p>
        <b>
          <p style="margin-top: 40px">Poruka:</p>
        </b>
        <div>
          <p style="width: 100%; min-width: 300px;">
            {{ $message }}
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>