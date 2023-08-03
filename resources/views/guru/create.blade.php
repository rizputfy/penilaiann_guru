@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data penilaian aksi nyata</h4>
        <form method="post" action="{{ route('guru.store') }}">
            <input type="hidden" name="user_id" class="form-control" value="{{ $user_id }}">
            <input type="hidden" name="level" class="form-control" value="{{ $level }}">
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
            <label>Jabatan Struktural</label>
            <select name="id_jabatan_struktural">
              <option value="">Jabatan Struktural</option>
              @foreach ($guru as $key => $value)
              <option value="{{ $key }}" {{$value->id_jabatan_struktural == $key ? 'selected' : ''}}>
                {{ $value->jabatan_struktural->nama_struktural }}
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