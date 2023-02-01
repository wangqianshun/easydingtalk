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
}