@extends('layout.master')
@section('content')
<div class="card md-4 mb-4 mt-4">
    <h4>Masukkan Nilai untuk Penilaian Kehadiran</h4>
    <form method="POST" action="">
        @csrf
        <div class="form-group">
            <label>skor</label><input type="text" name="skor" class="form-control">
        </div>
        <div class="form-group">
                <label>Jenis Kehadiran</label>
                <select name="id_jenis_kehadiran" class="form-control">
                    <option value="">Pilih Jenis Kehadiran</option>
                    @foreach ($list_penilaian_kehadiran as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div></div>
    </form>
</div>

<div class="row md-4 mb-4 mt-4">
<h4>Masukkan Nilai untuk Penilaian Aksi Nyata</h4>

    <form method="POST" action="">
        @csrf
        <div class="form-group">
            <label>skor</label><input type="text" name="skor" class="form-control">
        </div>
    </form>
</div>
<div class="row md-4 mb-4 mt-4">
<h4>Masukkan Nilai untuk Penilaian Pembelajaran</h4>


    <form method="POST" action="">
        @csrf
        <div class="form-group">
            <label>skor</label><input type="text" name="skor" class="form-control">
        </div>
    </form>
</div>
@endsection