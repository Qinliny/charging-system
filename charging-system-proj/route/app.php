<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get("/", "Index/index");

// 首页
Route::get("/index", "Index/home");

// 学生管理
Route::group("/student", function() {
    Route::get("/", "Student/index");
});

// 幼儿园名称
Route::group("/nursery", function() {
    Route::get("/", "Educational/nurserySchoolName");
    Route::post("/save", "Educational/addNurseryName");
    Route::post("/list", "Educational/nurserySchoolName");
    Route::post("/editData", "Educational/editNurseryName");
});

// 年级设置
Route::group("/grade", function() {
    Route::get("/", "Educational/grade");
    Route::post("/list", "Educational/grade");
    Route::post("/save", "Educational/addGrade");
    Route::post("/editData", "Educational/editGrade");
});

// 兴趣班设置
Route::group("/interestClasses", function() {
    Route::get("/", "Educational/interestClasses");
    Route::post("/list", "Educational/interestClasses");
    Route::post("/save", "Educational/addInterestClasses");
    Route::post("/editData", "Educational/editInterestClasses");
});

// 午托班设置
Route::group("/wuTuoClass", function() {
    Route::get("/", "Educational/wuTuoClass");
    Route::post("/list", "Educational/wuTuoClass");
    Route::post("/save", "Educational/addWuTuoClass");
    Route::post("/editData", "Educational/editWuTuoClass");
});

// 班级设置
Route::group("/class", function() {
    Route::get("/", "Educational/classSetting");
    Route::post("/list", "Educational/classSetting");
    Route::post("/save", "Educational/addClass");
    Route::post("/editData", "Educational/editClass");
});

// 收费任务
Route::group("/chargeTask", function() {
    Route::get("/", "ChargeSetting/chargeTask");
    Route::post("/list", "ChargeSetting/chargeTask");
    Route::post("/save", "ChargeSetting/addChargeTask");
});
