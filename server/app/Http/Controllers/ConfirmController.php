<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stones;
use App\User;

class ConfirmController extends Controller
{
    public function index() {
        $user_stone = User::find(1)->stones;
        $enemy_stone = User::find(2)->stones;
        return view('confirm',compact('enemy_stone','user_stone'));
    }
}
