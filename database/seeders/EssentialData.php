<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EssentialData extends Seeder
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

        DB::table('categories')->insert([
            ['type_category' => 1, 'category' => 'Venda de Serviço'],
            ['type_category' => 1, 'category' => 'Venda de Produto'],
            ['type_category' => 1, 'category' => 'Outros'],
            ['type_category' => 2, 'category' => 'inssumos'],
            ['type_category' => 2, 'category' => 'Sementes'],
            ['type_category' => 2, 'category' => 'Bebidas'],
        ]);

        DB::table('type_transactions')->insert([
            ['transaction' => 'Receita'],
            ['transaction' => 'Despesa'],

        ]);

        DB::table('type_payments')->insert([
            ['payment' => 'Pix'],
            ['payment' => 'Cartão de Credito'],
            ['payment' => 'Cartão de Debito'],
            ['payment' => 'Boleto'],
        ]);
    }
}
