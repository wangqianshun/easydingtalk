<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;
use Easydingtalk\util\Time;

/**
 * 假期管理
 *
 * Class VacationManagement
 * @package Easydingtalk\attendance
 */
class VacationManagement
{
    /**
     * 添加假期规则
     *
     * @param string $leave_name 假期名称。
     * @param string $leave_view_unit 请假时长单位。
     * @param string $biz_type 假期类型。
     * @param bool $natural_day_leave 是否按照自然日统计请假时长。
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId，否则接口会报错部门的管理员不存在。
     * @param int $hours_in_per_day 每天折算的工作时长，百分之一。
     * @param array $extras 调休假有效期规则
     * @param array $submit_time_rule 限时提交规则。
     * @param array $leave_certificate 请假证明。
     * @return mixed
     */
    public static function create(string $leave_name, string $leave_view_unit, string $biz_type, bool $natural_day_leave, string $op_userid, int $hours_in_per_day, array $extras, array $submit_time_rule, array $leave_certificate)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['create'];

        // 参数
        $body = [
            'leave_name' => $leave_name,
            'leave_view_unit' => $leave_view_unit,
            'biz_type' => $biz_type,
            'natural_day_leave' => $natural_day_leave,
            'op_userid' => $op_userid,
            'hours_in_per_day' => $hours_in_per_day * 100,
            'extras' => json_encode($extras, JSON_UNESCAPED_UNICODE),
            'submit_time_rule' => $submit_time_rule,
            'leave_certificate' => $leave_certificate,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 更新假期规则
     *
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId。
     * @param string $leave_name 假期名称。
     * @param string $leave_view_unit 请假单位。
     * @param string $biz_type 假期类型。
     * @param bool $natural_day_leave 是否按照自然日统计请假时长。
     * @param string $leave_code 接口添加的假期规则标识，
     * @param int $hours_in_per_day 每天折算的工作时长，百分之一。例如：1天=10小时=1000。
     * @param array $extras 调休假有效期规则。
     * @param array $leave_certificate 请假证明。
     * @param array $submit_time_rule 限时提交规则。
     * @return mixed
     */
    public static function update(string $op_userid, string $leave_name, string $leave_view_unit, string $biz_type, bool $natural_day_leave, string $leave_code, int $hours_in_per_day, array $extras, array $leave_certificate, array $submit_time_rule)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['update'];

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'leave_name' => $leave_name,
            'leave_view_unit' => $leave_view_unit,
            'biz_type,' => $biz_type,
            'natural_day_leave' => $natural_day_leave,
            'leave_code' => $leave_code,
            'hours_in_per_day' => $hours_in_per_day * 100,
            'extras' => json_encode($extras, JSON_UNESCAPED_UNICODE),
            'leave_certificate' => $leave_certificate,
            'submit_time_rule' => $submit_time_rule
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 删除假期规则
     *
     * @param string $leave_code 假期规则唯一标识。
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId。
     * @return mixed
     */
    public static function remove(string $leave_code, string $op_userid)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['remove'];

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'leave_code' => $leave_code
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 方法名称
     *
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId。
     * @param array $leave_quotas 待初始化的假期余额记录。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-16 11:26:48
     */
    public static function quota_init(string $op_userid, array $leave_quotas)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['quota_init'];

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'leave_quotas' => self::parse_quote_save_data($leave_quotas)
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 假期余额数据格式转换
     *
     * @param array $leave_quotas
     * @return array
     * @author 王乾顺
     * @time 2023-09-16 12:01:42
     */
    public static function parse_quote_save_data(array $leave_quotas)
    {
        // 开始时间
        $leave_quotas['start_time'] = Time::toTime($leave_quotas['start_time'], true);
        // 结束时间
        $leave_quotas['end_time'] = Time::toTime($leave_quotas['end_time'], true);
        // 假期类型按天计算时，该值不为空且按百分之一天折算。 例如：1000=10天。
        if (array_key_exists('quota_num_per_day', $leave_quotas)) {
            $leave_quotas['quota_num_per_day'] = $leave_quotas['quota_num_per_day'] * 100;
        }
        // 假期类型按小时，计算该值不为空且按百分之一小时折算。例如：1000=10小时。
        if (array_key_exists('quota_num_per_hour', $leave_quotas)) {
            $leave_quotas['quota_num_per_hour'] = $leave_quotas['quota_num_per_hour'] * 100;
        }
        // 返回
        return $leave_quotas;
    }

    /**
     * 查询假期规则列表
     *
     * @param string $op_userid
     * @param string $vacation_source
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-16 15:04:07
     */
    public static function type_list(string $op_userid, string $vacation_source)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['type_list'];

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'vacation_source' => $vacation_source
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询假期余额
     *
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId。
     * @param string $leave_code 假期类型唯一标识。
     * @param string $user_ids 待查询的员工ID列表。
     * @param int $offset 分页偏移，从0开始的非负整数。
     * @param int $size 分页偏移，最大50。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-16 16:36:03
     */
    public static function quota_list(string $op_userid, string $leave_code, string $user_ids, int $offset = 0, int $size = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['quota_list'];

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'leave_code' => $leave_code,
            'userids' => $user_ids,
            'offset' => $offset,
            'size' => $size
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量更新假期余额
     *
     * @param string $op_userid 当前企业内拥有OA审批应用权限的管理员的userId。
     * @param array $leave_quotas 待更新的假期余额记录。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-16 17:20:30
     */
    public static function quota_update(string $op_userid, array $leave_quotas)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['quota_update'];

        // 批量处理
        for ($i = 0; $i < count($leave_quotas); $i++) {
            $leave_quotas[$i] = self::parse_quote_save_data($leave_quotas[$i]);
        }

        // 参数
        $body = [
            'op_userid' => $op_userid,
            'leave_quotas' => $leave_quotas
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 批量查询员工假期余额变更记录
     *
     * @param string $opUserId 当前企业内拥有OA审批应用权限的管理员的userId，建议传入企业主管理员userId。
     * @param string $leaveCode 假期类型唯一标识。
     * @param array $userIds 待查询员工userId列表，每次调用最多传50个userId。
     * @param int $pageNumber 当前页码，从0开始。
     * @param int $pageSize 每页条目数，最大值200。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-16 17:58:47
     */
    public static function records_query(string $opUserId, string $leaveCode, array $userIds, int $pageNumber = 1, int $pageSize = 10)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['vacation_management']['records_query'];

        // 参数
        $body = [
            'opUserId' => $opUserId,
            'leaveCode' => $leaveCode,
            'userIds' => $userIds,
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }
}