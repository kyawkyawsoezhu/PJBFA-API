<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
        factory('App\User',1)->create([
	        'name' => 'Kyaw Kyaw Soe',
	        'username' => 'kyawkyawsoezhu',
	        'email' => 'kyawkyawsoe.zhu@gmail.com',
	        'password' => bcrypt('123'),
        ]);
        factory('App\User',4)->create([
        	'password' => bcrypt('123'),
        ]);
    }
}
