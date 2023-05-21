@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Pembelajaran</h4>
    <p align="right"><a href="{{ route('jenis_pembelajaran.create') }}" class="btn btn-primary">Tambahkan Jenis Kehadiran</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pembelajaran</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenis_pembelajaran as $jenis_pembelajarans)
        <tr>
            <td>{{ $jenis_pembelajarans->id}}</td>
            <td>{{ $jenis_pembelajarans->nama_pembelajaran}}</td>
            <td><a href="{{ route('jenis_pembelajaran.edit', $jenis_pembelajarans->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('jenis_pembelajaran.destroy', $jenis_pembelajarans->id) }}" method="POST">
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
            Jumlah Peminjam : {{ $jumlah_pembelajaran }}
        </strong>
    </div>

</div>
@endsection