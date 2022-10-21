@extends('master')
@section('title','Mahasiswa')
@section('active2','active')
@section('judulhalaman','Daftar Mahasiswa Kelas C Teknik Informatika 20xx')
@section('daftar')
<div class="container">
    <ol class="list-group list-group-flush">
        @foreach ($mahasiswa as $mhs)
            <li class="list-group-item">{{ $mhs }}</li>
        @endforeach
    </ol>
</div>

@endsection
