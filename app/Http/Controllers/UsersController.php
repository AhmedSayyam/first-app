<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hpp\Models\User;

class UsersController extends Controller
{
    public function getUsers(){
        $data = User::all();
        return $data;
    }
}
