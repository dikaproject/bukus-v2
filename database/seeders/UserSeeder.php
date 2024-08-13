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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password1234'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Leader',
            'email' => 'leader@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('leader');

        Admin::create([
            'nik' => '51238930033',
            'name' => 'Teacher',
            'jabatan' => 'Guru',
            'sekolah' => 'SMK Telkom Purwokerto',
            'email' => 'teacher@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('teacher');

        Admin::create([
            'nik' => '512382332323',
            'name' => 'Walas',
            'jabatan' => 'Guru',
            'sekolah' => 'SMK Telkom Purwokerto',
            'email' => 'walas@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('walas');

        Student::create([
            'name' => 'Dika',
            'email' => '',
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
