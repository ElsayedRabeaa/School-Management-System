<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
        DB::table('myparents')->insert([
       
            'email' =>'sayed50@gmail.com',
            'password' => Hash::make('12345678'),
            'Name_Father' => 'ali',
            'National_Id_Father' =>   3451 ,
            'Phone_Father' => '   0105478575478568 ',
            'Job_Father' =>    'software developer' ,
            'Blood_Father_Id' =>  1 ,
            'Address_Father' =>    'zag' ,
            'Name_Mother' =>   'yomna',
            'National_Id_Mother' =>456,
            'Phone_Mother' =>'010436678',
            'Job_Mother' =>'home parent',
            'Blood_Mother_Id' =>1,
            'Address_Mother' =>'zag',
            'created_at' =>   '2023-03-21 22:44:49  ',
            'updated_at' =>  ' 2023-03-21 22:44:49 ',
        ]);
    }
}
