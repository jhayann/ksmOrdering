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
        $user = new User();
        $user->firstname = "Rey Jhon";
        $user->middlename = "Abarracoso";
        $user->lastname = "Baquirin";
        $user->email = "reyjhonbaquirin@yahoo.com";
        $user->password = bcrypt("123456");
        $user->save();
    }
}
