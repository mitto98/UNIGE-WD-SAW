<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $u = new \App\User();
        $u->registration_number = "S4482314";
        $u->name = "Mattia Dapino";
        $u->email = "mattia.dapino@gmail.com";
        $u->password = Hash::make("mammapapa");
        $u->save();
    }
}
