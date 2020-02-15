<?php

use App\User;
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
        $user = User::create([
            'first_name' => '',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123')
        ]);
        $user->attachRole('super_admin');
    }
}
