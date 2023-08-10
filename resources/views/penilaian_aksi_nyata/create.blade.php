@extends('layout.master')
@section('content')
@if ($cek == "ada")
<div class="card">
    <div class="card-header">
        <div class="alert alert-primary">
            <strong>Edit Aksi Nyata</strong>
        </div>
    </div>
    <div class="card-body">
        <?php
        $i = 0
        ?>
        @foreach($penilaian_aksi_nyata1 as $penilaian_aksi_nyata1)
        <?php
        $i++
        ?>
        
        <b>Aksi Nyata {{ @$i }}</b>
        <form method="POST" action="{{ route('penilaian_aksi_nyata.update', $penilaian_aksi_nyata1->id_penilaian) }}">
            <input type="hidden" name="id_guru" value="{{ $guru[0]['guru']['id']}}" class="form-control">
            <input type="hidden" name="id_periode" value="{{ $periode['id'] }}" class="form-control">
            @csrf
            <div class="row mb-2 mt-2">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi{{ @$i }}" class="form-control" placeholder="Deskripsi" value="{{ $penilaian_aksi_nyata1->deskripsi }}">
                        <input type="hidden" name="id{{ @$i }}" class="form-control" value="{{ $penilaian_aksi_nyata1->id }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Aksi Nyata</label>
                        <select class="form-select" aria-label="Default select example" name="id_jenis_aksi{{ @$i }}">
                            <option value="">Pilih jenis aksi nyata</option>
                            @foreach ($list_jenis_aksi_nyata as $key => $value)
                            <option value="{{ $key }}" {{ $penilaian_aksi_nyata1->id == $key ? 'selected' : ''}}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Vidio</label>
                        <input type="text" name="link_vidio{{ @$i }}" class="form-control" placeholder="Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->link_vidio }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Link Dokumentasi</label>
                        <input type="text" name="link_dokumentasi{{ @$i }}" class="form-control" placeholder="Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->link_dokumentasi }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" name="volume{{ @$i }}" class="form-control" placeholder="Link Dokumentasi" value="{{ $penilaian_aksi_nyata1->volume }}">
                    </div>
                </div>
            </div>
            <div>
    <button type="submit">Simpan</button>
</div>
        </form>
    </div>

@endforeach

</div>

@else
<h4>Tambah Data penilaian aksi nyata</h4>
<form method="POST" action="{{ route('penilaian_aksi_nyata.store') }}">
    <input type="hidden" name="id_guru" value="{{ $guru[0]['guru']['id']}}" class="form-control">
    <input type="hidden" name="id_periode" value="{{ $periode['id'] }}" class="form-control">

    @csrf
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
        <textarea name="link_dokumentasi"></textarea>
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
        <select name="id_jenis_aksi2" class="form-control">
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
        <input type="text" name="link_vidio2" class="form-control">
    </div>
    <div class="form-group">
        <label>link dokumentasi</label>
        <textarea name="link_dokumentasi2"></textarea>
    </div>
    <div class="form-group">
        <label>volume</label>
        <input type="text" name="volume2" class="form-control">
    </div>
    <div>
    <button type="submit">Simpan</button>
    </div>
</form>
</div>
@endif
@endsection