<?php
declare(strict_types=1);

namespace Easydingtalk\DocumentFile;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 空间管理
 *
 * Class Spece
 * @package Easydingtalk\DocumentFile
 * @author: 王乾顺
 * @time: 2023-09-18 17:03:01
 */
class Spece
{
    /**
     * 添加空间
     *
     * @param string $unionId 操作人的unionId。
     * @param array $option 可选参数。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 16:38:02
     */
    public static function addSpece(string $unionId, array $option)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['spece'];

        // 参数
        $params = [
            'unionId' => $unionId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::post_v1($uri, $option);
    }

    /**
     * 获取空间信息
     *
     * @param string $unionId 操作者unionId。
     * @param string $spaceId 空间Id。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 16:30:01
     */
    public static function getSpeceInfo(string $unionId, string $spaceId)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['spece'] . $spaceId;

        // 参数
        $params = [
            'unionId' => $unionId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }
}