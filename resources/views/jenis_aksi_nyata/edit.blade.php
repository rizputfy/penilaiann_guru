@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Periode</h4>
    <form method="POST" action="{{ route('jenis_aksi_nyata.update', $jenis_aksi_nyata->id) }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="nama_aksi_nyata" class="form-control" value="{{ $jenis_aksi_nyata->nama_aksi_nyata }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection