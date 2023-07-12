@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Penilaian Pembelajaran</h4>
    <p align="right"><a href="{{ route('PenilaianPembelajaran.create') }}" class="btn btn-primary">Tambahkan Penilaian Pembelajaran</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nilai Pembelajaran</th>
                <th>Jenis Pembelajaran</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($penilaian_pembelajaran as $penilaian_pembelajarans)
        <tr>
            <td>{{ $penilaian_pembelajarans->id}}</td>
            <td>{{ $penilaian_pembelajarans->nilai}}</td>
            <td>{{ $penilaian_pembelajarans->id_jenis_penilaian['nama_pembelajaran']}}</td>
            <td><a href="{{ route('PenilaianPembelajaran.edit', $penilaian_pembelajarans->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
        @endforeach 
    </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Total Penilaian : {{ $jumlah_penilaian_pembelajaran}}
        </strong>
    </div>

</div>
@endsection