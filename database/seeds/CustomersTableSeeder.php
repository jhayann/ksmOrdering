<?php

use Illuminate\Database\Seeder;
use App\Customer;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->name = "Grace Ceno";
        $customer->username = "grace";
        $customer->email = "graceann@yahoo.com";
        $customer->password = bcrypt("123456");
        $customer->address = "Caloocan";
        $customer->number = "09193317525";
        $customer->profileimg = "/graceann.jpg";
        $customer->save();
    }
}
