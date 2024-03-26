<?php
declare(strict_types=1);

namespace Easydingtalk\DocumentFile;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 文件管理
 *
 * Class File
 * @package Easydingtalk\DocumentFile
 * @author: 王乾顺
 * @time: 2023-09-18 17:12:40
 */
class File
{
    /**
     * 添加文件夹
     *
     * @param string $unionId 操作者unionId。
     * @param string $spaceId 空间Id。
     * @param array $body 主体参数。
     * @param int $parentId 父目录Id。根目录时，该参数是0。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 17:18:16
     */
    public static function createDir(string $unionId, string $spaceId, array $body, int $parentId = 0)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['spaces_v1'] . $spaceId . '/dentries/' . $parentId . '/folders';

        // 参数
        $params = [
            'unionId' => $unionId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 复制文件或文件夹
     *
     * @param string $unionId 操作者unionId。
     * @param string $spaceId 文件或文件夹所在的源空间Id。
     * @param string $dentryId 需要被复制的文件或文件夹Id。
     * @param array $body 主体参数。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 17:53:18
     */
    public static function move(string $unionId, string $spaceId, string $dentryId, array $body)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['spaces_v1'] . $spaceId . '/dentries/' . $dentryId . '/copy';

        // 参数
        $params = [
            'unionId' => $unionId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }
}