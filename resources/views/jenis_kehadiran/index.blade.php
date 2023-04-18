@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Peminjam</h4>
    <p align="right"><a href="{{ route('jenis_kehadiran.create') }}" class="btn btn-primary">Tambah Data Peminjam</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjam</th>
                <th>Edit</th>
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