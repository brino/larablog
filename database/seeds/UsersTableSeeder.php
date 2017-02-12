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
        $bio = 'Iusto ullam iusto sunt asperiores velit corrupti esse. Minus dolores ea eos. Officia sint rem eveniet minus. Ut cupiditate doloremque aliquid quia aut laboriosam vitae. Enim nam eaque itaque quas praesentium sed et quos. Corrupti neque blanditiis volupta';

        DB::table('users')->insert([['name' => env('SUPER_USER','super'), 'bio' => $bio, 'super' => true, 'contributor' => true, 'api_token' => str_random(60), 'email' => env('SUPER_EMAIL','super@man.com'), 'password' => bcrypt(env('SUPER_PWD','password')),'created_at' => '2016-04-20 20:49:30']]);

        if(strtolower(App::environment()) != 'production')
            factory(App\User::class, 1)->create();
    }
}
