@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Periode</h4>
    <form method="POST" action="{{ route('periode.update', $periode->id) }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan_periode" class="form-control" value="{{ $periode->keterangan_periode }}">
        </div>
        <div class="form-group">
            <label>Status Periode</label>
            <input type="text" name="status" class="form-control" value="{{ $periode->status }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection