<div class="container">
    <h4>Penilaian Kehadiran</h4>
    
    <table class="table table-striped" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Skor</th>
                <th>Jenis Kehadiran</th>
                <th>Id Penilaian</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penilaian_kehadiran as $kehadiran)
        <tr>
            <td>{{ $kehadiran->id }}</td>
            <td>{{ $kehadiran->skor}}</td>
            <td>{{ $kehadiran->jenis_kehadiiran}}</td>
            <td>{{ $kehadiran->id_penilaian}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <!-- <div class="pull-left">
        <strong>
            Jumlah kehadiran : {{ $jumlah_kehadiran }}
        </strong>
    </div> -->

</div>