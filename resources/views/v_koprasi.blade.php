@extends('layout.v_tamplate2')
@section('title', 'Koprasi')
@section('content')
<a href="/koprasi/print" class="fa fa-file-pdf-o btn btn-primary" target="_blank"> Print</a>
<a href="/koprasi/printpdf" class="fa fa-cloud-download btn btn-success" target="_blank"> Download PDF</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Faktur</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach($koprasi as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->no_faktur}}</td>
            <td>{{$data->pelanggan}}</td>
            <td>{{$data->tanggal}}</td>
            <td>{{$data->total}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection