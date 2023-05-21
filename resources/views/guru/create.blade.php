@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data penilaian aksi nyata</h4>
        <form method="POST" action="{{ route('penilaian_aksi_nyata.store') }}">
            @csrf
            <div class="form-group">
                <label>nip</label><input type="text" name="nip" class="form-control">
            </div>
            <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis unit</label>
                <select name="id_jenis_aksi" class="form-control">
                    <option value="">Pilih Jenis aksi</option>
                    @foreach ($list_unit as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jabatan strruktural</label>
                <select name="id_jenis_aksi" class="form-control">
                    <option value="">Pilih Jenis aksi</option>
                    @foreach ($list_jabatan_struktural as $key => $value)
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