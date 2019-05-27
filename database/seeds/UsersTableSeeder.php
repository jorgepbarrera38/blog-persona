<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Default names',
            'email' => 'admin@mail.com',
            'username' => 'default',
            'info' => 'Info',
            'password' => bcrypt(123456)
        ]);
    }
}
