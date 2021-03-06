@extends('layouts.app')
@section('pageTitle','Absen Piket')
@section('title','Absen Piket Siswa')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('absen_rayon.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i>    Kembali</a>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Jadwal Piket</h5>
            </div>

            <form action="{{ route('absen_rayon.update', $data->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS Siswa</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" value="{{ $data->nis }}" name="nis" placeholder="NIS Siswa">
                        @error('nis')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}" placeholder="Nama Siswa">
                        @error('nama')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $data->tanggal }}" placeholder="tanggal Siswa">
                        @error('tanggal')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kehadiran</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="status" id="">
                            <option disabled selected>Status</option>
                            <option value="Hadir"  @if($data->status == "Hadir") selected @endif>Hadir</option>
                            <option value="Tidak"  @if($data->status == "Tidak") selected @endif>Tidak Hadir</option>
                            <option value="Izin"  @if($data->status == "Izin") selected @endif>Izin</option>
                            <option value="Dispen"  @if($data->status == "Dispen") selected @endif>Dispen</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary"> <i class="fas fa-check"></i> Selesai</button>
            </div>
            </form>
        </div>
    </div>
@endsection
