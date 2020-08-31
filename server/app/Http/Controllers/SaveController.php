<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stones;

class SaveController extends Controller
{
    public function index() {
        return view('save');
    }

    public function saveStoneData(Request $request) {
        // $validator = Validator::make($request->all(),[
        //         'hp'    => 'required|nullable|string',
        //         'attack'    => 'required|nullable|integer',
        //         'defence' => 'required|integer',
        // ]);

        $stone = new Stones;
        $post_data = $request->all();
        $post_data['name'] = 'SatomiIshihara';
        $post_data['user_id'] = 1;

        $stone->user_id = $post_data['user_id'];
        $stone->stone_name = $post_data['name'];
        $stone->hp = 20;
        // $stone->hp = $post_data['hp'];
        $stone->attack = 50;
        // $stone->attack = $post_data['attack'];
        $stone->defence = 20;
        // $stone->defence = $post_data['defence'];
        $stone->color = 1;
        // $stone->color = $post_data['color'];

        $stone->save();

        return redirect('/confirm');
    }
}
