<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * @llf added 2021/04/12
 */
class EnableCrossOriginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $origin     = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        $originHost = parse_url($origin, PHP_URL_HOST);
        $originPort = parse_url($origin, PHP_URL_PORT);
        $originHost .= $originPort ? ':' . $originPort : '';
 
        // 允许跨域的域名 可以加在配置里
        $allowOriginHost = [
            '192.168.99.100:8088',
        ];
 
        $response = $next($request);
 
        // if (in_array($originHost, $allowOriginHost)) {
            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN, Last-Modified');
            $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
            $response->header('Access-Control-Allow-Credentials', 'true');
        // }
 
        return $response;

        // ————————————————
        // 版权声明：本文为CSDN博主「eddieHoo」的原创文章，遵循CC 4.0 BY-SA版权协议，转载请附上原文出处链接及本声明。
        // 原文链接：https://blog.csdn.net/u011323949/article/details/102778648
    }
}
