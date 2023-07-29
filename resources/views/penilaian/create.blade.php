@extends('layout.master')
@section('content')

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-3 my-3 border">
        <h1 class="text-center">Form Penilaian Guru</h1>
            <form id="form" method="post" action="{{ route('penilaian.create', $id_penilaian) }}">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Guru :</label>
                <div class="col-sm-4">
                    <input type="text" name="guru" class="form-control" value="{{ $guru[0]['nama'] }}">
                </div>
                <label class="col-sm-2 col-form-label">NIP :</label>
                <div class="col-sm-4">
                    <input type="text" name="nip" class="form-control" value="{{ $guru[0]['nip'] }}">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Penilaian Kehadiran</strong>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Di Sekolah</label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaian" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kelas </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaian" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pembinaan </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lesson Study </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rapat </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Penilaian Pembelajaran</strong>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Di Sekolah </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kelas </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pembinaan</label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lesson Study </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rapat </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor_aksi_nyata" class="form-control">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Aksi Nyata</strong>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Aksi Nyata</label>
                        <select name="id_jenis_aksi" class="form-control">
                            <option value="">Pilih Jenis aksi</option>
                            @foreach ($list_jenis_aksi_nyata as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Dokumentasi</label>
                        <input type="text" name="sekolah" class="form-control" placeholder="Masukan Link Dokumentasi">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penilaian</label>
                        <input type="text" name="nilai_raport" class="form-control" placeholder="Masukan Penilaian">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </div>
        </form>
    </div>
</body>
@endsection