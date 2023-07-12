@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Penilaian Kehadiran</h4>
    <p align="right"><a href="{{ route('PenilaianKehadiran.create') }}" class="btn btn-primary">Tambahkan penilaian kehadiran</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Skor Kehadiran</th>
                <th>Jenis Kehadiran</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($penilaian_kehadiran as $penilaian_kehadirans)
        <tr>
            <td>{{ $penilaian_kehadirans->id}}</td>
            <td>{{ $penilaian_kehadirans->skor}}</td>
            <td>{{ $penilaian_kehadirans->jenis_kehadiran['nama_kehadiran'] }}</td>
            <td><a href="{{ route('PenilaianKehadiran.edit', $penilaian_kehadirans->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
        @endforeach 
    </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Total Penilaian : {{ $jumlah_penilaian_kehadiran}}
        </strong>
    </div>

</div>
@endsection