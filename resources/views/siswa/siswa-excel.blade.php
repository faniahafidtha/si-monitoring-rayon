<table>
    <thead>
        <tr>
            <th>No</th>
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
