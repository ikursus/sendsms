<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Senarai SMS</title>
</head>
<body>

    <table style="width: 100%; padding: 10px; border: solid 1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>PENGIRIM</th>
                <th>PENERIMA</th>
                <th>MESSAGE</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senarai_sms as $sms)

            <tr>
                <td>{{ $sms->id }}</td>
                <td>{{ $sms->user->name }}</td>
                <td>{{ $sms->penerima }}</td>
                <td>{{ $sms->message }}</td>
                <td>{{ $sms->status }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
    
</body>
</html>