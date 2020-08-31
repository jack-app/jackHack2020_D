<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stones;
use App\User;

class FightController extends Controller
{
    public function index() {
        $user_stone = User::find(1)->stones;
        $enemy_stone = User::find(2)->stones;
        return view('fight',compact('enemy_stone','user_stone'));
    }

    // public function stone($id)
    // {
    //     try {
    //         $stone = App\User::find($id)->stones;
    //         Log::info(__METHOD__,["stone" =>$stone]);
    //     } catch (Exception $e) {
    //         Log::error($e);
    //         return $this->redirectWithMessage('/fight', '石データの取得に失敗しました。', true);
    //     }

    //     // ビューの指定
    //     return view('fight', compact('stone'));
    // }

}
