<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);
        return view('akademik.mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    // public function insertSql()
    // {
    //     $query = DB::insert("INSERT INTO students (nim, nama_lengkap, tempat_lahir, tanggal_lahir, email, prodi, jenis_kelamin, alamat, created_at, updated_at) VALUES ('1234567891', 'Lynx', 'Bandung', '2000-01-01', 'lynx@example.com', 'Teknik Informatika', 'L', 'Jl. Mawar No. 123', NOW(), NOW())");
    //     return "Data mahasiswa berhasil diinsert menggunakan query SQL";
    // }

    // public function insertPrepared()
    // {
    //     $query = DB::insert("INSERT INTO students (nim, nama_lengkap, tempat_lahir, tanggal_lahir, email, prodi, jenis_kelamin, alamat, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())", ['1234567892', 'Rizky', 'Jakarta', '2000-02-01', 'rizky@example.com', 'Teknik Informatika', 'L', 'Jl. Melati No. 456']);
    //     return "Data mahasiswa berhasil diinsert menggunakan prepared statement";
    // }

    // public function insertBinding()
    // {
    //     $query = DB::insert("INSERT INTO students (nim, nama_lengkap, tempat_lahir, tanggal_lahir, email, prodi, jenis_kelamin, alamat, created_at, updated_at) VALUES (:nim, :nama_lengkap, :tempat_lahir, :tanggal_lahir, :email, :prodi, :jenis_kelamin, :alamat, NOW(), NOW())", [
    //         'nim' => '1234567893',
    //         'nama_lengkap' => 'Dimas',
    //         'tempat_lahir' => 'Surabaya',
    //         'tanggal_lahir' => '2000-03-01',
    //         'email' => 'dimas@example.com',
    //         'prodi' => 'Teknik Informatika',
    //         'jenis_kelamin' => 'L',
    //         'alamat' => 'Jl. Anggrek No. 789'
    //     ]);
    //     return "Data mahasiswa berhasil diinsert menggunakan binding";
    // }

    // public function update()
    // {
    //     $query = DB::update("UPDATE students SET nama_lengkap = 'Lynx Updated' WHERE nim = '1234567891'");
    //     return "Data mahasiswa berhasil diupdate";
    // }

    // public function delete()
    // {
    //     $query = DB::delete("DELETE FROM students WHERE nim = '1234567891'");
    //     return "Data mahasiswa berhasil dihapus";
    // }

    // public function select()
    // {
    //     $query = DB::select("SELECT * FROM students");
    //     return $query;
    // }

    // public function selectTampil()
    // {
    //     $query = DB::select("SELECT * FROM students");
    //     foreach ($query as $student) {
    //         echo "NIM: " . $student->nim . ", Nama: " . $student->nama_lengkap . "<br>";
    //     }
    // }

    public function selectView()
    {
        $query = DB::select("SELECT * FROM students");
        return view('akademik.mahasiswa', ['students' => $query]);
    }

    // public function selectWhere()
    // {
    //     $query = DB::select("SELECT * FROM students WHERE nim = ?", ['1234567890']);
    //     return view('akademik.mahasiswa', ['students' => $query]);
    // }

    // public function statement()
    // {
    //     $query = DB::statement("ALTER TABLE students ADD COLUMN jurusan VARCHAR(255) AFTER prodi");
    //     return "Statement berhasil dijalankan";
    // }

    public function cekObjek()
    {
        $mahasiswa = new Mahasiswa();
        dd($mahasiswa);
    }

    public function insert()
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '1234567894';
        $mahasiswa->nama_lengkap = 'Endmin';
        $mahasiswa->tempat_lahir = 'Medan';
        $mahasiswa->tanggal_lahir = '2000-04-01';
        $mahasiswa->email = 'endmin@example.com';
        $mahasiswa->prodi = 'Teknik Informatika';
        $mahasiswa->jenis_kelamin = 'L';
        $mahasiswa->alamat = 'Jl. Dahlia No. 101';
        $mahasiswa->save();

        dd($mahasiswa);
        return "Data mahasiswa berhasil disimpan";
    }

    public function massAssignment()
    {
        $mahasiswa = Mahasiswa::create([
            'nim' => '1234567895',
            'nama_lengkap' => 'iam',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-05-01',
            'email' => 'mass@example.com',
            'prodi' => 'Teknik Informatika',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Mawar No. 456'
        ]);
        dump($mahasiswa);
        $mahasiswa = Mahasiswa::create([
            'nim' => '1234567896',
            'nama_lengkap' => 'Endmin',
            'tempat_lahir' => 'Medan',
            'tanggal_lahir' => '2000-04-01',
            'email' => 'endmin@example.com',
            'prodi' => 'Teknik Informatika',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Dahlia No. 101'
        ]);
        dump($mahasiswa);

        dd($mahasiswa);
        return "Data mahasiswa berhasil disimpan dengan mass assignment";
    }

    public function update()
    {
        $mahasiswa = Mahasiswa::find(1);
        $mahasiswa->nama_lengkap = 'Lynx Updated Again';
        $mahasiswa->save();

        dd($mahasiswa);
        return "Data mahasiswa berhasil diupdate";
    }

    public function updateWhere()
    {
        $mahasiswa = Mahasiswa::where('nim', '1234567895')->first();
        $mahasiswa->prodi = 'Sistem Informasi';
        $mahasiswa->save();

        dd($mahasiswa);
        return "Data mahasiswa berhasil diupdate berdasarkan kondisi";
    }

    public function massUpdate()
    {
        $mahasiswa = Mahasiswa::where('nim', '1234567896')->first();
        $mahasiswa->update([
            'nama_lengkap' => 'Endmin Updated',
            'prodi' => 'Sistem Informasi'
        ]);

        dd($mahasiswa);
        return "Data mahasiswa berhasil diupdate dengan mass assignment";
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::find(1);
        $mahasiswa->delete();

        dd($mahasiswa);
        return "Data mahasiswa berhasil dihapus";
    }

    public function destroy()
    {
        Mahasiswa::destroy(2);

        return "Data mahasiswa berhasil dihapus dengan destroy";
    }

    public function massDelete()
    {
        Mahasiswa::destroy([3, 4]);

        return "Data mahasiswa berhasil dihapus dengan mass delete";
    }

    public function all()
    {
        $mahasiswa = Mahasiswa::all();

        // dd($mahasiswa);
        // return "Data mahasiswa berhasil diambil semua";

        // echo $mahasiswa[0]->id . '<br>';
        // echo $mahasiswa[0]->nim . '<br>';
        // echo $mahasiswa[0]->nama_lengkap . "<br>";
        // echo $mahasiswa[0]->tempat_lahir . "<br>";
        // echo $mahasiswa[0]->alamat . "<br>";

        foreach ($mahasiswa as $mhs) {
            echo "ID: " . $mhs->id . ", NIM: " . $mhs->nim . ", Nama: " . $mhs->nama_lengkap . ", Tempat Lahir: " . $mhs->tempat_lahir . ", Alamat: " . $mhs->alamat . "<br>";
        }
    }

    public function allView()
    {
        $mahasiswa = Mahasiswa::all();
        return view('akademik.mahasiswa', ['students' => $mahasiswa]);
    }

    public function getWhere()
    {
        $mahasiswa = Mahasiswa::where('prodi', 'Teknik Informatika')->get();
        return view('akademik.mahasiswa', ['students' => $mahasiswa]);
    }

    public function first()
    {
        $mahasiswa = Mahasiswa::first();
        return view('akademik.mahasiswa', ['student' => $mahasiswa]);
    }

    public function find()
    {
        $mahasiswa = Mahasiswa::find(5);
        return view('akademik.mahasiswa', ['student' => $mahasiswa]);
    }

    public function latest()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('akademik.mahasiswa', ['student' => $mahasiswa]);
    }

    public function limit()
    {
        $mahasiswa = Mahasiswa::limit(2)->get();
        return view('akademik.mahasiswa', ['students' => $mahasiswa]);
    }

    public function skipTake()
    {
        $mahasiswa = Mahasiswa::skip(1)->take(2)->get();
        return view('akademik.mahasiswa', ['students' => $mahasiswa]);
    }

    public function softDelete()
    {
        $mahasiswa = Mahasiswa::find(5);
        $mahasiswa->delete();

        return "Data mahasiswa berhasil dihapus dengan soft delete";
    }

    public function withTrashed()
    {
        $mahasiswa = Mahasiswa::withTrashed()->get();
        return view('akademik.mahasiswa', ['students' => $mahasiswa]);
    }

    public function restore()
    {
        $mahasiswa = Mahasiswa::withTrashed()->find(5);
        $mahasiswa->restore();

        return "Data mahasiswa berhasil direstore";
    }

    public function forceDelete()
    {
        $mahasiswa = Mahasiswa::withTrashed()->find(5);
        $mahasiswa->forceDelete();

        return "Data mahasiswa berhasil dihapus secara permanen";
    }
}
