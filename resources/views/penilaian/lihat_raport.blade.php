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
        <h1 class="text-center">Raport Penilaian Guru</h1>
        
        <!-- Kondisi IF -->
            @if($penilaian_aksi_nyata!='[]')
            
            <!-- INPUT PENILAIAN -->
            @foreach($penilaian as $penilaian1)
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Penilaian Kehadiran Sekolah</th>
      <th scope="col">Skor</th>
      <th scope="col">Prosentase</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Di Sekolah</td>
      <td>
            <b>{{ $kehadiransekolah->skor }}</b>
      </td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Di kelas</td>
      <td><b>{{ $kehadirankelas->skor }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Lesson Study</td>
      <td><b>{{ $kehadiranlessonstudy->skor }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Rapat</td>
      <td><b>{{ $kehadiranrapat->skor }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Pembinaan</td>
      <td><b>{{ $kehadiranpembinaan->skor }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
        <td>Total (25%)</td>
        <td><b>{{ $kehadiransekolah->skor+$kehadirankelas->skor+$kehadiranlessonstudy->skor+$kehadiranrapat->skor+$kehadiranpembinaan->skor}}</b></td>
        <td>
            <?php
            $total_kehadiran = $kehadiransekolah->skor+$kehadirankelas->skor+$kehadiranlessonstudy->skor+$kehadiranrapat->skor+$kehadiranpembinaan->skor;
            $prosentase_total_kehadiran = (25/100)*$total_kehadiran;
            ?>
            {{$prosentase_total_kehadiran}}
        </td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Penilaian Pembelajaran</th>
      <th scope="col">Skor</th>
      <th scope="col">Prosentase</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Media</td>
      <td>
            <b>{{ $penilaianpembelajaranmedia->nilai }}</b>
      </td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Penilaian</td>
      <td><b>{{$penilaianpembelajaranpenilaian->nilai }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Metode</td>
      <td><b>{{ $penilaianpembelajaranmetoda->nilai }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Halaoqoh Ilmiah</td>
      <td><b>{{ $penilaianpembelajaranhalaqoh->nilai }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>RPP</td>
      <td><b>{{ $penilaianpembelajaranrpp->nilai }}</b></td>
      <td>20%</td>
    </tr>
    <tr>
        <td>Total (25%)</td>
        <td><b>{{ $penilaianpembelajaranmedia->nilai+$penilaianpembelajaranpenilaian->nilai+$penilaianpembelajaranmetoda->nilai+$penilaianpembelajaranhalaqoh->nilai+$penilaianpembelajaranrpp->nilai}}</b></td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Penilaian Kehadiran</th>
      <th scope="col">Skor</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    $total_aksi_nyata = 0;
  ?>
  @foreach($penilaian_aksi_nyata as $penilaian_aksi_nyata1)
  <?php
    $i++
  ?>
    <tr>
      <th scope="row">1</th>
      <td>Aksi Nyata {{ $i }}</td>
      <td>
            <b>{{ $penilaian_aksi_nyata1->skor_aksi_nyata }}</b>
            <?php
                $x = 0;
                $total_aksi_nyata += $penilaian_aksi_nyata1->skor_aksi_nyata;
            ?>
      </td>
    </tr>
  @endforeach
    </tr>
        <td>Total (50%)</td>
        <td><b>{{ $total_aksi_nyata }}</b></td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Jumlah Total</td>
      <td>
        <?php
            $total_kehadiran = $kehadiransekolah->skor+$kehadirankelas->skor+$kehadiranlessonstudy->skor+$kehadiranrapat->skor+$kehadiranpembinaan->skor;
            $total_pembelajaran = $penilaianpembelajaranmedia->nilai+$penilaianpembelajaranpenilaian->nilai+$penilaianpembelajaranmetoda->nilai+$penilaianpembelajaranhalaqoh->nilai+$penilaianpembelajaranrpp->nilai;
            $jumlah_total = $total_kehadiran+$total_pembelajaran+$total_aksi_nyata;
            $prosentase_total_kehadiran = (25/100)*$total_kehadiran;
            $prosentase_total_pembelajaran = (25/100)*$total_pembelajaran;
            $prosentase_total_aksi_nyata = (25/100)*$total_aksi_nyata;
            $jumlah_total2 = $prosentase_total_kehadiran+$prosentase_total_pembelajaran+$prosentase_total_aksi_nyata;
        ?>
        {{ $jumlah_total2 }}
      </td>
    </tr>
    </tr>
        <td>Nomial</td>
        <td></td>
    </tr>
  </tbody>
</table>
            @endforeach
    </div>

            @else
            Guru belum input nilai aksi nyata
            @endif
   
    </div>
</body>
@endsection