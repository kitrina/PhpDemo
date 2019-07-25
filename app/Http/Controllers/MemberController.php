<?php

namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info($id)
    {
        return Member::getMember();

//        return 'member-info-id-' . $id;
//        return route('memberinfo');
//        return view('member-info');
//        return view('member/info', [
//            'name' => '小阿飞',
//            'age' => 18
//        ]);
    }
}