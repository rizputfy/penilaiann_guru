@extends('layout.master')
@section('content')
<div class="container">
    <h4>Edit Data Periode</h4>
    <form method="POST" action="{{ route('periode.update', $periode->id) }}">
        @csrf
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $periode->keterangan }}">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection