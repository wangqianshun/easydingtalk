<?php
declare(strict_types=1);

namespace Easydingtalk\attendance;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 考勤规则
 */
class Regulation
{
    /**
     * 分页获取加班规则列表
     *
     * @param int $pageNumber 分页起始页。
     * @param int $pageSize 分页大小。
     * @return mixed
     */
    public static function overtimeSettings(int $pageNumber, int $pageSize)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['regulation']['overtime_settings'];

        // 参数
        $params = [
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 分页获取补卡规则列表
     *
     * @param int $pageNumber 分页起始页。
     * @param int $pageSize 分页大小。
     * @return mixed
     */
    public static function adjustments(int $pageNumber, int $pageSize)
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['regulation']['adjustments'];

        // 参数
        $params = [
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 批量获取加班规则设置
     *
     * @param array $overtimeSettingIds 加班规则设置id。
     * @return mixed
     */
    public static function overtimeSettingsQuery(array $overtimeSettingIds = [])
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['regulation']['overtime_settings_query'];

        // 参数
        $body = [
            'overtimeSettingIds' => $overtimeSettingIds,
        ];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }
}