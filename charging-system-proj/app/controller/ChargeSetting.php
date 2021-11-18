<?php


namespace app\controller;


use app\BaseController;
use app\model\ChargeTaskDb;
use app\validate\ChargeSettingValidate;
use think\facade\View;

class ChargeSetting extends BaseController
{
    public $chargeType = [
        '10001' =>  '普通班',
        '10002' =>  '兴趣班',
        '10003' =>  '午托班'
    ];

    public function chargeTask() {
        if (request()->isPost()) {
            $param = request()->post();
            $page = isset($param['page']) && $param['page'] > 0 ? $param['page'] : 1;
            $limit = isset($param['limit']) ? $param['limit'] : 10;
            $condition = [];
            if (!empty($param['charge_type'])) {
                $condition[] = [
                    'charge_type', '=', $param['charge_type']
                ];
            }
            if (!empty($param['task_name'])) {
                $condition[] = [
                    'task_name', '=', $param['task_name']
                ];
            }
            if (!empty($param['begin_time'])) {
                $condition[] = [
                    'begin_time', '>=', $param['begin_time']
                ];
            }
            if (!empty($param['end_time'])) {
                $condition[] = [
                    'end_time', '<=', $param['end_time']
                ];
            }
            $db = new ChargeTaskDb();
            $result = $db->getList($condition, ["*"], $page, $limit);
            $array = [];
            foreach ($result->items() as $key => &$value) {
                $value['charge_type'] = $this->chargeType[$value['charge_type']];
                $array[] = $value;
            }
            returnTables($result->total(), $array);
        }
        View::assign('chargeType', $this->chargeType);
        return view();
    }

    public function addChargeTask(ChargeTaskDb $db) {
        $param = request()->post();

        validate(ChargeSettingValidate::class)->scene('saveChargeTask')
            ->check($param);

        $param['create_time'] = thisTime();
        $db->insert($param);
        returnMsg(0, "添加成功");
    }
}