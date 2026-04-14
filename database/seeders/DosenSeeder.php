<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Dosen::factory()->count(10)->create();

        // \App\Models\Dosen::create([
        //     'nama' => 'Dr. John Doe',
        //     'nik' => '1234567890',
        //     'email' => 'john.doe@university.edu',
        //     'no_telp' => '081234567890',
        //     'prodi' => 'Teknik Informatika',
        //     'alamat' => 'Jl. Merdeka No. 123, Jakarta'
        // ]);

    }
}
