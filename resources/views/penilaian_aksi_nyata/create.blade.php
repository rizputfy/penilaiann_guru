@extends('layout.master')
@section('content')
    <div>
        <h4>Tambah Data penilaian aksi nyata</h4>
        <form method="POST" acation="{{ route('penilaian_aksi_nyata.store') }}">
            @csrf
            {{-- <div class="form-group">
                <label>skor</label><input type="text" name="skor_aksi_nyata" class="form-control">
            </div> --}}
            <div class="form-group">
                <label>nama deskripsi</label>
                <input type="text" name="deskripsi1" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis aksi nyata</label>
                <select name="id_jenis_aksi" class="form-control">
                    <option value="">Pilih Jenis aksi</option>
                    @foreach ($list_jenis_aksi_nyata as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>link vidio</label>
                <input type="text" name="link_vidio" class="form-control">
            </div>
            <div class="form-group">
                <label>link dokumentasi</label>
                <textarea name="link_dokumentasi" ></textarea>
            </div>
            <div class="form-group">
                <label>volume</label>
                <input type="text" name="volume" class="form-control">
            </div>
           


            <div class="form-group">
                <label>nama deskripsi</label>
                <input type="text" name="deskripsi2" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis aksi nyata</label>
                <select name="id_jenis_aksi" class="form-control">
                    <option value="">Pilih Jenis aksi</option>
                    @foreach ($list_jenis_aksi_nyata as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>link vidio</label>
                <input type="text" name="link_vidio" class="form-control">
            </div>
            <div class="form-group">
                <label>link dokumentasi</label>
                <textarea name="link_dokumentasi" ></textarea>
            </div>
            <div class="form-group">
                <label>volume</label>
                <input type="text" name="volume" class="form-control">
            </div>
            <div >
               <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection