<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestingController extends Controller
{
    public function users() {
    	$users = User::all();
        return response()->json(['users'=> $users,], 200);
    }
}
