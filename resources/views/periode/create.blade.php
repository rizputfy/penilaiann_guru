@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambahkan Data Periode</h4>
    <form method="POST" action="{{ route('periode.store') }}">
        @csrf
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