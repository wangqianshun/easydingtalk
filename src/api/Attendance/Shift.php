<?php
declare(strict_types=1);

namespace easydingtalk\api\Attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤班次
 */
class Shift
{

    /**
     * 创建班次
     *
     * @param string $op_user_id 操作人userId。
     * @param array $shift 班次。
     * @return mixed
     */
    public static function add(string $op_user_id, array $shift)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['add'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'shift' => $shift,

        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 删除班次
     *
     * @param string $op_user_id 操作人userId。
     * @param integer $shift_id 班次id。
     * @return mixed
     */
    public static function remove(string $op_user_id, int $shift_id)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['remove'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'shift_id' => $shift_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 按名称搜索班次
     *
     * @param string $op_user_id 操作人的userId。
     * @param string $shift_name 班次名称。
     * @return mixed
     */
    public static function search(string $op_user_id, string $shift_name)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['search'];

        // 参数
       $body = [
            'op_user_id' => $op_user_id,
            'shift_name' => $shift_name
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取班次摘要信息
     *
     * @param string $op_user_id
     * @param integer $cursor
     * @return mixed
     */
    public static function list(string $op_user_id, int $cursor = 0)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['list'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'cursor' => $cursor
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取班次详情
     *
     * @param string $op_user_id 操作者的userId。
     * @param integer $shift_id 班次ID。
     * @return mixed
     */
    public static function query(string $op_user_id, int $shift_id)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'shift_id' => $shift_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 查询历史班次
     *
     * @param string $op_user_id 操作者userId。
     * @param integer $shift_id 班次ID。
     * @param integer $version 班次版本。
     * @return mixed
     */
    public static function historyQuery(string $op_user_id,int $shift_id,int $version)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['history_query'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'shift_id' => $shift_id,
            'version' => $version
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 修改卡点设置
     *
     * @param string $op_user_id 操作者userId。
     * @param integer $shift_id 班次ID。
     * @param array $punches 卡点信息。
     * @return mixed
     */
    public static function updatePunches(string $op_user_id, int $shift_id, array $punches = [])
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['shift']['updatepunches'];

        // 参数
        $body = [
            'op_user_id' => $op_user_id,
            'shift_id' => $shift_id,
            'punches' => $punches
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}