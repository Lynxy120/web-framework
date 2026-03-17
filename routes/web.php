<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "Halaman Home<br>";
    echo "Baris Kedua";
});

Route::get('/mahasiswa/ti/udin', function () {
    echo "Selamat Datang Udin";
});

// Route dengan parameter
Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Selamat Datang $nama";
});

Route::get('/mahasiswa/{nama}/{nim}', function ($nama, $nim) {
    return "Selamat Datang $nama dengan NIM $nim";
});

// Route dengan parameter opsional
Route::get('/dosen/{nama?}/{nip?}', function ($nama = "me", $nip = "000") {
    return "Selamat Datang $nama dengan NIP $nip";
});

// Route dengan redirect
Route::redirect('/home', '/');

//Route fallback
/*Route::fallback(function () {
    return "Halaman Tidak Ditemukan";
});*/

/*Route::get('/mahasiswa', function () {
    $arrmhs = [
        'mhs1' => 'Lynxy',
        'mhs2' => 'Rizky',
        'mhs3' => 'Dimas',
    ];
    //return view('akademik.mahasiswa', $arrmhs);
    return view('akademik.mahasiswa')->with($arrmhs);
});*/

Route::get('/mahasiswa', function () {
    $nama = 'Lynx';
    $nim = '123456789';
    $total_nilai = 80;

    return view('akademik.nilai_mahasiswa', compact('nama', 'nim', 'total_nilai'));
});
