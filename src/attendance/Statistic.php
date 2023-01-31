<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤统计
 */
class Statistic
{
    /**
     * 查询是否启用智能统计报表
     *
     * @return mixed
     */
    public static function isOpenSmartReport()
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['isopensmartreport'];

        // 发送请求
        return ApiRequest::post($uri);
    }

    /**
     * 获取用户考勤数据
     *
     * @param string $userid 用户的userId。
     * @param string $work_date 查询日期。
     * @return mixed
     */
    public static function getUpdateData(string $userid, string $work_date)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['getupdatedata'];

        // 参数
        $body = [
            'userid' => $userid,
            'work_date' => $work_date
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取报表假期数据
     *
     * @param string $userid 用户的userId。
     * @param string $leave_names 假期名称，多个用英文逗号分隔，最大长度20。
     * @param string $from_date 开始时间。
     * @param string $to_date 结束时间，结束时间减去开始时间必须在31天以内。
     * @return mixed
     */
    public static function getLeaveTimeByNames(string $userid, string $leave_names, string $from_date, string $to_date)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['getleavetimebynames'];

        // 参数
        $body = [
            'userid' => $userid,
            'leave_names' => $leave_names,
            'from_date' => $from_date,
            'to_date' => $to_date
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取考勤报表列定义
     *
     * @return mixed
     */
    public static function getAttColumns()
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['getattcolumns'];

        // 发送请求
        return ApiRequest::post($uri);
    }

    /**
     * 获取考勤报表列值
     *
     * @param string $userid 用户的userId。
     * @param string $column_id_list 报表列ID，多值用英文逗号分隔，最大长度20。
     * @param string $from_date 开始时间。
     * @param string $to_date 结束时间，结束时间减去开始时间必须在31天以内。
     * @return mixed
     */
    public static function getColumnVal(string $userid, string $column_id_list, string $from_date, string $to_date)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['getcolumnval'];

        // 参数
        $body = [
            'userid' => $userid,
            'column_id_list' => $column_id_list,
            'from_date' => $from_date,
            'to_date' => $to_date
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询用户某段时间内是否处于封账状态
     *
     * @param array $userIds 员工列表。
     * @param array $userTimeRange 时间段。Unix时间戳，单位毫秒。
     * @param string $bizCode 情景。
     * @return mixed
     */
    public static function statusQuery(array $userIds, array $userTimeRange, string $bizCode)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['statistic']['status_query'];

        // 参数
        $body = [
            'userIds' => $userIds,
            'userTimeRange' => $userTimeRange,
            'bizCode' => $bizCode,
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }
}