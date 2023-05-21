@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Penilaian Aksi Nyata</h4>
    <p align="right"><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-primary">Tambahkan penilaian aksi nyata</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>skor aksi nyata</th>
                <th>deskripsi</th>
                <th>link vidio</th>
                <th>link  dokumentasi</th>
                <th>volume</th>
                <th>aksi nyata</th>
                <th>Edit Data</th>
                <th>Hapus Data</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyatas)
        <tr>
            <td>{{ $penilaian_aksi_nyatas->id}}</td>
            <td>{{ $penilaian_aksi_nyatas->skor_aksi_nyata}}</td>
            <td>{{ $penilaian_aksi_nyatas->deskripsi}}</td>
            <td>{{ $penilaian_aksi_nyatas->link_vidio}}</td>
            <td>{{ $penilaian_aksi_nyatas->link_dokumentasi}}</td>
            <td>{{ $penilaian_aksi_nyatas->volume}}</td>
            <td>{{ $penilaian_aksi_nyatas->jenis_aksi_nyata['nama_aksi_nyata'] }}</td>
            <td><a href="{{ route('penilaian_aksi_nyata.edit', $penilaian_aksi_nyatas->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('penilaian_aksi_nyata.destroy', $penilaian_aksi_nyatas->id) }}" method="POST">
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
            Jumlah Peminjam : {{ $jumlah_data }}
        </strong>
    </div>

</div>
@endsection