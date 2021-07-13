@extends('layouts.app')
@section('pageTitle','Siswa')
@section('title','Siswa')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Siswa</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="section-title">Data Siswa Rayon {{ auth()->user()->nama_rayon }}</div>
            <div class="table-responsive">
                <table class="table table-sm" id="data-siswa">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Rombel</th>
                            <th scope="col">Rayon</>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach ($siswas as $siswa)
                        <tr>
                            @if ($siswa->rayon->nama_rayon == auth()->user()->nama_rayon)
                                <td>{{ $loop->iteration + $siswas->firstItem() -1 . '.'}}</td>
                                {{-- @foreach ($rayon as $ray)
                                    <td>{{ $ray->siswas}}</td>
                                @endforeach --}}
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->rombel }}</td>
                                <td>{{ $siswa->rayon->nama_rayon }}</td>
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
        $(document).ready( function () {
            $('#data-siswa').DataTable();
        } );
    </script>
@endsection
