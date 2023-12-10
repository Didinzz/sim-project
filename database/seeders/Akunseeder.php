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
                'password' => bcrypt('8520'),
            ],
            [
                'name' => 'kepsek',
                'email' => 'kepsek@gmail.com',
                'password' => bcrypt('8520'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
