<?php


namespace App\Services;

use App\Models\User;

class AuthUserService
{
    // to register a new user
    public function user(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' =>  $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' =>  $data['mobile'],
            'age' => $data['age'],
            'gender' => $data['gender'],
        ]);
        return $user;
    }

}
