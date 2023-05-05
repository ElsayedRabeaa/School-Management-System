<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Blood;


class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->delete();
        $blood_types=['o-','o+','A-','A+','B-','B+','AB-','AB+'];
        foreach($blood_types as $bt)
        {Blood::create(['name'=>$bt]);
        }
    }
}
