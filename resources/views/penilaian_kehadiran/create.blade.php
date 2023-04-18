@section('content')
<div class="container">
    <h4>Tambah Data Peminjam</h4>
    <form method="POST" action="{{ route('data_peminjam.store') }}">
        @csrf
        <div class="form-group">
            <label>Kode Peminjam</label>
            <input type="text" name="kode_peminjam" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option value="P">Perempuan</option>
                <option value="L">Laki-laki</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" id="" cols="148" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection