@extends('layout.master')
@section('content')
<div class="container p-3 my-3 border">
    <div class="row">
        <div class="col-sm-6">
            <h4>Periode</h4>
        </div>
        <div class="col-sm-6">
            <select name="id_periode" class="form-control">
                <option value="">Pilih Periode Pengajaran</option>
                @foreach ($list_periode as $key => $value)
                <option value="{{ $key }}">
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>                
<div class="container p-3 my-3 border">
    <h1 class="text-center">Daftar Nama Guru Nurus Sunnah</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Unit</th>
                <th>Periode</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
            </tr>
        </thead>
        <tbody>

            @foreach($daftar_guru as $guru)
            <tr>
                <td>{{ $guru->id}}</td>
                <td>{{ $guru->nip}}</td>
                <td>{{ $guru->nama}}</td>
                <td>{{ $guru->unit['nama_unit'] }}</td>
                <td>{{ $guru->jabatan_struktural['nama_struktural'] }}</td>
                @endforeach
        </tbody>
    </table>
</div>
@endsection