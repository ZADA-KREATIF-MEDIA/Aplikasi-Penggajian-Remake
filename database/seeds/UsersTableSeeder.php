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
        $user = App\User::create([
            'name'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => '$10$d4gq.l20gATsH4mAaRtJ.eqqncqy9ZeMF.AooQdb8fTMMZ5bi0B46',
            'level'         => 'admin'
        ]);
    }
}
