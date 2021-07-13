<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kumpul Export PDF</title>
</head>
<body>
    <center>
        <h2>SMK Wikrama Bogor</h2>
        <h3>Tahun Pelajaran 2021/2022</h3>
        <h2>Data Jadwal Kumpul Rayon</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Hari</th>
                <th scope="col">Jam</th>
                <th scope="col">Rayon</th>
            </tr>
        </thead>
        <tbody>

        <!-- foreach -->
        @foreach ($kumpuls as $kumpul)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kumpul->tanggal }}</td>
                <td>{{ $kumpul->hari }}</td>
                <td>{{ $kumpul->jam }}</td>
                <td>{{ $kumpul->user->nama_rayon }}</td>
            </tr>
            @endforeach
        <!-- endforeach -->

        </tbody>
        </table>
</body>
</html>
