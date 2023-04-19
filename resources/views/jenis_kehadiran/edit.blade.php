@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Jenis Kehadiran</h4>
    <form method="POST" action="{{ route('jenis_kehadiran.update', $jenis_kehadiran->id) }}">
        @csrf
        <div class="form-group">
            <label>Nama Jenis Kehadiran</label>
            <input type="text" name="nama_kehadiran"  class="form-control" value="{{ $jenis_kehadiran->nama_kehadiran }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection