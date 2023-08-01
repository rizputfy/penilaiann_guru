{{-- @extends('layout.master')
@section('content')
<div class="container">
    <h4>Data </h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>periode</th>
                <th>Edit</th>
    </thead>
    <tbody>
        @foreach($penilaian_list as $user)
        <tr>
            <td>{{  $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->periode['keterangan'] }}</td>
            <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-sm">Pilih aksi nyata</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection  --}}

@extends('layout.master')
@section('content')
<div class="container">
    <h4>Data</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($penilaian_list as $user)
                @foreach($user->periode as $periode)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->periode['keterangan'] }}</td>
                    <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-sm">Pilih aksi nyata</a></td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection

