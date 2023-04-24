@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Unit</h4>
    <p align="right"><a href="{{ route('unit.create') }}" class="btn btn-primary">Tambahkan Jenis Unit</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Unit</th>
                <th>Keterangan</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($unit as $units)
        <tr>
            <td>{{ $units->id}}</td>
            <td>{{ $units->nama_unit}}</td>
            <td>{{ $units->keterangan}}</td>
            <td><a href="{{ route('unit.edit', $units->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('unit.destroy', $units->id) }}" method="POST">
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
            Jumlah Unit : {{ $jumlah_unit}}
        </strong>
    </div>

</div>
@endsection