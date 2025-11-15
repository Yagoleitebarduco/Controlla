<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EssentialData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category' => 'Venda de Serviço'],
            ['category' => 'Venda de Produto'],
            ['category' => 'Outros'],
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
