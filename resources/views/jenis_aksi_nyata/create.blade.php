@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambahkan jenis aksi nyata</h4>
    <form method="POST"  action="{{ route('jenis_aksi_nyata.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Aksi Nyata</label>
            <input type="text" name="nama_aksi_nyata" class="form-control">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection