<?php

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('offices')->truncate();
        factory('App\Office',20)->create();
    }
}
