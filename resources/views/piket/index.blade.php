@extends('layouts.app')
@section('pageTitle','Jadwal Piket Siswa')
@section('title','Jadwal Piket')
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
                    <h5>Jadwal Piket</h5>
                    <p>{{ now()->format('d,M Y') }}</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('piket.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i>Tambah Jadwal
                Piket</a>
            <div class="section-title">Data Piket</div>
            <div class="table-responsive">
                <table class="table table-sm" id="myTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach ($pikets as $piket)
                        <tr>
                        @if($piket->siswa->rayon->nama_rayon == auth()->user()->nama_rayon)
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $piket->siswa->nis }}</td>
                            <td>{{ $piket->siswa->nama }}</td>
                            <td>{{ $piket->hari }}</td>
                            <td>
                                <a href="{{ route('piket.edit', $piket->id) }}" class="btn btn-info"><i
                                        class="fas fa-edit"></i>Edit</a>
                                <form action="{{ route('piket.destroy', $piket->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
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
@section('datatable')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endsection
