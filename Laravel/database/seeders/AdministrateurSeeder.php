<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administrateur')->insert([

            [
                'matricule'=>'2080391' ,
                'nom'=>'Faleyras' ,
                'prenom'=>'Boaz' ,
                'email'=>'f.maths@cegeptr.qc.ca',
                'mot_de_passe'=>'qwerty123' ,
                'admin'=>'1'

            ]
        ]);
    }
}
