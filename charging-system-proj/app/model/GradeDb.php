<?php


namespace app\model;


class GradeDb extends Model
{
    public function __construct()
    {
        $this->table = "cs_grade";
    }
}