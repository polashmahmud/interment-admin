<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters($this->allowedFilters())
            ->allowedSorts('id', 'name')
            ->filter(Request::only('search'))
            ->paginate();

        return inertia()->render('User', [
            'users' => $users,
            'query' => request()->query(),
        ]);
    }

    protected function allowedFilters()
    {
        return [];
    }
}
