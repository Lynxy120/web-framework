@extends('layouts.main')
@section('title', 'Data Dosen')

@section('content')
    <h1>Daftar Dosen</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Program Studi</th>
            <th>Alamat</th>
        </tr>
        @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen->nik }}</td>
                <td>{{ $dosen->nama }}</td>
                <td>{{ $dosen->email }}</td>
                <td>{{ $dosen->no_telp }}</td>
                <td>{{ $dosen->prodi }}</td>
                <td>{{ $dosen->alamat }}</td>
            </tr>
        @endforeach
    </table>
@endsection