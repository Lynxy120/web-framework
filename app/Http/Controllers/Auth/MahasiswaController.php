<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Ini adalah method index di MahasiswaController";
    }

    public function insertSql()
    {
        $query = DB::insert("INSERT INTO students (nim, nama_lengkap, tempat_lahir, tanggal_lahir, email, prodi, jenis_kelamin, alamat, created_at, updated_at) VALUES ('1234567890', 'Lynx', 'Bandung', '2000-01-01', 'lynx@example.com', 'Teknik Informatika', 'L', 'Jl. Mawar No. 123', NOW(), NOW())");
        return "Data mahasiswa berhasil diinsert menggunakan query SQL";
    }
}
