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
            <a href="{{ route('piket.pdf') }}" target="_blank" class="btn btn-success">EXPORT PDF</a>
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
                            <th scope="col">Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach ($pikets as $piket)
                        <tr>
                            <th scope="row">{{ $nomor++ }}</th>
                            <td>{{ $piket->siswa->nis }}</td>
                            <td>{{ $piket->siswa->nama }}</td>
                            <td>{{ $piket->siswa->rombel }}</td>
                            <td>{{ $piket->siswa->rayon->nama_rayon}}</td>
                            <td>{{ $piket->hari }}</td>
                        </tr>
                        @endforeach
                        <!-- endforeach -->
                    </tbody>
                </table>
            </div>
@endsection
@section('datatable')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
@endsection
