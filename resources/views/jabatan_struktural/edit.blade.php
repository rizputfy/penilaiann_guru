@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data jabatan</h4>
    <form method="POST" action="{{ route('jabatan_struktural.update', $jabatan_struktural->id) }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="nama_struktural" class="form-control" value="{{ $jabatan_struktural->nama_struktural }}">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $jabatan_struktural->keterangan }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection