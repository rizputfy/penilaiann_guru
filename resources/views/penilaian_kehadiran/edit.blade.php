@extends('layout.master')
@section('content')
    <div class="container">
        <h4>EDIT DATA PENILAIAN KEHADIRAN</h4>
        <form method="POST" action="{{ route('PenilaianKehadiran.update', $penilaian_kehadirans->id) }}">
            @csrf
            <div class="form-group">
                <label>No</label>
                <input type="text" name="id" readonly class="form-control" value="{{ $penilaian_kehadirans->id }}">
            </div>
            <div class="form-group">
                <label>skor aksi</label>
                <input type="text" name="skor"  class="form-control" value="{{ $penilaian_kehadirans->skor }}">
            </div>
            <div class="form-group">
                <label>Jenis Kehadiran</label>
                <select name="id_jenis_kehadiran" >
                    <option value="">Pilih Jenis Kehadiran</option>
                    @foreach ($list_jenis_kehadiran as $key => $value)
                    <option value="{{ $key }}" {{ $penilaian_kehadirans->id == $key ? 'selected' : ''}}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div >
               <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection