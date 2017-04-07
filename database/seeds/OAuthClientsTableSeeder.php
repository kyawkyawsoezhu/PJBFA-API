<?php

use Illuminate\Database\Seeder;

class OAuthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('oauth_clients')->truncate();
		DB::table('oauth_clients')->insert([
			'user_id' => '1',
			'name' => 'Original for user one',
			'secret' => 'xyTFn9pGoEi0uLv6KPo6RPdBoXwyJbd9ftFwEAEt',
			'redirect' => 'http://localhost:8000',
			'personal_access_client' => '0',
			'password_client' => '0',
			'revoked' => '0'
		]);
    }
}
