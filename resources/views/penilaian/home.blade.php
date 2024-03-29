@extends('layout.master')
@section('content')
<div class="container p-3 my-3 border">
    <div class="row">
        <div class="col-sm-6">
            <h4>Periode</h4>
        </div>
        <div class="col-sm-6" >
            <form action="" method="get">@csrf
                <input type="text" name="keterangan" placeholder="Cari....">
            </form>
        </div>
    </div>
</div>
<div class="container p-3 my-3 border">
    <h1 class="text-center">Daftar Nama Guru Nurus Sunnah</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>Edit Data</th>
                <th>Raport</th>
            </tr>
        </thead>
        <tbody>

            @foreach($daftar_nilai_guru as $penilaian)
            <tr>
                <td>{{ $penilaian->id}}</td>
                <td>{{ $penilaian->guru[0]['nip']}}</td>
                <td>{{ $penilaian->guru[0]['nama']}}</td>
                <td>{{ $penilaian->periode['keterangan_periode'] }}</td>
                <td>
                    @if($penilaian->periode['status']==1)
                    <a href="{{ route('penilaian.create', ['id'=>$penilaian->id]) }}" class="btn btn-primary btn-sm">Beri Nilai</a></td>
                    @else
                        Periode aktif
                    @endif
                </td> 
                <td>
                    @if(($penilaian->status)==1)
                    <a href="{{ route('penilaian.lihat_raport', ['id'=>$penilaian->id]) }}" class="btn btn-primary btn-sm">Lihat Raport</a></td>
                    @else
                        
                    @endif
                </td> 
                @endforeach
        </tbody>
    </table>
</div>
@endsection