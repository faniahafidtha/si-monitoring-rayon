@extends('layouts.app')
@section('pageTitle','kegiatan')
@section('title','kegiatan')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>kegiatan</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('kegiatan.pdf') }}" target="_blank" class="btn btn-success">EXPORT PDF</a>
            <div class="section-title">Data Kegiatan</div>
            <div class="table-responsive">
                <table class="table table-sm">
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
            </div>
        </div>
    </div>
</div>
@endsection
