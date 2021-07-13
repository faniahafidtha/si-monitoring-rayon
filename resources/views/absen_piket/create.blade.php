@extends('layouts.app')
@section('pageTitle','Absen Piket')
@section('title','Absen Piket Siswa')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('absen_piket.index') }}" class="btn btn-danger mb-4"><i class="fas fa-arrow-left"></i>    Kembali</a>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Jadwal Piket</h5>
            </div>
            <form action="{{ route('absen_piket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @foreach ($pikets as $piket )
                        @if ($piket->siswa->rayon->nama_rayon == auth()->user()->nama_rayon && $piket->hari == now()->isoFormat('dddd'))
                            <div class="col-lg-2">
                                <input type="text" class="form-control @error('rayon') is-invalid @enderror" name="rayon[]" placeholder="rayon Siswa" value="{{ $piket->siswa->rayon->nama_rayon }}" readonly hidden>
                                @error('rayon')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis[]" placeholder="NIS Siswa" value="{{  $piket->siswa->nis }}" readonly>
                                    @error('nis')
                                    <small class="text-danger">{{ "Siswa yang memiliki nis ini sudah absen" }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama[]" placeholder="Nama Siswa" value="{{  $piket->siswa->nama }}" readonly>
                                    @error('nama')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control @error('hari') is-invalid @enderror" name="hari[]" placeholder="hari Siswa" value="{{  $piket->hari }}" readonly>
                                    @error('hari')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal[]" placeholder="tanggal" value="{{ now()->Format('Y-m-d') }}" readonly>
                                    @error('tanggal')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-control" name="kehadiran[]" id="">
                                        <option disabled selected>Kehadiran</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Tidak">Tidak Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Dispen">Dispen</option>
                                    </select>
                                    @error('status')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <button class="btn btn-primary"> <i class="fas fa-check"></i> Selesai</button>
                </div>
            </form>
        </div>
    </div>
@endsection
