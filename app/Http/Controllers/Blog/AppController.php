<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Response\ResponseJson;
use App\Member;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    use ResponseJson;

    public function test()
    {
        return 'success';
//        return Member::getMember();
    }

    public function add()
    {
        $bool = DB::table('student')->insert(
            ['name' => 'jack', 'age' => 18]
        );
    }

    public function query()
    {
        $students = DB::table('student')->get();
        return $this->jsonSuccessData($students);
    }

    public function clear()
    {
        DB::table('student')->truncate();
    }
}