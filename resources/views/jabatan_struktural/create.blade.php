@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambahkan jenis Pembelajaran</h4>
    <form method="POST" action="{{ route('jabatan_struktural.store') }}">
        @csrf
        <div class="form-group">
            <label>Jabatan Struktural</label>
            <input type="text" name="nama_struktural" class="form-control">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection