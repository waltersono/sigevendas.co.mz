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
        $user = new User();
        $user->name = 'Manager';
        $user->role = 'Manager';
        $user->email = 'manager@manager.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'Walter Sono';
        $user->role = 'Administrator';
        $user->email = 'root@root.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'Operator';
        $user->role = 'Operator';
        $user->email = 'operator@operator.com';
        $user->password = Hash::make('password');
        $user->store_id = 1;
        $user->save();
    }
}
