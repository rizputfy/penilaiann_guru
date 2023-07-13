@extends('layout.master')
@section('content')
{{-- <div>
        <h4>Tambah Data penilaian aksi nyata</h4>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label>skor</label><input type="text" name="skor_aksi_nyata" class="form-control">
            </div>
            <div class="form-group">
                <label>nama deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
            </div>
            <div class="fo    rm-group">
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
    </div> --}}
    <div class="container p-3 my-3 border">
        <h1 class="text-center">Form Pendaftaran Mahasiswa Baru</h1>
            <form id="form" method="post">
                {{-- <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-sm-2 col-form-label">Di Sekolah:</label>
                        <div class="col-sm-4">
                            <input type="text" name="skor_aksi_nyata" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-2 col-form-label">Di Sekolah:</label>
                        <div class="col-sm-4">
                            <input type="text" name="skor_aksi_nyata" class="form-control">
                        </div>
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Guru:</label>
                    <div class="col-sm-4">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                    <label class="col-sm-2 col-form-label">Nip:</label>
                    <div class="col-sm-4">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                
                
                <div class="alert alert-primary">
                    <strong>Penilaian Kehadiran</strong>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Di Sekolah:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kelas:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Pembinaan:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Lesson Study:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Rapat:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="alert alert-primary">
                    <strong>Penilaian Pembelajaran</strong>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Di Sekolah:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kelas:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Pembinaan:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Lesson Study:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Rapat:</label>
                    <div class="col-sm-8">
                        <input type="text" name="skor_aksi_nyata" class="form-control">
                    </div>
                </div>
                
                <div class="alert alert-primary">
                    <strong>Aksi Nyata</strong>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Pendidikan Terakhir:</label>
                            <select class="form-control" name="pendidikan">
                                <option value="SMA-IPA">SMA - IPA</option>
                                <option value="SMA-IPS">SMA - IPS</option>
                                <option value="SMK-IPA">SMK - IPA</option>
                                <option value="SMK-IPS">SMK - IPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Nama Sekolah:</label>
                            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Rata-rata Nilai Rapor Kelas 12:</label>
                            <input type="text" name="nilai_raport" class="form-control"
                                placeholder="Masukan Rata-rata nilai raport">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
    
                </div>
            </form>
        </div>
@endsection



   
