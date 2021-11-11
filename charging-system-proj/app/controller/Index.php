<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;

class Index extends BaseController
{
    /**
     * 应用主入口
     * @return \think\response\View
     */
    public function index() {
        return view();
    }

    /**
     * 主页
     * @return \think\response\View
     */
    public function home() {

        return view('index/home');
    }
}
