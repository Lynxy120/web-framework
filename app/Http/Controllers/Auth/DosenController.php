<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(5);
        return view('akademik.dosen', [
            'dosens' => $dosens
        ]);
    }

    public function insertDosen()
    {
        $query = DB::insert("INSERT INTO dosens (nik, nama, email, no_telp, prodi, alamat, created_at, updated_at) VALUES ('123456789012345678', 'Dr. Lynx', 'lynx@dosen.university.edu', '081234567890', 'Teknik Informatika', 'Jl. Dosen No. 1', NOW(), NOW())");
        return "Data dosen berhasil disimpan";
    }

    public function insertBanyakDosen()
    {
        $dosens = [
            ['123456789012345679', 'Dr. Rizky', 'rizky@dosen.university.edu', '081234567891', 'Teknik Informatika', 'Jl. Dosen No. 2', NOW(), NOW()],
            ['123456789012345680', 'Dr. Dimas', 'dimas@dosen.university.edu', '081234567892', 'Teknik Informatika', 'Jl. Dosen No. 3', NOW(), NOW()]
        ];

        foreach ($dosens as $dosen) {
            DB::insert("INSERT INTO dosens (nik, nama, email, no_telp, prodi, alamat, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", $dosen);
        }

        return "Data dosen berhasil disimpan";
    }

    public function updateDosen()
    {
        $query = DB::update("UPDATE dosens SET nama = 'Dr. Lynx Updated' WHERE nik = '123456789012345678'");
        return "Data dosen berhasil diupdate";
    }

    public function updateWhereDosen()
    {
        $query = DB::update("UPDATE dosens SET prodi = 'Sistem Informasi' WHERE nik = '123456789012345678'");
        return "Data dosen berhasil diupdate berdasarkan kondisi";
    }

    public function updateOrInsert()
    {
        $query = DB::table('dosens')->updateOrInsert(
            ['nik' => '123456789012345678'], // Kondisi untuk mencari data
            ['nama' => 'Dr. Lynx Updated Again', 'email' => 'lynx.updated@dosen.university.edu'] // Data yang akan diupdate atau diinsert
        );
        return "Data dosen berhasil diupdate atau diinsert";
    }

    public function deleteDosen()
    {
        $query = DB::delete("DELETE FROM dosens WHERE nik = '123456789012345678'");
        return "Data dosen berhasil dihapus";
    }

    public function get()
    {
        $query = DB::table('dosens')->get();
        return $query;
    }

    public function getTampil()
    {
        $query = DB::table('dosens')->get();
        foreach ($query as $dosen) {
            echo "NIK: " . $dosen->nik . ", Nama: " . $dosen->nama . ", Email: " . $dosen->email . "<br>";
        }
    }

    public function getView()
    {
        $query = DB::table('dosens')->get();
        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function getWhere()
    {
        $query = DB::table('dosens')->where('prodi', 'Teknik Informatika')->get();
        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function selectDosen()
    {
        $query = DB::table('dosens')->select('nik', 'nama', 'email')->get();
        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function take()
    {
        $query = DB::table('dosens')->take(2)->get();
        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function first()
    {
        $query = DB::table('dosens')->first();
        return view('akademik.dosen', ['dosen' => $query]);
    }

    public function find()
    {
        $query = DB::table('dosens')->find(2); // Mencari berdasarkan ID
        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function raw()
    {
        $query = DB::table('dosens')
            ->selectRaw('count(*) as total_dosen')
            ->get();

        echo $query[0]->total_dosen . " dosen ditemukan.";
    }
}
