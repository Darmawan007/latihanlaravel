@extends('layout.v_tamplate2')
@section('title', 'Siswa')
@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Mapel</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach($siswa as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->NIM}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->kelas}}</td>
            <td>{{$data->mapel}}</td>
            <td>
                <a href="/siswa/detail/{{ $data->id_siswa }}" class="btn btn-sm btn-success">Detail</a>
                <a href="/siswa/edit/{{ $data->id_siswa }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection