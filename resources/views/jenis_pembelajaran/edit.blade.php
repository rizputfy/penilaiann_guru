@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Periode</h4>
    <form method="POST" action="{{ route('jenis_pembelajaran.update', $jenis_pembelajaran->id) }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="nama_pembelajaran" class="form-control" value="{{ $jenis_pembelajaran->nama_pembelajaran }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection