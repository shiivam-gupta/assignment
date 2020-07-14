<?php

use Illuminate\Database\Seeder;
use App\User;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@cricket.com')->get();
        if (count($user) == 0) {
            User::insert([
                'fullname' => 'admin',
                'email' => 'admin@cricket.com',
                'password' => Hash::make(12345678),
            ]);
        }
    }
}
