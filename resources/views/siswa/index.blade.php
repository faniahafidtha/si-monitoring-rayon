@extends('layouts.app')
@section('pageTitle','Siswa')
@section('title','Siswa')
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
                    <h5>Siswa</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa-import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Import data excel</label>
                    <div class="col-lg-7">
                        <input type="file" class="form-control @error('siswa_excel') is-invalid @enderror" name="siswa_excel">
                        @error('siswa_excel')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-3 pt-2">
                        <button class="btn btn-sm btn-success"> <i class="fas fa-check"></i>Import</button>
                    </div>
                </div>

            </div>
            </form>
            <a href="{{ route('siswa.export') }}" target="_blank" class="btn btn-success my-3">EXPORT EXCEL</a>
            <a href="{{ route('siswa.pdf') }}" target="_blank" class="btn btn-success my-3">EXPORT PDF</a>
            <a href="{{ route('siswa.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Siswa</a>
            <div class="section-title">Data Siswa</div>
            <div class="table-responsive">
            <table class="table table-sm" id="myTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Rombel</th>
                            <th scope="col">Rayon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- foreach -->
                        @foreach ($siswas as $siswa)
                        <tr>
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->rombel}}</td>
                            <td>{{ $siswa->rayon->nama_rayon }}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-info"><i
                                        class="fas fa-edit"></i>Edit</a>
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                                </form>
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
