@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data Penilaian Pembelajaran</h4>
        <form method="POST" action="{{ route('PenilaianPembelajaran.store') }}">
            @csrf
            <div class="form-group">
                <label>Nilai</label><input type="text" name="nilai" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Pembelajaran</label>
                <select name="id_jenis_penilaian" class="form-control">
                    <option value="">Pilih Jenis Pembelajaran</option>
                    @foreach ($list_jenis_pembelajaran as $key => $value)
                    <option value="{{ $key }}">
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