@extends('layout.master')
@section('content')

@if(count($guru))
    <div class="container">
         <h4>Data Guru</h4>
         <p align="right"><a href="{{ route('penilaian.create') }}" class="btn btn-primary">Tambah Data Peminjam</a></p>
    <form action="{{ route('penilaian.search') }}" method="get">@csrf
        <input type="text" name="kata" placeholder="Cari....">
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Unit</th>
                <th>Periode</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
            </tr>
        </thead>
        <tbody>

            @foreach($daftar_guru as $guru)
            <tr>
                <td>{{ $guru->id}}</td>
                <td>{{ $guru->nip}}</td>
                <td>{{ $guru->nama}}</td>
                <td>{{ $guru->unit['nama_unit'] }}</td>
                <td>{{ $guru->jabatan_struktural['nama_struktural'] }}</td>
                <td><a href="{{ route('penilaian.create') }}" class="btn btn-primary btn-sm">Beri Nilai</a></td>
                @endforeach
        </tbody>
    </table>

@else
<div>
    <h4>DATA {{ $cari }} TIDAK DITEMUKAN</h4>
    <a href="/penilaian">Kembali</a>
</div>
@endif
@endsection