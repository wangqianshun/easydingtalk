<?php
declare(strict_types=1);

namespace easydingtalk\api\DocumentFile;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 搜索
 *
 * Class Search
 * @package easydingtalk\api\DocumentFile
 * @author: 王乾顺
 * @time: 2023-09-27 12:11:18
 */
class Search
{
    /**
     * 搜索文件
     *
     * @param array $body Body参数
     * @param string $operatorId 操作人unionId。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-27 12:14:04
     */
    public static function dentriesSearch(array $body, string $operatorId)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['search']['dentries_search'];

        // 参数
        $params = [
            'operatorId' => $operatorId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 搜索知识库
     *
     * @param array $body Body参数
     * @param string $operatorId 操作人unionId。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-27 12:14:04
     */
    public static function workspacesSearch(array $body, string $operatorId)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['search']['workspaces_search'];

        // 参数
        $params = [
            'operatorId' => $operatorId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }
}