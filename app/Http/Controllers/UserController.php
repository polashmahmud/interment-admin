<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('User', [
            'users' => User::latest()->paginate()
        ]);
    }
}
