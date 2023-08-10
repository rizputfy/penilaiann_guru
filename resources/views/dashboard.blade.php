@extends('layout.master')
@section('content')
<div class="container">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- dashboard Guru -->
                    @if (( Auth::check() && Auth::user()->level === 'Guru'))
                    <div class="card text-center">
                        <div class="card-header">
                        <strong> Dashboard Guru </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-primary btn-big">Isi Aksi Nyata</a></td>
                            </ul>
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian_aksi_nyata.lihat_aksi_nyata') }}" class="btn btn-outline-primary btn-big">Histori Penilaian</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH</strong>
                        </div>
                    </div>

                    <!-- dashboard kepala Sekolah -->
                    @elseif(( Auth::check() && Auth::user()->level === 'Kepala Sekolah'))
                    <div class="card text-center">
                        <div class="card-header">
                            <strong> Dashboard Kepala Sekolah </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian_aksi_nyata.lihat_aksi_nyata') }}" class="btn btn-primary btn-big">Guru</a></td>
                            </ul>
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian.home') }}" class="btn btn-primary btn-big">Kepala Sekolah</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH </strong>
                        </div>
                    </div>

                    <!-- dashboard Pembinaan -->
                    @elseif(( Auth::check() && Auth::user()->level === 'Divisi Pembinaan'))
                    <div class="card text-center">
                        <div class="card-header">
                        <strong> Dashboard Divisi Pembinaan </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                            <td><a href="{{ route('penilaian_aksi_nyata.lihat_aksi_nyata') }}" class="btn btn-primary btn-big">Guru</a></td>

                            </ul>
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian.home') }}" class="btn btn-primary btn-big">Divisi Pembinaan</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH </strong>
                        </div>
                    </div>

                    <!-- dashboard Yayasan -->
                    @elseif(( Auth::check() && Auth::user()->level === 'Yayasan'))
                    <div class="card text-center">
                        <div class="card-header">
                           <strong> Dashboard Yayasan </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian_aksi_nyata.lihat_aksi_nyata') }}" class="btn btn-primary btn-big">Guru</a></td>
                            </ul>
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('penilaian.home') }}" class="btn btn-primary btn-big">Yayasan</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH</strong>
                        </div>
                    </div>

                    <!-- dashboard Keuangan -->
                    @elseif(( Auth::check() && Auth::user()->level === 'Keuangan'))
                    <div class="card text-center">
                        <div class="card-header">
                        <strong> Dashboard Divisi Keuangan </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                                <td><a href="#" class="btn btn-primary btn-big">Lihat Laporan Penilaian</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH</strong>
                        </div>
                    </div>

                    <!-- dashboard Admin -->
                    @elseif(( Auth::check() && Auth::user()->level === 'Admin'))
                    <div class="card text-center">
                        <div class="card-header">
                            <strong> Dashboard Admin </strong>
                        </div>
                        <div class="card-body">
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('user.index') }}" class="btn btn-outline-secondary btn-big">User</a></td>
                                <td><a href="{{ route('guru.index') }}" class="btn btn-outline-info btn-big">Data Guru</a></td>
                                <td><a href="{{ route('unit.index') }}" class="btn btn-outline-secondary btn-big">Unit</a></td>
                                <td><a href="{{ route('periode.index') }}" class="btn btn-outline-secondary btn-big">Periode</a></td>
                                <td><a href="{{ route('jabatan_struktural.index') }}" class="btn btn-outline-secondary btn-big">Jabatan Struktural</a></td>
                            </ul>
                            <ul class="mb-4 mt-4">
                                <td><a href="{{ route('jenis_kehadiran.index') }}" class="btn btn-secondary btn-big">Jenis Kehadiran</a></td>
                                <td><a href="{{ route('jenis_pembelajaran.index') }}" class="btn btn-secondary btn-big">Jenis Pembelajaran</a></td>
                                <td><a href="{{ route('jenis_aksi_nyata.index') }}" class="btn btn-secondary btn-big">Jenis Aksi Nyata</a></td>
                            </ul>
                            <ul class="mb-4 mt-4">
                            <td><a href="{{ route('penilaian_aksi_nyata.lihat_aksi_nyata') }}" class="btn btn-primary btn-big">Lihat Histori Penilaian Guru</a></td>
                                <td><a href="{{ route('penilaian.home') }}" class="btn btn-primary btn-big">Penilaian</a></td>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <strong> ©YAYASAN NURUS SUNNAH</strong>
                        </div>
                    </div>
                    @else
                    <button type="button" class="btn btn-secondary">Penilai</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection