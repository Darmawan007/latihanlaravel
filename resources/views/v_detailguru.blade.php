@extends('layout.v_tamplate2')
@section('title', 'Detail Guru')
@section('content')
<table class="table">
    <tr>
        <th width="150px">NIP</th>
        <th width="30px">:</th>
        <th>{{ $guru->nip }}</th>
    </tr>
    <tr>
        <th width="150px">Nama Guru</th>
        <th width="30px">:</th>
        <th>{{ $guru->nama_guru }}</th>
    </tr>
    <tr>
        <th width="150px">Mata Pelajaran</th>
        <th width="30px">:</th>
        <th>{{ $guru->mapel }}</th>
    </tr>
    <tr>
        <th width="150px">Foto</th>
        <th width="30px">:</th>
        <th><img src="{{ url('gambar/'.$guru->foto_guru) }}" width="200px"></th>
    </tr>
    <tr>
        <th><a href="/guru" class="btn btn-success btn-sm">Kembali</a></th>
    </tr>
</table>
@endsection