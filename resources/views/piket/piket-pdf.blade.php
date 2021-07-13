<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Piket</title>
</head>
<body>
    <center>
        <h2>SMK Wikrama Bogor</h2>
        <h3>Tahun Pelajaran 2021/2022</h3>
        <h2>Data Jadwal Piket</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Rombel</th>
                <th scope="col">Rayon</th>
                <th scope="col">Hari</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach -->
            @foreach ($pikets as $piket)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $piket->siswa->nis }}</td>
                <td>{{ $piket->siswa->nama }}</td>
                <td>{{ $piket->siswa->rombel }}</td>
                <td>{{ $piket->siswa->rayon->nama_rayon }}</td>
                <td>{{ $piket->hari }}</td>
            </tr>
            @endforeach
            <!-- endforeach -->
        </tbody>
    </table>
</body>
</html>
