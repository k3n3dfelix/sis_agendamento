<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {   
        

        DB::table('tipos')->insert([
            'descricao'=>'Administrador'
        ]);
        DB::table('tipos')->insert([
            'descricao'=>'Professor'
        ]);
        DB::table('tipos')->insert([
            'descricao'=>'Aluno'
        ]);
    }
}
