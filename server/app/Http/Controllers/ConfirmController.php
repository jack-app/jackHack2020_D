<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stones;

class ConfirmController extends Controller
{
    public function index() {
        return view('confirm');
    }

    public function saveStoneData(Request $request) {
        // $validator = Validator::make($request->all(),[
        //         'class_no'    => 'required|nullable|string|max:10',
        //         'grade_id'    => 'required|nullable|integer|digits_between:1,11',
        //         'category_id' => 'required|integer|digits_between:1,20',
        // ]);

        $stone = new Stones;
        $post_data = $request->all();
        $post_data['user_id'] = 1;

        $stone->user_id = $post_data['user_id'];
        $stone->stone_name = $post_data['name'];
        $stone->hp = $post_data['hp'];
        $stone->attack = $post_data['attack'];
        $stone->defence = $post_data['defence'];
        $stone->color = $post_data['color'];

        $stone->save();

        return view('fight');
    }
}
