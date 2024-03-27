<?php
declare(strict_types=1);

namespace easydingtalk\api\Attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

use Easydingtalk\util\Time;

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
     * @param string $date_time 查询的时间，Unix时间戳，单位毫秒。
     * @return mixed
     */
    public static function listByDay(string $op_user_id, string $user_id, string $date_time)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listbyday'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'user_id'=>$user_id,
            'date_time' => Time::toTime($date_time, false)
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量查询人员排班信息
     *
     * @param string $op_user_id 操作人userId。
     * @param string $userids 要查询的人员userId列表，多个userId用逗号分隔，一次最多可传50个。
     * @param string $from_date_time 起始日期，Unix时间戳，单位毫秒。
     * @param string $to_date_time 结束日期，Unix时间戳，单位毫秒。
     * @return mixed
     */
    public static function listByUsers(string $op_user_id, string $userids, string $from_date_time, string $to_date_time)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listbyusers'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'userids' => $userids,
            'from_date_time' => Time::toTime($from_date_time, true),
            'to_date_time' => Time::toTime($to_date_time, true),

        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 排班制考勤组排班
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
     * @param array $schedules 排班详情。
     * @return mixed
     */
    public static function set(string $op_user_id, int $group_id, array $schedules)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['set'];

        // 时间转换
        $schedules['work_date'] = Time::toTime($schedules['work_date'], true);

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id,
            'schedules' => $schedules
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询排班打卡结果
     *
     * @param string $op_user_id 操作人userId。
     * @param string $schedule_ids 排班ID，多个排班ID之间用逗号分割，每次调用最多支持100个排班ID。
     * @return mixed
     */
    public static function listByIds(string $op_user_id, string $schedule_ids)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listbyids'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'schedule_ids' => $schedule_ids
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询企业考勤排班详情
     *
     * @param string $workDate 排班时间，只取年月日部分。
     * @param integer $offset 支持分页查询，与size参数同时设置时才生效，此参数代表偏移量，偏移量从0开始。
     * @param integer $size 分页大小，最大值200。
     * @return mixed
     */
    public static function listSchedule(string $workDate, int $offset = 0,int $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listschedule'];

        // 参数
        $body = [
            'workDate' => $workDate,
            'offset' => $offset,
            'size' => $size
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量查询成员排班概要信息
     *
     * @param string $op_user_id 操作者的userId。
     * @param string $userids 需要查询的用户userId列表，多个userId之间使用逗号分隔，且每次查询最多不能超过20。
     * @param string $from_date_time 开始日期的Unix时间戳，单位毫秒。
     * @param string $to_date_time 结束日期的Unix时间戳，单位毫秒。
     * @return mixed
     */
    public static function listByDays(string $op_user_id, string $userids, string $from_date_time, string $to_date_time)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['schedule']['listbydays'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'userids' => $userids,
            'from_date_time' => Time::toTime($from_date_time,true),
            'to_date_time' => Time::toTime($to_date_time,true)
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}