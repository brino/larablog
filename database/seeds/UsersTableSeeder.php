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
        DB::table('users')->insert([['name' => env('SUPER_USER','super'),'super' => true, 'contributor' => true, 'api_token' => str_random(60), 'email' => env('SUPER_EMAIL','super@man.com'), 'password' => bcrypt(env('SUPER_PWD','password')),'created_at' => '2016-04-20 20:49:30']]);

        if(strtolower(App::environment()) != 'production')
            factory(App\User::class, 10)->create();
    }
}
