@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Unit</h4>
    <form method="POST" action="{{ route('unit.update', $unit->id) }}">
        @csrf
        <div class="form-group">
            <label>Nama Unit</label>
            <input type="text" name="nama_unit"  class="form-control" value="{{ $unit->nama_unit }}">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $unit->keterangan }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection