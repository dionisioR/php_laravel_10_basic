<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'user1',
                'password' => password_hash('user1', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'password' => password_hash('user2', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user3',
                // 'password' => password_hash('user3', PASSWORD_DEFAULT), // Poderia ser feito assim também
                'password' => Hash::make('user3'), // Forma mais recomendada - teria o mesmo efeito
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
