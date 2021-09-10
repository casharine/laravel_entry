<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    public function handle($request, Closure $next)
    {
        $data = [
            ['name'=>'taro', 'mail'=>'taro@yamada'],
            ['name'=>'jiro', 'mail'=>'jiro@yamada'],
            ['name'=>'goro', 'mail'=>'goro@yamada'],];
        $request->merge(['data'=>$data]);
        return $next($request);
    }
}
