@extends('layout.master')
@section('content')
    <div class="container">
        <h4>edit penilaian aksi nyata</h4>
        <form method="POST" action="{{ route('guru.update', $guru->id) }}">
            @csrf
            <div class="form-group">
                <label>No</label>
                <input type="text" name="id" readonly class="form-control" value="{{ $guru->id }}">
            </div>
            <div class="form-group">
                <label>nip</label>
                <input type="text" name="nip"  class="form-control" value="{{ $guru->nip }}">
            </div>
            <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}">
            </div>
            <div class="form-group">
                <label>alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $guru->alamat }}">
            </div>
            {{-- <div class="form-group">
                <label>Jenis unit</label>
                <select name="id_jenis_aksi" class="form-control">
                    <option value="">Pilih unit</option>
                    @foreach ($list_unit as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
                <label>Jenis unit</label>
                <select name="id_unit" >
                    <option value="">Pilih unit</option>
                    @foreach ($list_unit as $key => $value)
                    <option value="{{ $key }}" {{ $guru->id == $key ? 'selected' : ''}}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jabatan struktural</label>
                <select name="id_jabatan_struktural" >
                    <option value="">Pilih unit</option>
                    @foreach ($list_jabatan_struktural as $key => $value)
                    <option value="{{ $key }}" {{ $guru->id == $key ? 'selected' : ''}}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group">
                <label>Jabatan strruktural</label>
                <select name="id_jabatan_struktural" class="form-control">
                    <option value="">Pilih jabatan</option>
                    @foreach ($list_jabatan_struktural as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div> --}}
            <div >
               <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection