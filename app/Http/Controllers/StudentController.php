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

    //使用查询构造器添加数据
    public function query1()
    {
//        $bool = DB::table('student')->insert(
//            ['name' => 'jack', 'age' => 18]
//        );
//        var_dump($bool);

//        $id = DB::table('student')->insertGetId(
//            ['name' => 'sean', 'age' => 18]
//        );
//        var_dump($id);

//        $bool = DB::table('student')->insert([
//            ['name' => 'name1', 'age' => 18],
//            ['name' => 'name2', 'age' => 20],
//        ]);
//        var_dump($bool);
    }

    //使用查询构造器更新数据
    public function query2()
    {
//        $num = DB::table('student')
//            ->where('id', 12)
//            ->update(['age' => 30]);
//        var_dump($num);

//        $num = DB::table('student')->increment('age', 3);
//        var_dump($num);

//        $num = DB::table('student')->decrement('age', 3);
//        var_dump($num);

//        $num = DB::table('student')
//            ->where('id', '12')
//            ->decrement('age', 3);

        $num = DB::table('student')
            ->where('id', '12')
            ->decrement('age', 3, ['name' => 'iimooc']);
        var_dump($num);
    }

    //使用查询构造器删除数据
    public function query3()
    {
//        $num = DB::table('student')
//            ->where('id', 15)
//            ->delete();

//        $num = DB::table('student')
//            ->where('id', '>=', 15)
//            ->delete();
//        var_dump($num);

        //清空数据表
        DB::table('student')->truncate();
    }

    //使用查询构造器查询数据
    public function query4()
    {
//        $students = DB::table('student')->get();
//        dd($students);

        //first 获取第一条数据
//        $student = DB::table('student')
//            ->orderBy('id', 'desc')
//            ->first();
//        dd($student);

        //where 查询部分数据
//        $students = DB::table('student')
//            ->where('id', '>=', 1002)
//            ->get();

//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age >= ?', ['1001', 18])
//            ->get();

        //pluck 查询字段
//        $names = DB::table('student')
//            ->pluck('name');
//        dd($names);

        //lists 5.3已弃用
//        $names = DB::table('student')
//            ->lists('name', 'id');
//        dd($names);

        //select 只查询部分字段
//        $names = DB::table('student')
//            ->select('id', 'name', 'age')
//            ->get();

        //chunk
        DB::table('student')
            ->orderBy('id', 'desc')
            ->chunk(2, function ($students) {
               var_dump($students);
            });
    }

    //聚合函数
    public function query5()
    {
//        $num = DB::table('student')->count();

//        $max = DB::table('student')->max('age');

//        $min = DB::table('student')->min('age');

//        $avg = DB::table('student')->avg('age');

        $sum = DB::table('student')->$sum('age');
        var_dump($sum);


    }
}