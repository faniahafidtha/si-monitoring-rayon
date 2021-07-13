<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rayon Export Pdf</title>
</head>
<body>
    <center>
        <h2>SMK Wikrama Bogor</h2>
        <h3>Tahun Pelajaran 2021/2022</h3>
        <h2>Data Rayon</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Rayon</th>
        </tr>
        </thead>
        <tbody>

        <!-- foreach -->
        @foreach ($rayons as $rayon)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $rayon->nama_rayon }}</td>
        </tr>
        @endforeach
        <!-- endforeach -->

        </tbody>
    </table>
</body>
</html>
