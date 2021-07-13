@extends('layouts.app')
@section('pageTitle','Data prestasi')
@section('title','Data prestasi')
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
                    <h5>prestasi</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('prestasi.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah prestasi</a>
            <div class="section-title">Data prestasi</div>
            <div class="table-responsive">
                <table class="table table-sm" id="myTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Prestasi</th>
                            <th scope="col">Deskripsi Prestasi</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach ($prestasis as $prestasi)
                            @foreach ($prestasi->siswas as $siswa)
                                <tr>
                                @if($siswa->siswa->rayon->nama_rayon == auth()->user()->nama_rayon)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prestasi->nama_prestasi }}</td>
                                <td>{{ $prestasi->deskripsi_prestasi }}</td>
                                <td>{{ $siswa->siswa->nama }}</td>
                                <td>
                                    <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i>Edit</a>
                                    <form method="POST" action="{{ route('prestasi.destroy', $prestasi->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"  onclick="return confirm('Yakin Mau Hapus?')"><i class="fas fa-trash"></i>Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
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
