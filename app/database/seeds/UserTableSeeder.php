<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = new User;
        $user->email = 'admin@localhost';
        $user->password = Hash::make('1234567');
        $user->save();
    }

}