@extends('layouts.app')
@section('pageTitle','siswa')
@section('title','siswa')
@section('content')
<div class="container-fluid">
    <a href="{{ route('siswa.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5>Edit Siswa</h5>
        </div>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis"
                            placeholder="NIS" value="{{ $siswa->nis }}">
                        @error('nis')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="Nama Siswa" value="{{ $siswa->nama }}">
                        @error('nama')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">rombel</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('rombel') is-invalid @enderror" name="rombel"
                            placeholder="rombel Siswa" value="{{ $siswa->rombel }}">
                        @error('rombel')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="rayon">Rayon</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="rayon_id" id="rayon">
                            <option disabled selected>Pilih Rayon</option>
                            @foreach ($rayons as $rayon)
                            <option {{ $rayon->id == $siswa->rayon_id ? 'selected' : '' }} value="{{ $rayon->id }}">{{ $rayon->nama_rayon }}</option>
                            @endforeach
                        </select>

                        @error('rayon_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Selesai</button>
            </div>
        </form>
    </div>
</div>
@endsection
