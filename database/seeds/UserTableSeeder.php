<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'aray@test.id')->first();

        if (!$user) {
            User::create([
                'name' => 'Aray Turtle',
                'email' => 'aray@test.id',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
