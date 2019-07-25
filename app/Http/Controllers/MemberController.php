<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function info($id)
    {
        return 'member-info-id-' . $id;
//        return route('memberinfo');
    }
}