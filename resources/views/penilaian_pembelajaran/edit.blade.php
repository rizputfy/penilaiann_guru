@extends('layout.master')
@section('content')
    <div class="container">
        <h4>EDIT DATA PENILAIAN PEMBELAJARAN</h4>
        <form method="POST" action="{{ route('PenilaianPembelajaran.update', $penilaian_pembelajaran->id) }}">
            @csrf
            <div class="form-group">
                <label>No</label>
                <input type="text" name="id" readonly class="form-control" value="{{ $penilaian_pembelajaran->id }}">
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input type="text" name="nilai" class="form-control" value="{{ $penilaian_pembelajaran->nilai }}">
            </div>
            <div class="form-group">
                <label>Jenis Pembelajaran</label>
                <select name="id_jenis_pembelajaran" >
                    <option value="">Pilih Jenis Pembelajaran</option>
                    @foreach ($list_jenis_pembelajaran as $key => $value)
                    <option value="{{ $key }}" {{ $penilaian_pembelajaran->id == $key ? 'selected' : ''}}>
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