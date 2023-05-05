<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'Name' =>"sameh mostafa",
            'email' =>'sameh700@gmail.com',
            'password' => Hash::make('12345678'),
            'Specialization_id' => 1,
            'Gender_id' =>   1 ,
            'Joining_Date' =>   '2023-03-23 ',
            'Address' =>   'near to club street' ,
            'created_at' =>   '2023-03-21 22:44:49  ',
            'updated_at' =>  ' 2023-03-21 22:44:49 ',
        ]);
    }
}
