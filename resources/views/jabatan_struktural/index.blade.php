@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jabatan Struktural</h4>
    <p align="right"><a href="{{ route('jabatan_struktural.create') }}" class="btn btn-primary">Tambahkan jabatan_struktural</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nama Struktural</th>
                <th>Keterangan</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($jabatan_struktural as $jabatan_strukturals)
        <tr>
            <td>{{ $jabatan_strukturals->id}}</td>
            <td>{{ $jabatan_strukturals->nama_struktural}}</td>
            <td>{{ $jabatan_strukturals->keterangan}}</td>
            <td><a href="{{ route('jabatan_struktural.edit', $jabatan_strukturals->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('jabatan_struktural.destroy', $jabatan_strukturals->id) }}" method="POST">
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
            Jumlah jabatan : {{ $jumlah_jabatan }}
        </strong>
    </div>

</div>
@endsection