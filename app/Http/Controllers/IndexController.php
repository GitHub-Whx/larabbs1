<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Route;

class IndexController extends Controller
{
    public function index() {
        // 结果集
        $result = [];
        // 获取本地语言
        $result['lang'] = app()->getLocale();
        // 当前路由名称
        $result['currentrouteName'] = Route::currentRouteName();
        return $result;
    }
}
