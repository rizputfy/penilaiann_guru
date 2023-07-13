@extends('layout.master')
@section('content')
    <div class="container">
        <h4>edit penilaian aksi nyata</h4>
        <form method="POST" action="{{ route('penilaian_aksi_nyata.update', $penilaian_aksi_nyata->id) }}">
            @csrf
            <div class="form-group">
                <label>No</label>
                <input type="text" name="id" readonly class="form-control" value="{{ $penilaian_aksi_nyata->id }}">
            </div>
            <div class="form-group">
                <label>skor aksi</label>
                <input type="text" name="skor_aksi_nyata"  class="form-control" value="{{ $penilaian_aksi_nyata->skor_aksi_nyata }}">
            </div>
            <div class="form-group">
                <label>deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="{{ $penilaian_aksi_nyata->deskripsi }}">
            </div>
            <div class="form-group">
                <label>Jenis aksi</label>
                <select name="id_jenis_aksi" >
                    <option value="">Pilih jenis aksi nyata</option>
                    @foreach ($list_jenis_aksi_nyata as $key => $value)
                    <option value="{{ $key }}" {{ $penilaian_aksi_nyata->id == $key ? 'selected' : ''}}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>link vidio</label>
                <input name="link_vidio" class="form-control" value="{{ $penilaian_aksi_nyata->link_vidio }}">
            </div>
            <div class="form-group">
                <label>link dokumentasi</label>
                <textarea name="link_dokumentasi" id="" cols="148" rows="3">{{ $penilaian_aksi_nyata->link_dokumentasi }}</textarea>
            </div>
            <div class="form-group">
                <label>volume</label>
                <input type="text" name="volume" class="form-control" value="{{ $penilaian_aksi_nyata->volume }}">
            </div>
            <div >
               <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection