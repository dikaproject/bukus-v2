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
            'name' => 'Pak Putra',
            'email' => 'putra@smktelkom-pwt.sch.id',
            'password' => bcrypt('Adminbuku123'),
        ])->assignRole('admin');

        Admin::create([
            'nik' => '329889334424',
            'name' => 'Leader',
            'jabatan' => 'Ketua Tim Disiplin',
            'sekolah' => 'SMK Telkom Purwokerto',
            'email' => 'leader@smktelkom-pwt.sch.id',
            'password' => bcrypt('password'),
        ])->assignRole('leader');

        Admin::create([
            'nik' => '51238930033',
            'name' => 'Teacher',
            'jabatan' => 'Tim Disiplin',
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
    }
}
