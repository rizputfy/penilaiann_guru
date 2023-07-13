@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data Penilaian Kehadiran</h4>
        <form method="POST" action="{{ route('PenilaianKehadiran.store') }}">
            @csrf
            <div class="form-group">
                <label>skor</label><input type="text" name="skor" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Kehadiran</label>
                <select name="id_jenis_kehadiran" class="form-control">
                    <option value="">Pilih Jenis Kehadiran</option>
                    @foreach ($list_jenis_kehadiran as $key => $value)
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