<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Yago',
            'lastname' => 'Leite Barduco',
            'cpf' => '490.493.788-03',
            'phone' => '(13) 99746-5192',
            'date_nasc' => '2007-05-26',
            'email' => 'yago.g4c@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
