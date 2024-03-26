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
     * @param string $op_user_id 操作人的userid。
     * @param array $top_group 考勤组相关信息。
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
     * @param string $op_user_id 操作人userId。
     * @param array $top_group 考勤组信息。
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
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
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
     * @param string $op_user_id 操作人userId。
     * @param string $group_name 考勤组名称。
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
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
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
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组groupKey。
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
     * @param string $op_user_id 操作人的userId。
     * @param string $group_key 考勤组ID，旧考勤组标识。
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
     * @param string $op_user_id 操作人的userId。
     * @param integer $group_id 考勤组ID。
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
     * @param integer $offset 支持分页查询，与size参数同时设置时才生效，该参数代表偏移量，偏移量从0开始，下次调用传上次调用时的size与offset之和。
     * @param integer $size 分页大小，最大10。
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

    /**
     * 批量获取考勤组摘要
     *
     * @param string $op_user_id 操作人userId。
     * @param int $cursor 游标值，表示从第几个开始，不传默认从第一个开始。
     * @return mixed
     */
    public static function groupMinimalismList(string $op_user_id, int $cursor = 1)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_minimalism_list'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'cursor' => $cursor
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取用户考勤组
     *
     * @param string $userid 操作人userId。
     * @return mixed
     */
    public static function getUserGroup(string $userid)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['get_user_group'];

        // 参数
        $body = [
            'userid' => $userid
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量新增参与考勤人员
     *
     * @param string $op_user_id 操作人userid。
     * @param string $group_key 考勤组ID。
     * @param string $user_id_list 用户列表，最大值100。
     * @return mixed
     */
    public static function groupUsersAdd(string $op_user_id, string $group_key, string $user_id_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_users_add'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key'=>$group_key,
            'user_id_list'=>$user_id_list
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 更新参与考勤人员
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
     * @param integer $schedule_flag 从哪天开始排班。0：从今天开始排班 1：从明天开始排班
     * @param array $update_param 更新考勤组信息。
     * @return mixed
     */
    public static function groupMemberUpdate(string $op_user_id, int $group_id, int $schedule_flag, array $update_param)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_member_update'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id,
            'schedule_flag' => $schedule_flag,
            'update_param' => $update_param
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取参与考勤人员
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
     * @param integer $cursor 游标值，表示从第几个开始，不传默认从第1个开始。
     * @return mixed
     */
    public static function groupMemberList(string $op_user_id, int $group_id, int $cursor = 1)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_member_list'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id,
            'cursor' => $cursor
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取参与考勤人员的userid
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
     * @param integer $cursor 游标值，表示从第几个开始，不传默认从第1个开始。
     * @return mixed
     */
    public static function groupMemberUsersList(string $op_user_id, int $group_id, int $cursor)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_memberusers_list'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id,
            'cursor' => $cursor
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量删除考勤组成员
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param string $user_id_list 用户列表，每次调用最多传100个userId。
     * @return mixed
     */
    public static function groupUsersRemove(string $op_user_id, string $group_key, string $user_id_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_users_remove'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'user_id_list' => $user_id_list
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询参与考勤人员列表
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param string $cursor 上一批次最后一个userid，传null、空值表示从头开始查。
     * @param integer $size 分页大小。
     * @return mixed
     */
    public static function groupUsersQuery(string $op_user_id, string $group_key, string $cursor, int $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_users_query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'cursor' => $cursor,
            'size' => $size
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 校验用户是否在当前考勤组
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $group_id 考勤组ID。
     * @param string $member_ids 成员ID，可以是userId或者deptId，多个ID之间使用英文逗号分割，每次调用最多支持传20个元素值。
     * @param integer $member_type 成员类型： 0：员工 1：部门
     * @return mixed
     */
    public static function groupMemberListByIds(string $op_user_id, int $group_id, string $member_ids, int $member_type)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_member_listbyids'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_id' => $group_id,
            'member_ids' => $member_ids,
            'member_type' => $member_type
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量新增Wi-Fi信息
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param array $wifi_list Wi-Fi列表，每次调用最多新增100个Wi-Fi信息。
     * @return mixed
     */
    public static function groupWifisAdd(string $op_user_id, string $group_key, array $wifi_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_wifis_add'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'wifi_list' => $wifi_list,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量查询Wi-Fi信息
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param int $size 分页大小。
     * @param string $cursor 上一批次最后一个Id，默认为空。
     * @return mixed
     */
    public static function groupWifisQuery(string $op_user_id, string $group_key, int $size, string $cursor = '')
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_wifis_query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'size' => $size,
            'cursor' => $cursor,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量移除Wi-Fi信息
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param string $wifi_key_list
     * @return mixed
     */
    public static function groupWifisRemove(string $op_user_id, string $group_key, string $wifi_key_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_wifis_remove'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'wifi_key_list' => $wifi_key_list,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量新增地点
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param array $position_list postion列表，每次新增最多支持新增100个地点信息。
     * @return mixed
     */
    public static function groupPositionsAdd(string $op_user_id, string $group_key, array $position_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_positions_add'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'position_list' => $position_list,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量查询地点
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param int $size 分页大小。
     * @param string $cursor 上一批次的最后一个Id，默认为空。
     * @return mixed
     */
    public static function groupPositionsQuery(string $op_user_id, string $group_key, int $size, string $cursor = '')
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_positions_query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'size' => $size,
            'cursor' => $cursor,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量删除地点
     *
     * @param string $op_user_id 操作人userId。
     * @param string $group_key 考勤组ID。
     * @param string $position_key_list 要删除position的key列表
     * @return mixed
     */
    public static function groupPositionsRemove(string $op_user_id, string $group_key, string $position_key_list)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_positions_remove'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'group_key' => $group_key,
            'position_key_list' => $position_key_list,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询考勤写操作权限
     *
     * @param string $opUserId 员工userId。
     * @param string $category 资源类型：GROUP：考勤组，目前仅支持该值。
     * @param string $resourceKey 权限点
     * @param array $entityIds 资源ID，如果category参数值为GROUP，该参数值传考勤组ID。
     * @return mixed
     */
    public static function groupWritePermissionsQuery(string $opUserId, string $category, string $resourceKey, array $entityIds)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['group_write_permissions_query'];

        // 参数
        $body = [
            'opUserId' => $opUserId,
            'category' => $category,
            'resourceKey' => $resourceKey,
            'entityIds' => $entityIds,
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }
}