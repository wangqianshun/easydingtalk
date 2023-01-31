<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤机管理
 *
 * Class SmartDevice
 * @package Easydingtalk\attendance
 */
class SmartDevice
{
    /**
     * 查询员工智能考勤机列表
     *
     * @param string $userid 员工userId。
     * @param int $offset 分页游标，从0开始的非负整数。
     * @param int $size 每页大小，最大值50。
     * @return mixed
     */
    public static function getByUserId(string $userid, int $offset = 0, $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['smart_device']['get_by_userid'];

        // 参数
        $body = [
            'userid' => $userid,
            'offset' => $offset,
            'size' => $size,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 根据设备ID获取员工信息
     *
     * @param string $devId 考勤机设备ID。
     * @param string $nextToken 分页游标。
     * @param int $maxResults 分页大小。
     * @return mixed
     */
    public static function getUser(string $devId, string $nextToken, int $maxResults)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['smart_device']['get_user'] . $devId;

        // 参数
        $params = [
            'nextToken' => $nextToken,
            'maxResults' => $maxResults,
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 查询考勤机信息
     *
     * @param string $devId 考勤机设备ID。
     * @return mixed
     */
    public static function machines(string $devId)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['smart_device']['machines'] . $devId;

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 变更智能考勤机员工
     *
     * @param array $delUserIds 移除的员工userId列表。
     * @param array $deviceIds 加密后的考勤机设备ID列表。
     * @param array $addUserIds 新增的员工userId列表。
     * @param array $devIds 考勤机设备ID列表，Long数组。
     * @param array $delDeptIds 删除的部门id列表。
     * @param array $addDeptIds 新增的部门id列表。
     * @return mixed
     */
    public static function atMachinesUsers(array $delUserIds, array $deviceIds, array $addUserIds, array $devIds, array $delDeptIds, array $addDeptIds)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['smart_device']['at_machines_users'];

        // 参数
        $body = [
            'delUserIds' => $delUserIds,
            'deviceIds' => $deviceIds,
            'addUserIds' => $addUserIds,
            'devIds' => $devIds,
            'delDeptIds' => $delDeptIds,
            'addDeptIds' => $addDeptIds,
        ];

        // 发送请求
        return ApiRequest::put_v1($uri, $body);
    }
}