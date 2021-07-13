@extends('layouts.app')
@section('pageTitle','kegiatan')
@section('title','kegiatan')
@section('content')
<div class="container-fluid">
    <a href="{{ route('kegiatan.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5>Edit kegiatan</h5>
        </div>
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="card-body">
                    <div class="form-group row">
                    {{-- <label class="col-sm-2 col-form-label" for="rayon">Rayon</label> --}}
                    <div class="col-lg-8">
                        <select class="form-control" name="rayon_id" id="rayon" hidden>
                            <option disabled selected>Pilih Rayon</option>
                            @foreach ($rayons as $rayon)
                                <option {{ $rayon->nama_rayon == auth()->user()->nama_rayon ? 'selected' : '' }} value="{{ $rayon->id }}" readonly>{{ $rayon->nama_rayon }}</option>
                            @endforeach
                        </select>

                        @error('rayon_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="nama" value="{{ $kegiatan->nama }}">
                        @error('nama')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                    <div class="col-lg-8">
                        <textarea cols="30" rows="10" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                            placeholder="deskripsi kegiatan">{{ $kegiatan->deskripsi }}</textarea>
                        @error('deskripsi')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kegiatan</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="jenis_kegiatan">
                            <option disabled selected>Pilih Satu</option>
                            <option {{ $kegiatan->jenis_kegiatan == 'sosial' ? 'selected="selected"' : '' }} value="sosial">Sosial</option>
                            <option {{ $kegiatan->jenis_kegiatan == 'keagamaan' ? 'selected="selected"' : '' }} value="keagamaan">Keagamaan</option>
                        </select>
                        @error('jenis_kegiatan')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Peserta</label>
                    <div class="col-lg-8">
                        <select class="form-control peserta-multiple" name="peserta[]" multiple="multiple">
                            @foreach ($kegiatan->pesertas as $peserta)
                                <option {{ $peserta->peserta->nama ? 'selected' : '' }} value="{{$peserta->peserta->id}}">{{ $peserta->peserta->nama }}</option>
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="hari">Hari</label>
                    <div class="col-lg-8">
                        <input type="date" name="hari" class="form-control @error('hari') is-invalid @enderror" id="hari" value="{{ $kegiatan->hari }}">
                        @error('hari')
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
            $('.peserta-multiple').select2();
        });
    </script>
@endsection
