@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data guru</h4>
    {{-- <p align="right"><a href="{{ route('guru.create') }}" class="btn btn-primary">Tambahkan penilaian aksi nyata</a></p> --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nip</th>
                <th>nama</th>
                <th>alamat</th>
                <th>unit</th>
                <th>jabatan</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($guru as $gurus)
        <tr>
            <td>{{ $gurus->id}}</td>
            <td>{{ $gurus->nip}}</td>
            <td>{{ $gurus->nama}}</td>
            <td>{{ $gurus->alamat}}</td>
            <td>{{ $gurus->unit['nama_unit'] }}</td>
            <td>{{ $gurus->jabatan_struktural['nama_struktural'] }}</td>
            <td><a href="{{ route('guru.edit', $gurus->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('guru.destroy', $gurus->id) }}" method="POST">
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
            Jumlah Peminjam : {{ $jumlah_guru }}
        </strong>
    </div>

</div>
@endsection