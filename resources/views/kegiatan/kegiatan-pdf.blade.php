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
        <h2>SMK Wikrama Bogor</h2>
        <h3>Tahun Pelajaran 2021/2022</h3>
        <h2>Data Kegiatan</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Rayon</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jenis Kegiatan</th>
                <th scope="col">Peserta</th>
                <th scope="col">Hari</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach -->
            @foreach ($kegiatans as $kegiatan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th>{{ $kegiatan->rayon->nama_rayon }}</th>
                <td>{{ $kegiatan->nama }}</td>
                <td>{{ $kegiatan->deskripsi }}</td>
                <td>{{ $kegiatan->jenis_kegiatan }}</td>
                <td>
                    @foreach ($kegiatan->pesertas as $peserta)
                        <p>
                            {{ $peserta->peserta->nama }}
                        </p>
                    @endforeach
                </td>
                <td>{{ $kegiatan->hari }}</td>
            </tr>
            @endforeach
            <!-- endforeach -->
        </tbody>
    </table>
</body>
</html>
