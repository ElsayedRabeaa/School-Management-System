<?php

use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libraries')->insert([
            'title' =>'intro to Algorithms',
            'file_name' =>'intro.pdf',
            'Grade_id' =>    1 ,
            'classroom_id' =>    4 ,
            'section_id' =>    2 ,
             'teacher_id'=> 11,
            'created_at' =>   '2023-03-21 22:44:49  ',
            'updated_at' =>  ' 2023-03-21 22:44:49 ',
        ]);
    }
}
