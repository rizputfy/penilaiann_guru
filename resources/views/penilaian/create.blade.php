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
        
 @if($penilaian_aksi_nyata!='[]')    
        @foreach($penilaian as $penilaian1)
            <form id="form" method="post" action="{{ route('penilaian.store') }}">
            <input  type="hidden" name="id_penilaian" class="form-control" value="{{ $penilaian1->id}}">
            <input type="hidden" name="nip" class="form-control" value="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Guru :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="guru" class="form-control" value="{{ $penilaian1->guru['nama']}}">
                </div>
                <label class="col-sm-2 col-form-label">NIP :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="nip" class="form-control" value="{{ $penilaian1->guru['nip']}}">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Penilaian Kehadiran</strong>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Di Sekolah</label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="skor" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kelas </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaiankehadiran2" class="form-control form-control-sm text-right item">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lesson Study </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaiankehadiran3" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rapat </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran4" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pembinaan </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaiankehadiran5" class="form-control form-control-sm text-right item">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Penilaian Pembelajaran</strong>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Media </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran1" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penilaian </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran2" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Metoda</label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran3" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran4" class="form-control form-control-sm text-right item">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RPP </label>
                <div class="col-md-3 mb-2">
                    <input type="text" name="penilaianpembelajaran5" class="form-control form-control-sm text-right item">
                </div>
            </div>

            <div class="alert alert-primary">
                <strong>Aksi Nyata</strong>
            </div> 
            @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyata1)
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                    <input type="text" name="sekolah" class="form-control" placeholder="Masukan Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->jenis_aksi_nyata['nama_aksi_nyata'] }}">
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
            @endforeach
            <div class="row"> -->
                <div class="col-sm-4">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </div>
        </form>
        @endforeach
    </div>
    @else
        Guru belum input nilai aksi nyata
    @endif
</body>
@endsection