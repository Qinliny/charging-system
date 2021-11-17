<?php


namespace app\model;


use think\facade\Db;

class Model
{
    protected $table = "";

    public function getList($condition = [], $field = ["*"], $page = 1, $limit = 10) {
        return Db::table($this->table)->where($condition)->field($field)
                    ->paginate(['list_rows'=>$limit, 'page'=>$page]);
    }

    public function select($condition = [], $field = ["*"]) {
        return Db::table($this->table)->where($condition)->field($field)->select();
    }

    public function delete($condition = []) {
        return Db::table($this->table)->where($condition);
    }

    public function update($condition = [], $updateData = []) {
        return Db::table($this->table)->where($condition)->update($updateData);
    }

    public function insert($data) {
        return Db::table($this->table)->insert($data);
    }

    public function find($condition = [], $field = ["*"]) {
        return Db::table($this->table)->where($condition)->field($field)->find();
    }
}