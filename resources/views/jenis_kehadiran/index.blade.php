@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Kehadiran</h4>
    <p align="right"><a href="{{ route('jenis_kehadiran.create') }}" class="btn btn-primary">Tambahkan Jenis Kehadiran</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kehadiran</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenis_kehadiran as $jenis_kehadirans)
        <tr>
            <td>{{ $jenis_kehadirans->id}}</td>
            <td>{{ $jenis_kehadirans->nama_kehadiran}}</td>
            <td><a href="{{ route('jenis_kehadiran.edit', $jenis_kehadirans->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('jenis_kehadiran.destroy', $jenis_kehadirans->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-warning btn-sm" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Jumlah Peminjam : {{ $jumlah_kehadiran }}
        </strong>
    </div>

</div>
@endsection