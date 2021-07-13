@extends('layouts.app')
@section('pageTitle','kegiatan')
@section('title','kegiatan')
@section('content')
<div class="container-fluid">

    @if(session('notif'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('notif') }}
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>kegiatan</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('kegiatan.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah kegiatan</a>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach ($kegiatans as $kegiatan)
                        <tr>
                            @if ($kegiatan->rayon->nama_rayon == auth()->user()->nama_rayon)
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
                            <td>
                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-info mb-2"><i
                                        class="fas fa-edit"></i>Edit</a>
                                <form method="POST" action="{{ route('kegiatan.destroy', $kegiatan->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mb-2"  onclick="return confirm('Yakin Mau Hapus?')"><i class="fas fa-trash"></i>Hapus</button>
                                </form>
                            </td>
                            @endif
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
