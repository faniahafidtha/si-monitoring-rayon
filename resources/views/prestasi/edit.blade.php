@extends('layouts.app')
@section('pageTitle','Edit prestasi')
@section('title','Edit Prestasi')
@section('content')
<div class="container-fluid">
    <a href="{{ route('prestasi.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5>Edit prestasi</h5>
        </div>
        <form action="{{ route('prestasi.update',$prestasi->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama prestasi</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" name="nama_prestasi"
                            placeholder="nama prestasi" value="{{ $prestasi->nama_prestasi }}">
                        @error('nama_prestasi')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi prestasi</label>
                    <div class="col-lg-8">
                        <textarea cols="30" rows="10" type="text" class="form-control @error('deskripsi_prestasi') is-invalid @enderror" name="deskripsi_prestasi"
                            placeholder="deskripsi prestasi">{{ $prestasi->deskripsi_prestasi }}</textarea>
                        @error('deskripsi')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-lg-8">
                        <select class="form-control peserta-select2" name="siswa[]" multiple>
                        @foreach ($prestasi->siswas as $siswa)
                                <option {{ $siswa->siswa->nama ? 'selected' : '' }} value="{{ $siswa->siswa->id}}">{{  $siswa->siswa->nama }}</option>
                            @endforeach
                            @foreach ($siswas as $siswa)
                            @if ($siswa->rayon->nama_rayon == auth()->user()->nama_rayon)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('peserta')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
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
        $(document).ready(function() {
            $('.peserta-select2').select2({
                placeholder : "Pilih Siswa"
            });
        });
    </script>
@endsection
