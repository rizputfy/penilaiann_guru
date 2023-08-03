@extends('layout.master')
@section('content')
<div class="container">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                   @if (( Auth::check() && Auth::user()->level === 'guru'))
                   <td><a href="{{ route('tampilan_guru.index') }}" class="btn btn-warning btn-big">Guru</a></td>
                     @elseif(( Auth::check() && Auth::user()->level === 'Kepala Sekolah'))
                     <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-big">Penilaian</a></td>
                    <button type="button" class="btn btn-secondary">guru</button>
                    @elseif(( Auth::check() && Auth::user()->level === 'Divisi Pembinaan'))
                     <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-big">Penilaian</a></td>
                    <button type="button" class="btn btn-secondary">guru</button>
                    @elseif(( Auth::check() && Auth::user()->level === 'Yayasan'))
                     <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-big">Penilaian</a></td>
                    <button type="button" class="btn btn-secondary">guru</button>
                    @elseif(( Auth::check() && Auth::user()->level === 'Keuangan'))
                     <td><a href="{{ route('penilaian_aksi_nyata.create') }}" class="btn btn-warning btn-big">Penilaian</a></td>
                     @else
                    <button type="button" class="btn btn-secondary">Penilai</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection 