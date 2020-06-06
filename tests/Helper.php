<?php

namespace Tests;
use App\Models\User;

class Helper{

    public static function helperCreateNewUser($name, $email, $password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }
}