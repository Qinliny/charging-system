<?php


namespace app\controller;


use app\BaseController;
use app\model\NurseryNameDb;
use app\model\GradeDb;
use app\model\InterestClassesDb;
use app\model\WuTuoClassDb;
use app\model\ClassDb;
use app\validate\EducationalValidate;
use think\facade\View;

class Educational extends BaseController
{
    // 幼儿园名称
    public function nurserySchoolName(NurseryNameDb $db) {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['nursery_name'])) {
                $condition[] = ['nursery_name', '=', $param['nursery_name']];
            }
            $result = $db->getList($condition, ["*"], $page, $limit);
            returnTables($result->total(), $result->items());
        }
        return view();
    }

    // 保存幼儿园名称数据
    public function addNurseryName(NurseryNameDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('saveNurseryName')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['nursery_name', '=', $param['nursery_name']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该幼儿园名称已存在，");
        }

        // 保存数据
        $db->insert([
            'nursery_name'  =>  $param['nursery_name'],
            'create_time'   =>  thisTime()
        ]);

        returnMsg(0, "保存成功");
    }

    // 修改幼儿园名称数据
    public function editNurseryName(NurseryNameDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('editNurseryName')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['nursery_name', '=', $param['nursery_name']],
            ['id', '<>', $param['nursery_id']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该幼儿园名称已存在，");
        }

        $db->update([
            'id'    =>  $param['nursery_id']
        ], ['nursery_name'=>$param['nursery_name']]);

        returnMsg(0, "修改成功");
    }

    // 年级设置
    public function grade(GradeDb $db) {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['grade'])) {
                $condition[] = ['grade', '=', $param['grade']];
            }
            $result = $db->getList($condition, ["*"], $page, $limit);
            returnTables($result->total(), $result->items());
        }
        return view();
    }

    // 保存年级名称
    public function addGrade(GradeDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('saveGradeName')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['grade_name', '=', $param['grade_name']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该年级名称已存在，");
        }

        // 保存数据
        $db->insert([
            'grade_name'    =>  $param['grade_name'],
            'create_time'   =>  thisTime()
        ]);

        returnMsg(0, "保存成功");
    }

    // 修改年级
    public function editGrade(GradeDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('editGradeName')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['grade_name', '=', $param['grade_name']],
            ['id', '<>', $param['grade_id']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该年级名称已存在，");
        }

        $db->update([
            'id'    =>  $param['grade_id']
        ], ['grade_name'=>$param['grade_name']]);

        returnMsg(0, "修改成功");
    }

    // 兴趣班设置
    public function interestClasses(InterestClassesDb $db) {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['interest_classes_name'])) {
                $condition[] = ['interest_classes_name', '=', $param['interest_classes_name']];
            }
            $result = $db->getList($condition, ["*"], $page, $limit);
            returnTables($result->total(), $result->items());
        }
        return view();
    }

    // 保存兴趣班
    public function addInterestClasses(InterestClassesDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('saveInterestClasses')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['interest_classes_name', '=', $param['interest_classes_name']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该兴趣班已存在，");
        }

        // 保存数据
        $db->insert([
            'interest_classes_name'    =>  $param['interest_classes_name'],
            'create_time'              =>  thisTime()
        ]);

        returnMsg(0, "保存成功");
    }

    // 修改兴趣班
    public function editInterestClasses(InterestClassesDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('editInterestClasses')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['interest_classes_name', '=', $param['interest_classes_name']],
            ['id', '<>', $param['interest_classes_id']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该兴趣班名称已存在，");
        }

        $db->update([
            'id'    =>  $param['interest_classes_id']
        ], ['interest_classes_name'=>$param['interest_classes_name']]);

        returnMsg(0, "修改成功");
    }

    // 午托班设置
    public function wuTuoClass(WuTuoClassDb $db) {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['wutuo_class_name'])) {
                $condition[] = ['wutuo_class_name', '=', $param['wutuo_class_name']];
            }
            $result = $db->getList($condition, ["*"], $page, $limit);
            returnTables($result->total(), $result->items());
        }
        return view();
    }

    // 保存午托班
    public function addWuTuoClass(WuTuoClassDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('saveWuTuoClass')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['wutuo_class_name', '=', $param['wutuo_class_name']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该午托班名称已存在，");
        }

        // 保存数据
        $db->insert([
            'wutuo_class_name'    =>  $param['wutuo_class_name'],
            'create_time'         =>  thisTime()
        ]);

        returnMsg(0, "保存成功");
    }

    // 修改午托班
    public function editWuTuoClass(WuTuoClassDb $db) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('editWuTuoClass')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['wutuo_class_name', '=', $param['wutuo_class_name']],
            ['id', '<>', $param['wutuo_class_id']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该午托班名称已存在，");
        }

        $db->update([
            'id'    =>  $param['wutuo_class_id']
        ], ['wutuo_class_name'=>$param['wutuo_class_name']]);

        returnMsg(0, "修改成功");
    }

    // 班级设置
    public function classSetting(ClassDb $db) {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['class_name'])) {
                $condition[] = ['class_name', '=', $param['class_name']];
            }
            if (!empty($param['grade_id'])) {
                $condition[] = ['grade_id', '=', $param['grade_id']];
            }
            $result = $db->getList($condition, ["a.id", "a.class_name", "a.create_time", "b.grade_name", "a.grade_id"], $page, $limit);
            returnTables($result->total(), $result->items());
        }
        $gradeDb = new GradeDb();
        $gradeList = $gradeDb->select([], ["id", "grade_name"]);
        View::assign("gradeList", $gradeList->toArray());
        return view();
    }

    // 保存班级
    public function addClass(ClassDb $db, GradeDb $gradeDb) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('saveClass')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['class_name', '=', $param['class_name']]
        ], ["id"]);

        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该班级名称已存在，");
        }

        // 判断年级ID是否正确
        $gradeRes = $gradeDb->find([
            ['id', '=', $param['gradeId']]
        ], ["id"]);
        if (empty($gradeRes)) {
            returnMsg(__LINE__, "年级名称数据不存在，");
        }

        // 保存数据
        $db->insert([
            'class_name'    =>  $param['class_name'],
            'grade_id'      =>  $param['gradeId'],
            'create_time'         =>  thisTime()
        ]);

        returnMsg(0, "保存成功");
    }

    // 修改班级
    public function editClass(ClassDb $db, GradeDb $gradeDb) {
        $param = request()->post();
        validate(EducationalValidate::class)->scene('editClass')->check($param);

        // 判断是否重复
        $res = $db->select([
            ['class_name', '=', $param['class_name']],
            ['id', '<>', $param['class_id']]
        ], ["id"]);
        if (!empty($res->toArray())) {
            returnMsg(__LINE__, "该班级名称已存在，");
        }

        // 判断年级ID是否正确
        $gradeRes = $gradeDb->find([
            ['id', '=', $param['gradeId']]
        ], ["id"]);
        if (empty($gradeRes)) {
            returnMsg(__LINE__, "年级名称数据不存在，");
        }

        $db->update([
            'id'    =>  $param['class_id']
        ], ['class_name'=>$param['class_name'], 'grade_id'=>$param['gradeId']]);

        returnMsg(0, "修改成功");
    }
}