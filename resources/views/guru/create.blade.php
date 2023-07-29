@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data penilaian aksi nyata</h4>
        <form method="POST" action="{{ route('guru.store') }}">
            <input type="hidden" name="user_id" class="form-control" value="{{ $user_id }}">
            @csrf
            <div class="form-group">
                <label>nip</label><input type="text" name="nip" class="form-control">
            </div>
            <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $name }}">
            </div>
            <div class="form-group">
                <label>alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis unit</label>
                <select name="id_unit" class="form-control">
                    <option value="">unit</option>
                    @foreach ($list_unit as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jabatan strruktural</label>
                <select name="id_jabatan_struktural" class="form-control">
                    <option value="">jabatan struktural</option>
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