<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen Piket Export PDF</title>
</head>

<body>
    <center>
        <h2>SMK Wikrama Bogor</h2>
        <h3>Tahun Pelajaran 2021/2022</h3>
        <h2>Data Absensi Piket Rayon</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Rayon</th>
                <th scope="col">Hari</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            <!-- foreach -->
            @foreach ($absenpikets as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->rayon }}</td>
                <td>{{ $data->hari }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->kehadiran }}</td>
            </tr>
            @endforeach
            <!-- endforeach -->

        </tbody>
    </table>
</body>

</html>
