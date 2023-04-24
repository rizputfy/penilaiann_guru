@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Periode</h4>
    <p align="right"><a href="{{ route('periode.create') }}" class="btn btn-primary">Tambahkan Jenis Periode</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($periode as $periodes)
        <tr>
            <td>{{ $periodes->id}}</td>
            <td>{{ $periodes->keterangan}}</td>
            <td><a href="{{ route('periode.edit', $periodes->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('periode.destroy', $periodes->id) }}" method="POST">
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
            Jumlah periode : {{ $jumlah_periode}}
        </strong>
    </div>

</div>
@endsection