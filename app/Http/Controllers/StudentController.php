<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    //DB facade实现 CURD
    public function test1()
    {
//        return 'test1';

        //新增
//        $bool = DB::insert('insert into student(name, age) values(?, ?)', ['imooc', 20]);
//        var_dump($bool);

        //更新
//        $bool = DB::update('update student set age = ? where name = ?', [20, 'sean']);
//        var_dump($bool);

        //查询
//        $students = DB::select('select * from student where id > ?', [1001]);
//        var_dump($students);
//        dd($students);

        //删除
//        $num = DB::delete('delete from student where id> ?', [1001]);
//        var_dump($num);
    }

    //使用查询构造器添加数据
    public function query1()
    {
        //新增一条数据，返回bool值
//        $bool = DB::table('student')->insert(
//            ['name' => 'jack', 'age' => 18]
//        );
//        var_dump($bool);

        //新增一条数据并返回数据id
//        $id = DB::table('student')->insertGetId(
//            ['name' => 'sean', 'age' => 18]
//        );
//        var_dump($id);

        //一次插入多条数据
//        $bool = DB::table('student')->insert([
//            ['name' => 'name1', 'age' => 18],
//            ['name' => 'name2', 'age' => 20],
//        ]);
//        var_dump($bool);
    }

    //使用查询构造器更新数据
    public function query2()
    {
        //1、更新指定数据，返回操作影响的行数
//        $num = DB::table('student')
//            ->where('id', 12)
//            ->update(['age' => 30]);
//        var_dump($num);

        //2、自增、自减
        //自增
//        $num = DB::table('student')->increment('age', 3);
//        var_dump($num);

        //自减
//        $num = DB::table('student')->decrement('age', 3);
//        var_dump($num);

        //自增自减带条件
//        $num = DB::table('student')
//            ->where('id', '12')
//            ->decrement('age', 3);

        //自增自减带条件，并修改其他参数
        $num = DB::table('student')
            ->where('id', '12')
            ->decrement('age', 3, ['name' => 'iimooc']);
        var_dump($num);
    }

    //使用查询构造器删除数据
    public function query3()
    {
        //1、delete()删除数据，并返回删除的行数
//        $num = DB::table('student')
//            ->where('id', 15)
//            ->delete();

//        $num = DB::table('student')
//            ->where('id', '>=', 15)
//            ->delete();
//        var_dump($num);

        //2、truncate()清空数据表
        DB::table('student')->truncate();
    }

    //使用查询构造器查询数据
    public function query4()
    {
        //查询操作 get() first() where() pluck() lists() select() chunk()

        //1、get()返回所有表数据
//        $students = DB::table('student')->get();
//        dd($students);

        //2、first 获取排序结果第一条数据
//        $student = DB::table('student')
//            ->orderBy('id', 'desc')
//            ->first();
//        dd($student);

        //3、where 查询部分数据
//        $students = DB::table('student')
//            ->where('id', '>=', 1002)
//            ->get();

        //where 加多个条件查询
//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age >= ?', ['1001', 18])
//            ->get();

        //5、pluck 查询字段
//        $names = DB::table('student')
//            ->pluck('name');
//        dd($names);

        //6、lists 查询字段，id作为下标 5.3已弃用
//        $names = DB::table('student')
//            ->lists('name', 'id');
//        dd($names);

        //7、select 只查询部分字段
//        $names = DB::table('student')
//            ->select('id', 'name', 'age')
//            ->get();

        //8、chunk 分段获取数据，每次查两条
        DB::table('student')
            ->orderBy('id', 'desc')
            ->chunk(2, function ($students) {
               var_dump($students);
               //指定条件下停止
               //return false;
            });
    }

    //聚合函数
    public function query5()
    {
        //1、count()取条数
//        $num = DB::table('student')->count();

        //2、max()最大值
//        $max = DB::table('student')->max('age');

        //3、ming()最小值
//        $min = DB::table('student')->min('age');

        //4、avg()求平均数
//        $avg = DB::table('student')->avg('age');

        //5、sum()求和
        $sum = DB::table('student')->$sum('age');
        var_dump($sum);
    }

    public function orm1()
    {
        //1、all() 查询所有数据
//        $students = Student::all();

        //2、find() 根据主键进行查询
//        $student = Student::find(1001);

        //3、findOrFail() 根据主键进行查询，如果没查到就抛出异常
//        $student = Student::findOrFail(1001);

        //4、查询构造器在orm中的使用
//        $students = Student::get();
//        $students = Student::where('id', '>', '1001')
//            ->orderBy('age', 'desc')
//            ->first();

//        echo '<pre>';
//        Student::chunk(2, function (Student) {
//           var_dump($students);
//        });

        //聚合函数
//        $num = Student::count();
        $max = Student::where('id', '>', 1001)->max('age');
        var_dump($max);
    }

    public function orm2()
    {
        //1、使用模型新增数据
        $student = new Student();
//        $student->name == 'hello';
//        $student->age == '18';
//        $bool = $student->save();
//        dd($bool);

//        $student = Student::find(1001);
//        echo date('Y-m-d H:i:s', $student->created_at);

        //2、使用模型的create方法新增数据
//        $student = Student::create(
//            ['name' => 'xiaofei', 'age' => '33']
//        );
//        dd($student);

        //以属性查找用户，若没有则新增，并取得新的实例
        //firstOrCreate()
//        $student = Student::firstOrCreate(
//            ['name' => 'imoocss']
//        );

        //以属性查找用户，若没有则建立新的实例。如果需要保存的话，自己调用save()
        //firstOrNew()
        $student = Student::firstOrNew(
            ['name' => 'imocsss']
        );
        $bool = $student->sava();
        dd($bool);
    }

    public function orm3()
    {
        //1、通过模板更新数据
//        $student = Student::find(1021);
//        $student->name = 'kitty';
//        $bool = $student->sava();
//        dd($bool);

        //2、通过查询语句，批量更新
        $num = Student::where('id', '>', '1019')->update(
            ['age' => 41]
        );
        var_dump($num);
    }

    public function orm4()
    {
        //1、通过模型删除
//        $student = Student::find(1021);
//        $bool = $student->delete();
//        var_dump($bool);

        //2、通过主键删除
//        $num = Student::destroy(1020);
//        $num = Student::destroy(1018, 1019);
//        $num = Student::destroy([1016, 1017]);
//        var_dump($num);

        //3、删除指定条件的数据
        $num = Student::where('id', '>', 1004)->delete();
        var_dump($num);
    }

    /*
     * Blade模板引擎
     */
    public function section1()
    {
        $students = [];
//        $students = Student::get();

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

    /*
     * Controller
     */
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

        //打印所有参数
//        $res = $request->all();
//        dd($res);

        // 2. 判断请求类型
//        echo $request->method();

//        if ($request->isMethod('GET')) {
//            echo 'Yes';
//        } else {
//            echo 'No';
//        }

        //判断是否ajax请求
//        $res = $request-ajax();
//        var_dump($res);

        //判断是否student下的请求
//        $res = $request->is('student/*');
//        var_dump($res);

        //取当前请求的url
        echo $request->url();
    }

    public function session1(Request $request)
    {
        // 1. HTTP Request 类的 session() 方法
//        $request->session()->put('key1', 'value1');
//        echo $request->session()->get('key1');

        // 2. Session()辅助函数
//        session()->put('key2', 'value2');
//        echo session()->get('key2');

        // 3. 通过Session facade类
        //存储数据到Session
//        Session::put('key3', 'value3');

        // 获取Session的值
//        echo Session::get('key3');
        //不存在则取默认值
//        echo Session::get('key4', 'default');

        // 以数组的形式存储数据
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
        // 获取session所有的数据
//        $res  = Session::all();
//        var_dump($res);

        // 删除session中指定的key的值
//        Session::forget('key1');

        // 清空所有session信息
//        Session::flush();

//        echo Session::get('key-flash');

//        return Session::get('message', '暂无信息');
//        return 'session2';
    }

    public function response()
    {
        // 1. 字符串
        // 2. 视图
        // 3. 响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'data' => 'sean',
//        ];
//        return response()->json($data);

        // 4. 重定向
//        return redirect('session2');
        // 重定向携带session数据
//        return redirect('session2')->with('message', '我是快闪数据');

        // 重定向action()
//        return redirect()->action('StudentController@session2')
//            ->with('message', '我是快闪数据');

        // 重定向route()
//        return redirect()->route('session2')
//            ->with('message', '我是快闪数据');

        // 返回上一个页面
        return redirect()->back();
    }


    // Middleware中间件
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

    /*
     * upload
     */
    public function upload()
    {
        return 'upload';
    }

    /*
     * cache
     */
    public function cache1()
    {
        // put()添加缓存
        // Cache::put('key1', 'val1', 10);

        // add()添加缓存，若key存在，添加失败
        // $bool = Cache::add('key2', 'val2', 10);
        // var_dump($bool);

        // forever()永久保存对象到缓存中
        // Cache::forever('key3', 'val3');


        // has()判断一个key存不存在
//        if (Cache::has('key1')) {
//            $val = Cache::hsa('key1');
//            var_dump($val);
//        } else {
//            echo 'No';
//        }
    }

    public function cache2()
    {
        // get()
        // $val = Cache::get('key3');

        // pull()取出缓存并删除
        // $val = Cache::pull('key3');
        // var_dump($val);

        // forget()从缓存中删除对象，删除成功返回true，否则返回false
        $bool = Cache::forget('key1');
        var_dump($bool);
    }

    public function error()
    {
        // $name = 'sean';
        // var_dump($name);

        // return view('student.error');

        // $student = DB::table('student') 1001
//        $student = null;
//        if ($student == null) {
//            abort('503');
//        }

//        Log::info('这是一个info级别的日志');
//        Log::warning('这是一个warning级别的日志');
//        Log::error('这是一个数组', ['name' => 'sean', 'age' => 18]);
    }
}