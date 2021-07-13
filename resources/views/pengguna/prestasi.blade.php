@extends('layouts.app')
@section('pageTitle','Data prestasi')
@section('title','Data prestasi')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>prestasi</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('prestasi.pdf') }}" target="_blank" class="btn btn-success">EXPORT PDF</a>
            <div class="section-title">Data prestasi</div>
            <div class="table-responsive">
                <table class="table table-sm" id="myTable">
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('datatable')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endsection
