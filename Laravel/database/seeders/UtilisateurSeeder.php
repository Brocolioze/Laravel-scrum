<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('utilisateurs')->insert([

            [
                'matricule'=>'2080392' ,
                'nom'=>'Faleyras' ,
                'prenom'=>'Boaz' ,
                'email'=>'f.boaz@cegeptr.qc.ca',
                'mot_de_passe'=>Hash::make('qwerty123')

            ],

            [
                'matricule'=>'2080393' ,
                'nom'=>'Marc' ,
                'prenom'=>'Antoine' ,
                'email'=>'m.antoine@cegeptr.qc.ca',
                'mot_de_passe'=>Hash::make('qwerty123')

            ]
        ]);
    }
}
