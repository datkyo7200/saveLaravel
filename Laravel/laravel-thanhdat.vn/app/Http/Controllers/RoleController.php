<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Role;
class RoleController extends Controller
{
    //
    public function read()
    {
        # code...
        // $users = Role::find(4)
        // ->Users;
        // return $users;
        $roles = User::find(2)
        ->Roles;
        return $roles;
    }
}
