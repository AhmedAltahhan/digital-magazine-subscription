<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function all($id)
    {
        $users = User::whereId($id)->paginate(request()->input('per_page', 10));
        return $users;
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($data)
    {
        return User::whereId($data['id'])->update($data);
    }

    public function show(string $id)
    {
        $User = User::findOrFail($id);
        return $User;
    }

    public function destroy(string $id)
    {
        User::whereId($id)->delete();
    }
}
