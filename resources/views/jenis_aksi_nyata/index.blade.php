@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Aksi Nyaata</h4>
    <p align="right"><a href="{{ route('jenis_aksi_nyata.create') }}" class="btn btn-primary">Tambahkan Jenis Aksi Nyata</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nama aksi nyata</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($jenis_aksi_nyata as $jenis_aksi_nyatas)
        <tr>
            <td>{{ $jenis_aksi_nyatas->id}}</td>
            <td>{{ $jenis_aksi_nyatas->nama_aksi_nyata}}</td>
            <td><a href="{{ route('jenis_aksi_nyata.edit', $jenis_aksi_nyatas->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('jenis_aksi_nyata.destroy', $jenis_aksi_nyatas->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach 
    </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Jumlah Peminjam : {{ $jumlah_aksi_nyata }}
        </strong>
    </div>

</div>
@endsection