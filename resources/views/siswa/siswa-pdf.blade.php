<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Data Siswa</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach -->
            @foreach ($siswas as $siswa)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->rombel }}</td>
                <td>{{ $siswa->rayon->nama_rayon }}</td>
            </tr>
            @endforeach
            <!-- endforeach -->
        </tbody>
    </table>
    </center>
</body>
</html>
