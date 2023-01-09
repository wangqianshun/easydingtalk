<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤排班
 */
class Schedule
{
    /**
     * 查询成员排班信息
     *
     * @param string $op_user_id 操作人的userId。
     * @param string $user_id 要查询的人员userId。
     * @param int $date_time 查询的时间，Unix时间戳，单位毫秒。
     * @return mixed
     */
    public static function listByDay(string $op_user_id, string $user_id, int $date_time)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listbyday'];

        // 参数
        $json = [
            'op_user_id' => $op_user_id,
            'user_id'=>$user_id,
            'date_time' => Time::toTime($date_time, true)

        ];

        // 发送请求
        return ApiRequest::post($uri, $json);
    }
}