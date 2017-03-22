<?php

use Illuminate\Database\Seeder;

class SpendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('spends')->truncate();
        factory('App\Spend',200)->create();
    }
}
