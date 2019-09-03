<?php

use Illuminate\Database\Seeder;
use Redsocialapre\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class)->create(['email' => 'jorge@gmail.com']);
    }
}
