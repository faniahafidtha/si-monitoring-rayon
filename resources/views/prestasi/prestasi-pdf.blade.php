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
        <h2>Data Prestasi Siswa</h2>
    </center>
    <hr>
    <table border="1" padding="0" margin="0" align="center" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Prestasi</th>
                <th scope="col">Deskripsi Prestasi</th>
                <th scope="col">Siswa</th>
                <th scope="col">Rayon</th>
            </tr>
        </thead>
        <tbody>
            <!-- foreach -->
            @foreach ($prestasis as $prestasi)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $prestasi->nama_prestasi }}</td>
                <td>{{ $prestasi->deskripsi_prestasi }}</td>
                <td>
                    @foreach ($prestasi->siswas as $siswa)
                        <p>
                            {{ $siswa->siswa->nama }}
                        </p>
                    @endforeach
                </td>
                <td>
                    @foreach ($prestasi->siswas as $siswa)
                        <p>
                            {{ $siswa->siswa->rayon->nama_rayon }}
                        </p>
                    @endforeach
                </td>
            </tr>
            @endforeach
            <!-- endforeach -->
        </tbody>
    </table>
</body>
</html>
