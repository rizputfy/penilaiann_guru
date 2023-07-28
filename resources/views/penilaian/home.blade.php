@extends('layout.master')
@section('content')
<div class="container p-3 my-3 border">
    <div class="row">
        <div class="col-sm-6">
            <h4>Periode</h4>
        </div>
        <div class="col-sm-6">
            <form action="{{ route('guru.search') }}" method="get">@csrf
                <input type="text" name="keterangan" placeholder="Cari....">
            </form>
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
                <th>Periode</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
            </tr>
        </thead>
        <tbody>

            @foreach($daftar_nilai_guru as $penilaian)
            <tr>
                <td>{{ $penilaian->id}}</td>
                <td>{{ $penilaian->guru['nip']}}</td>
                <td>{{ $penilaian->guru['nama']}}</td>
                <td>{{ $penilaian->periode['keterangan_periode'] }}</td>
                <td><a href="{{ route('penilaian.create', ['id_guru'=>$penilaian->id_guru,'id_periode'=>$penilaian->id_periode]) }}" class="btn btn-primary btn-sm">Beri Nilai</a></td>
                @endforeach
                </tbody>
    </table>
</div>
@endsection