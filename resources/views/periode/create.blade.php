@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambahkan Data Periode</h4>
    <form method="POST" action="{{ route('periode.store') }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan_periode" class="form-control">
        </div>
        <div class="form-group">
            <label>Status Periode</label>
            <input type="text" name="status" class="form-control">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection