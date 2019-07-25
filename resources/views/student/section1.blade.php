@extends('layouts')



@section('header')
    @parent
    header
@stop

@section('sidebar')
    sidebar
@stop

@section('content')
    content


    <!-- 1. 模板中输出PHP变量 -->
    <p>{{ $name }}</p>

    <!-- 1. 模板中调用PHP代码 -->
    <p>{{ time() }}</p>
    <p>{{ date('Y-m-d H:i:s', time()) }}</p>

    <p>{{ in_array($name, $arr) ? 'true' : 'false' }}</p>
    <p>{{ var_dump($arr) }}</p>

    <p>{{ isset($name) ? $name : 'default' }}</p>
    <p>{{ $name or 'default' }}</p>

    <!-- 3. 原样输出 -->
    <p>@{{ $name }}</p>

    {{-- 4. 模板中的注释 --}}

    {{-- 5. 引入子视图 include --}}
    @include('student/common1', ['message' => '我是错误信息'])
@stop