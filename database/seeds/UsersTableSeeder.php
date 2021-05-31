<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,5)->create();

        $user = new User();
        $user->name = 'Walter Sono';
        $user->role = 'Administrator';
        $user->email = 'root@root.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
