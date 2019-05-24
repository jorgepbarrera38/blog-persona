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
            'name' => 'Jorge Alexis Paz Barrera',
            'email' => 'jorgepbarrera38@gmail.com',
            'username' => 'alexis',
            'info' => 'Hola soy Alexis, soy ingeniero de sistemas y me apasiona el desarrollo de software, en cuanto a programación tengo conocimientos en Laravel, Node.Js, Vue, Electron-vue entre otras tecnologías.',
            'password' => bcrypt(123456)
        ]);
    }
}
