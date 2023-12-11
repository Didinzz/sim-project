<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;


class Akunseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'ttd' => 'default.png',
                'role' => '1',
                'password' => bcrypt('8520'),
            ],
            [
                'name' => 'Kepala Sekolah',
                'email' => 'kepsek@gmail.com',
                'ttd' => 'default.png',
                'role' => '2',
                'password' => bcrypt('asdf'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
