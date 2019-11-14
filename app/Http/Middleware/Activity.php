<?php

namespace App\Http\Middleware;

use Closure;

class Activity
{

    /*
    // 前置操作
    public function handle($request, Closure $next)
    {
        if (time() < strtotime('2019-07-05')) {
            return redirect('activity0');
        }

        return $next($request);
    }
    */

    // 后置操作
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        echo ($response);


        // 逻辑

        echo '我是后置操作';
    }
}