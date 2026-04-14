<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Mahasiswa::create([
        //     'nim' => '1234567890',
        //     'nama_lengkap' => 'Lynx',
        //     'tempat_lahir' => 'Bandung',
        //     'tanggal_lahir' => '2000-01-01',
        //     'email' => 'lynx@example.com',
        //     'prodi' => 'Manajemen Informatika',
        //     'jenis_kelamin' => 'L',
        //     'alamat' => 'Jl. Mawar No. 123'
        // ]);

        \App\Models\Mahasiswa::factory(10)->create();
    }
}
