<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'siswa' => 'John Doe',
            'nis' => 12345,
            'jenis_absen' => 'absen_datang',
            'jam' => 06.19,
            'rayon' => 'A',
            'rombel' => 'X',
        ]);
        Siswa::create([
            'siswa' => 'John Doe',
            'nis' => 12345,
            'jenis_absen' => 'absen_datang',
            'jam' => 06.19,
            'rayon' => 'A',
            'rombel' => 'X',
        ]);
        Siswa::create([
            'siswa' => 'John Doe',
            'nis' => 12345,
            'jenis_absen' => 'absen_datang',
            'jam' => 06.19,
            'rayon' => 'A',
            'rombel' => 'X',
        ]);
        Siswa::create([
            'siswa' => 'John Doe',
            'nis' => 12345,
            'jenis_absen' => 'absen_datang',
            'jam' => 06.19,
            'rayon' => 'A',
            'rombel' => 'X',
        ]);
        Siswa::create([
            'siswa' => 'John Doe',
            'nis' => 12345,
            'jenis_absen' => 'absen_datang',
            'jam' => 06.19,
            'rayon' => 'A',
            'rombel' => 'X',
        ]);
    }
}
