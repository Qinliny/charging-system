<?php


namespace app\model;


use think\facade\Db;

class ClassDb extends Model
{
    protected $gradeTable = "cs_grade";
    public function __construct()
    {
        $this->table = "cs_class";
    }

    public function getList($condition = [], $field = ["*"], $page = 1, $limit = 10)
    {
        return Db::table($this->table)->alias('a')
                ->join($this->gradeTable . " b", 'a.grade_id = b.id')
                ->where($condition)
                ->field($field)
                ->paginate(['list_rows'=>$limit, 'page'=>$page]);
    }
}