<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kursusku.test'],
            [
                'name' => 'Administrator KursusKu',
                'password' => 'Admin#1234',
                'phone' => null,
                'position' => 'Administrator Sistem',
                'institution' => 'KursusKu',
                'address' => 'Jl. Gurun Aua, Kubang Putih, Kec. Banuhampu, Kota Bukittinggi, Sumatera Barat 26181',
                'role' => 'admin',
                'is_active' => true,
            ]
        );
    }
}