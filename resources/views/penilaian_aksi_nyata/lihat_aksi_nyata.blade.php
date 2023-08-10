@extends('layout.master')
@section('content')
<div class="container mb-2 mt-2">
    <h4>Nilai Aksi Nyata</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Data Periode</th>
                <th>Status </th>
                <th>Lihat Penilaian Aksi Nyata</th>
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

                <td>
                    @if( $periodes->status==1 )
                        <a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-primary btn-sm">Isi Aksi Nyata</a>
                    @else
                        Periode tidak aktif
                    @endif
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Jumlah Penilaian : {{ $jumlah_periode}}
        </strong>
    </div>

</div>
@endsection