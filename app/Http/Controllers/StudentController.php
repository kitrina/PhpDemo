<?php

namespace App\Http\Controllers;

use App\Sutdent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function orm1()
    {
        //all()
//        $students = Sutdent::all();

        //find()
//        $student = Sutdent::find(1001);

        //findOrFail()
//        $student = Sutdent::findOrFail(1001);

//        $students = Sutdent::get();
//        $students = Sutdent::where('id', '>', '1001')
//            ->orderBy('age', 'desc')
//            ->first();

//        echo '<pre>';
//        Sutdent::chunk(2, function ($sutdents) {
//           var_dump($sutdents);
//        });

        //聚合函数
//        $num = Sutdent::count();
        $max = Sutdent::where('id', '>', 1001)->max('age');
        var_dump($max);
    }

    public function orm2()
    {
        //使用模型新增数据
        $student = new Sutdent();
//        $student->name == 'hello';
//        $student->age == '18';
//        $bool = $student->save();
//        dd($bool);

//        $student = Student::find(1001);
//        echo date('Y-m-d H:i:s', $student->created_at);

        //使用模型的create方法新增数据

//        $student = Sutdent::create(
//            ['name' => 'xiaofei', 'age' => '33']
//        );
//        dd($student);

        //firstOrCreate()
//        $student = Sutdent::firstOrCreate(
//            ['name' => 'imoocss']
//        );

        //firstOrNew()
        $student = Sutdent::firstOrNew(
            ['name' => 'imocsss']
        );
        $bool = $student->sava();
        dd($bool);
    }

    public function orm3()
    {
        //通过模板更新数据
//        $student = Student::find(1021);
//        $student->name = 'kitty';
//        $bool = $student->sava();
//        dd($bool);

        $num = Sutdent::whert('id', '>', '1019')->update(
            ['age' => 41]
        );
        var_dump($num);
    }

    public function orm4()
    {
        //通过模型删除
//        $student = Sutdent::find(1021);
//        $bool = $student->delete();
//        var_dump($bool);

        //通过主键删除
//        $num = Sutdent::destroy(1020);
//        $num = Sutdent::destroy(1018, 1019);
//        $num = Sutdent::destroy([1016, 1017]);
//        var_dump($num);

        //删除指定条件的数据
        $num = Sutdent::where('id', '>', 1004)->delete();
        var_dump($num);
    }

    public function section1()
    {
        $students = [];
//        $students = Sutdent::get();

        $name = 'sean';
        $arr = ['sean', 'imooc'];

        return view('student.section1', [
            'name' => $name,
            'arr' => $arr,
            'students' => $students,
        ]);
    }

    public function urlTest()
    {
        return 'urlTest';
    }

    public function request1(Request $request)
    {
        // 1. 取值
//        echo $request->input('name');
//        echo $request->input('sex', '未知');

//        if ($request->has('name')) {
//            echo $request->input('name');
//        } else {
//            echo '无该参数';
//        }

//        $res = $request->all();
//        dd($res);

        // 2. 判断请求类型
//        echo $request->method();

//        if ($request->isMethod('GET')) {
//            echo 'Yes';
//        } else {
//            echo 'No';
//        }

//        $res = $request-ajax();
//        var_dump($res);

//        $res = $request->is('student/*');
//        var_dump($res);

        echo $request->url();
    }

//    由于HTTP协定是无状态的（Stateless）的，所以session提供一种保存用户数据的方法
//
//    Laravel支持了多种session后端驱动，并提供清楚、统一的 API。也内置支持如Memcached、Redis和数据库的后端驱动。默认使用"file"的Session驱动。
//
//    session的配置文件配置在config/session.php中


    public function session1(Request $request)
    {
        // 1. HTTP Request session()
//        $request->session()->put('key1', 'value1');
//        echo $request->session()->get('key1');

        // 2. Session()
//        session()->put('key2', 'value2');
//        echo session()->get('key2');

        // 3. Session
        //存储数据到Session
//        Session::put('key3', 'value3');

        // 获取Session的值
//        echo Session::get('key3');
        //不存在则取默认值
//        echo Session::get('key4', 'default');

        // 已数组的形式存储数据
//        Session::put(['key4' => 'value4']);

        // 把数据放到Session的数组中
//        Session::push('student', 'sean');
//        Session::push('student', 'imooc');
//        $res = Session::get('student', 'default');
//        var_dump($res);

        // 取出数据并删除
//        $res = Session::pull('student', 'default');
//        var_dump($res);

        //取出所有的值
//        $res  = Session::all();
//        dd($res);

        // 判断session中某个key是否存在
//        if (Session::has('key11')) {
//            $res  = Session::all();
//            dd($res);
//        } else {
//            echo '你们老大不在';
//        }

        //暂存数据
        Session::flash('key-flash', 'val-flash');
    }

    public function session2(Request $request)
    {
        return Session::get('message', '暂无信息');
//        return 'session2';

//        echo Session::get('key-flash');

        // 获取session所有的数据
//        $res  = Session::all();
//        var_dump($res);

        // 删除session中指定的key的值
//        Session::forget('key1');

        // 清空所有session信息
//        Session::flush();

//        $res  = Session::all();
//        var_dump($res);

    }

    public function response()
    {
        // 3. 响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'data' => 'sean',
//        ];
//        return response()->json($data);

        // 4. 重定向
//        return redirect('session2');
//        return redirect('session2')->with('message', '我是快闪数据');

        // action()
//        return redirect()->action('StudentController@session2')
//            ->with('message', '我是快闪数据');

        // route()
//        return redirect()->route('session2')
//            ->with('message', '我是快闪数据');

        return redirect()->back();
    }

    // 活动的宣传页面
    public function activity0()
    {
        return '活动快要开始啦，尽请期待';
    }


    // 活动的宣传页面
    public function activity1()
    {
        return '活动进行中，谢谢您的参与1';
    }

    // 活动的宣传页面
    public function activity2()
    {
        return '活动进行中，谢谢您的参与2';
    }
}