<?php

namespace App\Http\Controllers;

use App\Sutdent;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    //DB facade实现 CURD
    public function test1()
    {
//        return 'test1';

//        //新增
//        $bool = DB::insert('insert into student(name, age) values(?, ?)', ['imooc', 20]);
//        var_dump($bool);
//
//        //更新
//        $bool = DB::update('update student set age = ? where name = ?', [20, 'sean']);
//        var_dump($bool);

        //查询
//        $students = DB::select('select * from student');
//        var_dump($students);
//        dd($students);

        //删除
//        $num = DB::delete('delete from student wher id> ?', [1001]);
//        var_dump($num);
    }
}