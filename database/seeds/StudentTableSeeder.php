<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
            'name' =>' علي ابراهيم',
            'email' =>'Elsayed290@gmail.com',
            'password' => Hash::make('12345678'),
            'blood_id' => 1,
            'Gender_id' =>   1 ,
            'Grade_id' =>    1 ,
            'classroom_id' =>    3 ,
            'section_id' =>    1,
            'parent_id' =>   10 ,
            'birth_Date' =>   '2023-03-23 ',
            'deleted_at' =>   null ,
            'academic_year' =>  '  2023-02-09 ',
            'created_at' =>   '2023-03-21 22:44:49  ',
            'updated_at' =>  ' 2023-03-21 22:44:49 ',
        ]);
    }
}
