<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EstoqueTableSeeder extends Seeder
{
    static $nome = [
        'tomate',
        'lasanha ',
        'Manteiga ',
        'Margarina ',
        'Iogurte',
        'Presunto ',
        'Frango ',
        'filezinho',
        'coxão mole',
        'Salsicha '
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$nome as $nome) {
            DB::table('customers')->insert([
                'nome' => $nome,
                'descricao'=>('informações do item'),
                'unidadeMedida'=>(rand(1,10)*100),
                'quantidade'=>rand(0,10)
            ]);
        }
    }
}
