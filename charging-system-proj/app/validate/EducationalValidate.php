<?php


namespace app\validate;


use think\Validate;

class EducationalValidate extends Validate
{
    protected $rule = [
        'nursery_id'    =>  'require',
        'nursery_name'  =>  'require|max:10',
        'grade_id'      =>  'require',
        'grade_name'    =>  'require|max:10',
        'interest_classes_id'   =>  'require',
        'interest_classes_name' =>  'require|max:10',
        'wutuo_class_id'        =>  'require',
        'wutuo_class_name'      =>  'require|max:10',
        'class_id'              =>  'require',
        'class_name'            =>  'require|max:10',
        'gradeId'               =>  'require'
    ];

    protected $message = [
        'nursery_id.require'    =>  '参数异常',
        'nursery_name.require'  =>  '请输入幼儿园名称',
        'nursery_name.max'      =>  '幼儿园名称长度不能超过10',
        'grade_id.require'      =>  '参数异常',
        'grade_name.require'    =>  '请输入年级名称',
        'grade_name.max'        =>  '年级成名长度不能超过10',
        'interest_classes_id.require'   =>  '参数异常',
        'interest_classes_name.require' =>  '请输入兴趣班名称',
        'interest_classes_name.max'     =>  '兴趣班名称长度不能超过10',
        'wutuo_class_id.require'        =>  '参数异常',
        'wutuo_class_name.require'      =>  '请输入午托班名称',
        'wutuo_class_name.max'          =>  '午托班名称不能超过10',
        'class_id.require'              =>  '参数异常',
        'class_name.require'            =>  '请输入班级名称',
        'class_name.max'                =>  '班级名称长度不能超过10',
        'gradeId.require'               =>  '请选择年级'
    ];

    protected $scene = [
        'saveNurseryName'   =>  [
            'nursery_name'
        ],
        'editNurseryName'   =>  [
            'nursery_id', 'nursery_name'
        ],
        'saveGradeName'     =>  [
            'grade_name'
        ],
        'editGradeName'     =>  [
            'grade_id', 'grade_name'
        ],
        'saveInterestClasses'     =>  [
            'interest_classes_name'
        ],
        'editInterestClasses'     =>  [
            'interest_classes_id', 'interest_classes_name'
        ],
        'saveWuTuoClass'    =>  [
            'wutuo_class_name'
        ],
        'editWuTuoClass'    =>  [
            'wutuo_class_id', 'wutuo_class_name'
        ],
        'saveClass' => [
            'gradeId', 'class_name'
        ],
        'editClass' =>  [
            'class_id', 'gradeId', 'class_name'
        ]
    ];
}