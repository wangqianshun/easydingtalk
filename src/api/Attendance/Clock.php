<?php
declare(strict_types=1);

namespace easydingtalk\api\Attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤打卡
 */
class Clock
{
    /**
     * 获取打卡结果
     *
     * @param string $workDateFrom 查询考勤打卡记录的起始工作日。
     * @param string $workDateTo 查询考勤打卡记录的结束工作日。
     * @param array $userIdList 员工在企业内的userId列表，最大值50。
     * @param integer $offset 表示获取考勤数据的起始点。
     * @param integer $limit 表示获取考勤数据的条数，最大值50。
     * @param boolean $isI18n 是否为海外企业使用：true：海外平台使用  false（默认）：国内平台使用
     * @return mixed
     */
    public static function getList(string $workDateFrom, string $workDateTo, array $userIdList, int $offset = 0, int $limit = 10, bool $isI18n = false)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_clock']['group_attendance_list'];

        // 参数
        $body = [
            'workDateFrom' => $workDateFrom,
            'workDateTo' => $workDateTo,
            'userIdList' => $userIdList,
            'offset' => $offset,
            'limit' => $limit,
            'isI18n' => $isI18n
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取打卡详情
     *
     * @param array $userIds 企业内的员工ID列表，最大值50。
     * @param string $checkDateFrom 查询考勤打卡记录的起始工作日。格式为：yyyy-MM-dd hh:mm:ss。
     * @param string $checkDateTo 查询考勤打卡记录的结束工作日。格式为：yyyy-MM-dd hh:mm:ss。
     * @param boolean $isI18n 是否为海外企业使用：true：海外平台使用  false（默认）：国内平台使用
     * @return mixed
     */
    public static function getListRecord(array $userIds, string $checkDateFrom, string $checkDateTo, bool $isI18n = false)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_clock']['group_attendance_list_record'];

        // 参数
        $body = [
            'userIds' => $userIds,
            'checkDateFrom' => $checkDateFrom,
            'checkDateTo' => $checkDateTo,
            'isI18n' => $isI18n
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}