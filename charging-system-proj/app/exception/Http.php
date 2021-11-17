<?php
namespace app\exception;

use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use think\facade\Log;
use think\Response;
use Throwable;

class Http extends Handle
{
    public function render($request, Throwable $e): Response
    {
        // 参数验证错误
        if ($e instanceof ValidateException) {
            returnMsg(422, $e->getError());
        }

        // 请求异常
        if ($e instanceof HttpException && ($request->isAjax() || $request->isPost())) {
            returnMsg($e->getStatusCode(), $e->getMessage());
        } else {
            dd($e);
            abort(500, "服务器出现异常");
        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }
}