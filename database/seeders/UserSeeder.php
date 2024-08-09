<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        Admin::create([
            'nik' => '51238930033',
            'name' => 'Teacher',
            'jabatan' => 'Guru',
            'sekolah' => 'SMK Telkom Purwokerto',
            'email' => 'teacher@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('teacher');

        Student::create([
            'name' => 'Student',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'kelas' => 'XII RPL 1',
            'angkatan' => '2021',
            'sekolah' => 'SMK Telkom Purwokerto',
            'nis' => '541221182',
            'tanggal' => '2004-12-18',
            'password' => bcrypt('password'),
        ])->assignRole('student');
    }
}
