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
        <!-- Kondisi IF -->
        <form method="post" action="{{ route('penilaian.store') }}">
            @csrf
            @if($penilaian_aksi_nyata!='[]')

            <!-- INPUT PENILAIAN KEPALA SEKOLAH -->
            @if (( Auth::check() && Auth::user()->level === 'Kepala Sekolah'))
            @foreach($penilaian as $penilaian1)
            <input type="hidden" name="id_penilaian" class="form-control" value="{{ $penilaian1->id}}">
            <input type="hidden" name="nip" class="form-control" value="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Guru :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="guru" class="form-control" value="{{ $penilaian1->guru[0]['nama']}}">
                </div>
                <label class="col-sm-2 col-form-label">NIP :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="nip" class="form-control" value="{{ $penilaian1->guru[0]['nip']}}">
                </div>
            </div>

            <!-- PENILAIAN KEHADIRAN KEPALA SEKOLAH -->
            <div class="alert alert-primary">
                <strong>Penilaian Kehadiran</strong>
            </div>
            <div class="row">
                @if ($cekkehadiransekolah == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Di Sekolah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiransekolah" value="{{ $kehadiransekolah->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Di Sekolah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiransekolah" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if ($cekkehadirankelas == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadirankelas" value="{{ $kehadirankelas->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadirankelas" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranlessonstudy == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lesson Study </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranlessonstudy" value="{{ $kehadiranlessonstudy->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lesson Study </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranlessonstudy" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranrapat == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rapat </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranrapat" value="{{ $kehadiranrapat->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rapat </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranrapat" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranpembinaan == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pembinaan </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" value="{{ $kehadiranpembinaan->skor }}" disabled name="kehadiranpembinaan" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pembinaan </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" disabled name="kehadiranpembinaan" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
            </div>

            <!-- PENILAIAN PEMBELAJARAN KEPALA SEKOLAH -->
            <div class="alert alert-primary">
                <strong>Penilaian Pembelajaran</strong>
            </div>
            <div class="row">
                @if($cekpenilaianpembelajaranmedia =="ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Media </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmedia" value="{{ $penilaianpembelajaranmedia->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Media </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmedia" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranpenilaian == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penilaian </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranpenilaian" value="{{ $penilaianpembelajaranpenilaian->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penilaian </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranpenilaian" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranmetoda == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Metoda</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmetoda" value="{{ $penilaianpembelajaranmetoda->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Metoda</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmetoda" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranhalaqoh == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranhalaqoh" value="{{ $penilaianpembelajaranhalaqoh->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranhalaqoh" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranrpp == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RPP </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranrpp" value="{{ $penilaianpembelajaranrpp->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RPP </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranrpp" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
            </div>

            <!-- PENILAIAN AKSI NYATA KEPALA SEKOLAH -->
            <div class="alert alert-primary">
                <strong>Aksi Nyata</strong>
            </div>
            @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyata1)
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" disabled name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $penilaian_aksi_nyata1->deskripsi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Aksi Nyata</label>
                        <input type="text" disabled name="id_jenis_aksi" class="form-control" placeholder="Jenis Aksi Nyata" value="{{ $penilaian_aksi_nyata1->jenis_aksi_nyata['nama_aksi_nyata'] }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Dokumentasi</label>
                        <input type="text" disabled name="link_dokumentasi" class="form-control" placeholder="Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->link_vidio }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Vidio</label>
                        <input type="text" disabled name="link_vidio" class="form-control" placeholder="Link Vidio" value="{{ $penilaian_aksi_nyata1->link_dokumentasi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" disabled name="volume" class="form-control" placeholder="Volume" value="{{ $penilaian_aksi_nyata1->volume }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penilaian</label>
                        <input type="text" disabled name="skor" class="form-control" placeholder="Masukan Penilaian Aksi Nyata" value="{{ $penilaian_aksi_nyata1->skor_aksi_nyata }}">
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            <!-- KEPALA SEKOLAH SELESAI -->

            <!-- INPUT PENILAIAN DIVISI PEMBINAAN -->
            @elseif(( Auth::check() && Auth::user()->level === 'Divisi Pembinaan'))
            @foreach($penilaian as $penilaian1)
            <input type="hidden" name="id_penilaian" class="form-control" value="{{ $penilaian1->id}}">
            <input type="hidden" name="nip" class="form-control" value="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Guru :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="guru" class="form-control" value="{{ $penilaian1->guru[0]['nama']}}">
                </div>
                <label class="col-sm-2 col-form-label">NIP :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="nip" class="form-control" value="{{ $penilaian1->guru[0]['nip']}}">
                </div>
            </div>

            <!-- PENILAIAN KEHADIRAN DIVISI PEMBINAAN -->
            <div class="alert alert-primary">
                <strong>Penilaian Kehadiran</strong>
            </div>
            <div class="row">
                @if ($cekkehadiransekolah == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Di Sekolah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiransekolah" disabled value="{{ $kehadiransekolah->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Di Sekolah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiransekolah" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if ($cekkehadirankelas == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadirankelas" disabled value="{{ $kehadirankelas->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadirankelas" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranlessonstudy == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lesson Study </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranlessonstudy" disabled value="{{ $kehadiranlessonstudy->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lesson Study </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranlessonstudy" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranrapat == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rapat </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranrapat" disabled value="{{ $kehadiranrapat->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rapat </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranrapat" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekkehadiranpembinaan == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><strong>Pembinaan</strong></label>
                    <div class="col-md-3 mb-2">
                            <input type="text" value="{{ $kehadiranpembinaan->skor }}" name="kehadiranpembinaan" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><strong>Pembinaan</strong></label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="kehadiranpembinaan" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
            </div>

            <!-- PENILAIAN PEMBELAJARAN DIVISI PEMBINAAN -->
            <div class="alert alert-primary">
                <strong>Penilaian Pembelajaran</strong>
            </div>
            <div class="row">
                @if($cekpenilaianpembelajaranmedia =="ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Media </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmedia" disabled value="{{ $penilaianpembelajaranmedia->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Media </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmedia" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranpenilaian == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penilaian </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranpenilaian" disabled value="{{ $penilaianpembelajaranpenilaian->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penilaian </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranpenilaian" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranmetoda == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Metoda</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmetoda" disabled value="{{ $penilaianpembelajaranmetoda->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Metoda</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranmetoda" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranhalaqoh == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranhalaqoh" disabled value="{{ $penilaianpembelajaranhalaqoh->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranhalaqoh" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
                @if($cekpenilaianpembelajaranrpp == "ada")
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RPP </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranrpp" disabled value="{{ $penilaianpembelajaranrpp->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @else
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RPP </label>
                    <div class="col-md-3 mb-2">
                        <input type="text" name="penilaianpembelajaranrpp" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                    </div>
                </div>
                @endif
            </div>

            <!-- PENILAIAN AKSI NYATA DIVISI PEMBINAAN -->
            <div class="alert alert-primary">
                <strong>Aksi Nyata</strong>
            </div>
            @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyata1)
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" disabled name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $penilaian_aksi_nyata1->deskripsi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Aksi Nyata</label>
                        <input type="text" disabled name="id_jenis_aksi" class="form-control" placeholder="Jenis Aksi Nyata" value="{{ $penilaian_aksi_nyata1->jenis_aksi_nyata['nama_aksi_nyata'] }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Dokumentasi</label>
                        <input type="text" disabled name="link_dokumentasi" class="form-control" placeholder="Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->link_vidio }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Vidio</label>
                        <input type="text" disabled name="link_vidio" class="form-control" placeholder="Link Vidio" value="{{ $penilaian_aksi_nyata1->link_dokumentasi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" disabled name="volume" class="form-control" placeholder="Volume" value="{{ $penilaian_aksi_nyata1->volume }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penilaian</label>
                        <input type="text" disabled name="skor" class="form-control" placeholder="Masukan Penilaian Aksi Nyata" value="{{ $penilaian_aksi_nyata1->skor_aksi_nyata }}">
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
             <!-- DIVISI PEMBINAAN SELESAI -->

            <!-- INPUT PENILAIAN YAYASAN -->
            @elseif(( Auth::check() && Auth::user()->level === 'Yayasan'))
            @foreach($penilaian as $penilaian1)
            <input type="hidden" name="id_penilaian" class="form-control" value="{{ $penilaian1->id}}">
            <input type="hidden" name="nip" class="form-control" value="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Guru :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="guru" class="form-control" value="{{ $penilaian1->guru[0]['nama']}}">
                </div>
                <label class="col-sm-2 col-form-label">NIP :</label>
                <div class="col-sm-4">
                    <input disabled type="text" name="nip" class="form-control" value="{{ $penilaian1->guru[0]['nip']}}">
                </div>
            </div>

             <!-- INPUT PENILAIAN KEHADIRAN YAYASAN -->
              <div class="alert alert-primary">
                    <strong>Penilaian Kehadiran</strong>
                </div>
                <div class="row">
                @if ($cekkehadiransekolah == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Di Sekolah</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiransekolah" disabled value="{{ $kehadiransekolah->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Di Sekolah</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiransekolah" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                @endif
                @if ($cekkehadirankelas == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelas </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadirankelas" disabled value="{{ $kehadirankelas->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelas </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadirankelas" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekkehadiranlessonstudy == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lesson Study </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiranlessonstudy" disabled value="{{ $kehadiranlessonstudy->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lesson Study </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiranlessonstudy" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekkehadiranrapat == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Rapat </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiranrapat" disabled value="{{ $kehadiranrapat->skor }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Rapat </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="kehadiranrapat" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekkehadiranpembinaan == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pembinaan </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" value="{{ $kehadiranpembinaan->skor }}" disabled name="kehadiranpembinaan" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pembinaan </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" disabled name="kehadiranpembinaan" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                </div>

                <!-- INPUT PENILAIAN PEMBELAJARAN YAYASAN -->
                <div class="alert alert-primary">
                    <strong>Penilaian Pembelajaran</strong>
                </div>
                <div class="row">
                    @if($cekpenilaianpembelajaranmedia =="ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Media </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranmedia" disabled value="{{ $penilaianpembelajaranmedia->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Media </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranmedia" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekpenilaianpembelajaranpenilaian == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penilaian </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranpenilaian" disabled value="{{ $penilaianpembelajaranpenilaian->nilai }}"placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penilaian </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranpenilaian" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekpenilaianpembelajaranmetoda == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Metoda</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranmetoda" disabled value="{{ $penilaianpembelajaranmetoda->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Metoda</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranmetoda" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekpenilaianpembelajaranhalaqoh == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranhalaqoh" disabled value="{{ $penilaianpembelajaranhalaqoh->nilai }}"placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Halaqoh Ilmiah</label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranhalaqoh" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                    @if($cekpenilaianpembelajaranrpp == "ada")
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RPP </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranrpp" disabled value="{{ $penilaianpembelajaranrpp->nilai }}" placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RPP </label>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="penilaianpembelajaranrpp" disabled placeholder="Masukkan Skor Penilaian" class="form-control form-control-sm text-right item">
                        </div>
                    </div>
                    @endif
                </div>

               <!-- INPUT PENILAIAN AKSI NYATA YAYASAN -->
            <div class="alert alert-primary">
                <strong>Penilaian Aksi Nyata</strong>
            </div>
            <?php
                $i = 0
            ?>
            @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyata1)
            <?php
                $i++
            ?>
            <b>Aksi Nyata {{ @$i }}</b>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Aksi Nyata</label>
                        <input type="text" name="id_jenis_aksi" class="form-control" disabled placeholder="Pilih Jenis Aksi Nyata" value="{{ $penilaian_aksi_nyata1->jenis_aksi_nyata['nama_aksi_nyata'] }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Deskripsi Aksi Nyata</label>
                        <input type="text" name="deskripsi" class="form-control" disabled placeholder="Masukkan Deskripsi Aksi Nyata" value="{{ $penilaian_aksi_nyata1->deskripsi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" name="volume" class="form-control" disabled placeholder="Masukan Banyaknya Pelaksaan Aksi Nyata" value="{{ $penilaian_aksi_nyata1->volume }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Dokumentasi</label>
                        <input type="text" name="link_dokumentasi" class="form-control" disabled placeholder="Masukan Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->link_dokumentasi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Vidio</label>
                        <input type="text" name="link_vidio" class="form-control" disabled placeholder="Masukkan Link Vidio" value="{{ $penilaian_aksi_nyata1->link_vidio }}">
                    </div>
                </div>
                    @if($penilaianaksinyata == "ada")
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penilaian Aksi Nyata</label>
                        <input type="text" value = "{{ $penilaian_aksi_nyata1->skor_aksi_nyata }}" name="skor{{ @$i }}" class="form-control" placeholder="Masukan Penilaian Aksi Nyata">
                    </div>
                    </div>
                    @else
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penilaian Aksi Nyata</label>
                        <input value = "{{ $penilaian_aksi_nyata1->skor_aksi_nyata }}" type="text" name="skor{{ @$i }}" class="form-control" placeholder="Masukan Penilaian Aksi Nyata">
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
            @endforeach
            <!-- YAYASAN SELESAI -->

            @endif
            <!-- BUTTON SUBMIT -->
            <div class="col-sm-4 mt-4">
                <ul>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="submit" class="btn btn-secondary">Simpan Permanen</button>
                </ul>
            </div>
    </div>

    @else
    Guru belum input nilai aksi nyata
    @endif
    </form>
</body>
@endsection