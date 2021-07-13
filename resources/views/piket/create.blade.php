@extends('layouts.app')
@section('pageTitle','Jadwal Piket')
@section('title','Jadwal Piket Siswa')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('piket.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i>    Kembali</a>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Jadwal Piket</h5>
            </div>

            <form action="{{ route('piket.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="siswa">Siswa</label>
                    <div class="col-lg-8">
                        <select class="form-control siswa-select2" name="siswa_id" id="siswa">
                            <option disabled selected>Pilih Siswa</option>
                            @foreach ($siswas as $siswa)
                            @if ($siswa->rayon->nama_rayon == auth()->user()->nama_rayon)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="hari" id="">
                            <option disabled selected>Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary"> <i class="fas fa-check"></i> Selesai</button>
            </div>
            </form>
        </div>
    </div>
@endsection
    @section('select2')
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.siswa-select2').select2();
            });
        </script>
    @endsection
