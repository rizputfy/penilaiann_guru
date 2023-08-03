@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data Jenis Periode</h4>
    <p align="right"><a href="#" class="btn btn-primary">Tambahkan Jenis Periode</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Status Periode</th>
                <th>Lihat Aksi Nyata</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periode as $periodes)
            <tr>
                <td>{{ $periodes->id}}</td>
                <td>{{ $periodes->keterangan_periode}}</td>
                <td>
                    @if( $periodes->status==1 )
                    Periode Sedang Aktif
                    @else
                    Periode Tidak Aktif
                    @endif
                </td>

                <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-sm">Aksi Nyata</a></td>
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