@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambahkan jenis Pembelajaran</h4>
    <form method="POST" action="{{ route('jenis_pembelajaran.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Pembelajaran</label>
            <input type="text" name="nama_pembelajaran" class="form-control">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection