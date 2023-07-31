@extends('layout.master')
@section('content')
<div class="container">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                   @if (( Auth::check() && Auth::user()->level === 'guru'))
                   <td><a href="{{ route('tampilan_guru.index') }}" class="btn btn-warning btn-sm">Edit</a></td>
                     @elseif(( Auth::check() && Auth::user()->level === 'penilai'))
                     <td><a href="{{ route('tampilan_guru.index') }}" class="btn btn-warning btn-sm">Edit</a></td>
                    <button type="button" class="btn btn-secondary">guru</button>
                    @else
                    <button type="button" class="btn btn-secondary">Penilai</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

