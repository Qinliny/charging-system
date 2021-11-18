<?php


namespace app\validate;


use think\Validate;

class ChargeSettingValidate extends Validate
{
    protected $rule = [
        'charge_type'   =>  'require|in:10001, 10002, 10003',
        'task_name'     =>  'require|max:10',
        'begin_time'    =>  'require|date',
        'end_time'      =>  'require|date|checkEndTime'
    ];

    protected $message = [
        'charge_type.require'   =>  "请选择参数",
        'charge_type.in'        =>  '类型参数异常',
        'task_name.require'     =>  '请输入任务名称',
        'task_name.max'         =>  '任务名称长度不能超过10',
        'begin_time.require'    =>  '请选择开始时间',
        'begin_time.date'       =>  '开始时间只能是日期格式',
        'end_time.require'      =>  '请选择结束时间',
        'end_time.date'         =>  '结束时间只能是日期格式',
        'end_time.checkEndTime' =>  '结束时间不能大于开始时间'
    ];

    protected $scene = [
        'saveChargeTask'    =>  [
            'charge_type', 'task_name', 'begin_time', 'end_time'
        ]
    ];

    // 校验结束时间是否大于开始时间
    protected function checkEndTime($value, $rule, $data = [])
    {
        $beginTime = $data['begin_time'] . " 00:00:00";
        $endTime = $value . " 23:59:59";

        return strtotime($beginTime) < strtotime($endTime);
    }
}