@extends('layouts.main')
@section('title')

@section('content')
    <h1>Daftar Mahasiswa Jurusan TI</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
        </tr>
        @foreach ($mahasiswa as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->nama_lengkap }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->jenis_kelamin }}</td>
                <td>{{ $student->prodi }}</td>
            </tr>
        @endforeach
    </table>
@endsection