<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('settings')->delete();
         $data=[
            ['key'=>'current-year', 'value'=>'20232-2023'],
            ['key'=>'title', 'value'=>'جامعة عمر بن الخطاب'],
            ['key'=>'address', 'value'=>'kofour-negm'],
            ['key'=>'end-first-year', 'value'=>'20-2-2023'],
            ['key'=>'end-second-year', 'value'=>'20-6-2023'],
            ['key'=>'phone', 'value'=>'010170084557'],
            
         ];
         DB::table('settings')->insert($data);
    }
}
