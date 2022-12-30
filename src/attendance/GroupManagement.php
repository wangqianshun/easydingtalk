<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤组管理
 */
class GroupManagement
{
    /**
     * 创建考勤组
     *
     * @param string $op_user_id
     * @param array $top_group
     * @return mixed
     */
    public static function groupAdd(string $op_user_id, array $top_group)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_add'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'top_group' => $top_group
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 更新考勤组
     *
     * @param string $op_user_id
     * @param array $top_group
     * @return mixed
     */
    public static function groupModify(string $op_user_id, array $top_group)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_modify'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'top_group' => $top_group
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 删除考勤组
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function groupRemove(string $op_user_id, string $group_key)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_remove'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 搜索考勤组摘要
     *
     * @param string $op_user_id
     * @param string $group_name
     * @return mixed
     */
    public static function groupSearch(string $op_user_id, string $group_name)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_search'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_name' => $group_name
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取考勤组详情
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @return mixed
     */
    public static function groupQuery(string $op_user_id, int $group_id)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 根据groupKey查询考勤组信息
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function groupGet(string $op_user_id, string $group_key)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_get'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * groupKey转换为groupId
     *
     * @param string $op_user_id
     * @param string $group_key
     * @return mixed
     */
    public static function groupKeyToId(string $op_user_id, string $group_key)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_key_to_id'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * groupId转换为groupKey
     *
     * @param string $op_user_id
     * @param integer $group_id
     * @return mixed
     */
    public static function groupIdToKey(string $op_user_id, int $group_id)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_id_to_key'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量获取考勤组详情
     *
     * @param integer $offset
     * @param integer $size
     * @return mixed
     */
    public static function getSimpleGroups(int $offset = 0, int $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['get_simple_groups'];

        // 参数
        $body = [
            'offset' => $offset,
            'size' => $size
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}