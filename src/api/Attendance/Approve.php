<?php
declare(strict_types=1);

namespace easydingtalk\api\Attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;
use easydingtalk\util\Time;

/**
 * 假勤审批
 *
 * Class Approve
 * @package easydingtalk\api\Attendance
 */
class Approve
{
    /**
     * 通知审批通过
     *
     * @param array $body
     * @return mixed
     */
    public static function finish(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['finish'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 通知审批撤销
     *
     * @param string $userid 员工的userId。
     * @param string $approve_id 审批ID。
     * @return mixed
     */
    public static function cancel(string $userid, string $approve_id)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['cancel'];

        // 参数
        $body = [
            'userid' => $userid,
            'approve_id' => $approve_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
    /**
     * 通知补卡通过
     *
     * @param array $body
     * @return mixed
     */
    public static function check(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['check'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
    /**
     * 计算请假时长
     *
     * @param array $body
     * @return mixed
     */
    public static function durationCalculate(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['duration_calculate'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
    /**
     * 通知换班通过
     *
     * @param array $body
     * @return mixed
     */
    public static function scheduleSwitch(array $body)
    {
        $uri = Config::getApi()['attendance']['approve']['schedule_switch'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
    /**
     * 计算请假时长
     *
     * @param string $userid
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public static function getLeaveApproveDuration(string $userid, string $from_date, string $to_date)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['getleaveapproveduration'];

        // 参数
        $body = [
            'userid' => $userid,
            'from_date' => $from_date,
            'to_date' => $to_date
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询请假状态
     *
     * @param string $userid_list 待查询用户的ID列表，每次最多100个。
     * @param string $start_time 开始时间 ，Unix时间戳，支持最多180天的查询。
     * @param string $end_time 结束时间，Unix时间戳，支持最多180天的查询。
     * @param int $offset 支持分页查询，与size参数同时设置时才生效，此参数代表偏移量，偏移量从0开始。
     * @param int $size 支持分页查询，与offset参数同时设置时才生效，此参数代表分页大小，最大20。
     * @return mixed
     */
    public static function getLeaveStatus(string $userid_list, string $start_time, string $end_time, int $offset, int $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['approve']['getleavestatus'];

        // 参数
        $body = [
            'userid_list' => $userid_list,
            'start_time' => Time::toTime($start_time, true),
            'end_time' => Time::toTime($end_time, true),
            'offset' => $offset,
            'size' => $size
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}
