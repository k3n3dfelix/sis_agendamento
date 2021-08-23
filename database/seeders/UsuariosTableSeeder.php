<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('usuarios')->insert([
            'tipo_id'=>'1',
            'nome'=>'Administrador',
            'sobrenome'=>'SobrenomeAdm',
            'login'=>'admin',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);
        DB::table('usuarios')->insert([
            'tipo_id'=>'2',
            'nome'=>'Professor1',
            'sobrenome'=>'SobrenomeProf1',
            'login'=>'prof1',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);
        DB::table('usuarios')->insert([
            'tipo_id'=>'2',
            'nome'=>'Professor2',
            'sobrenome'=>'SobrenomeProf2',
            'login'=>'prof2',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);

        DB::table('usuarios')->insert([
            'tipo_id'=>'2',
            'nome'=>'Professor3',
            'sobrenome'=>'SobrenomeProf3',
            'login'=>'prof3',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);

        DB::table('usuarios')->insert([
            'tipo_id'=>'3',
            'nome'=>'Aluno1',
            'sobrenome'=>'SobrenomeAlun1',
            'login'=>'alun1',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);

        DB::table('usuarios')->insert([
            'tipo_id'=>'3',
            'nome'=>'Aluno2',
            'sobrenome'=>'SobrenomeAlun2',
            'login'=>'alun2',
            'senha'=>'$2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);

        DB::table('usuarios')->insert([
            'tipo_id'=>'3',
            'nome'=>'Aluno3',
            'sobrenome'=>'SobrenomeAlun3',
            'login'=>'alun3',
            'senha'=>' $2y$10$KgPNF8SVnQ7wXXii.j300erVMLv6bAj/rcd5qNy15kgSLVzB850wS',
        ]);
    }
}
