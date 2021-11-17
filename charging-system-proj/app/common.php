<?php
/**
 * 返回当前时间格式  2021-05-25 01:08:55
 * @return string   当前时间 年月日 时分秒
 */
function thisTime($time = null) : string {
    $time = is_null($time) ? time() : $time;
    return date('Y-m-d H:i:s', $time);
}

/**
 * 前端信息统一返回
 * @param int $code
 * @param null $msg
 * @param string $data
 */
function returnMsg($code = 500, $msg = null, $data = '')
{
    header('Content-Type:application/json');

    $return['code'] = $code;
    $return['message'] = $msg;
    $return['data'] = $data;

    exit(json_encode($return, JSON_UNESCAPED_UNICODE));
}

/**
 * 前端表格获取数据返回
 * @param int $count
 * @param array $data
 */
function returnTables(int $count, $data = [])
{
    header('Content-Type:application/json');
    $return = [
        'code' => 0,
        'msg' => "",
        'count' => $count > 0 ? $count : 0,
        'data' => $data
    ];
    echo json_encode($return, true);
    die;
}
