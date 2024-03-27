<?php
declare(strict_types=1);

namespace easydingtalk\api\DocumentFile\StorageManagement;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 文件传输
 *
 * Class FileTransfer
 * @author: 王乾顺
 * @time: 2023-09-27 11:21:30
 */
class FileTransfer
{
    /**
     * 获取文件上传信息
     *
     * @param array $body Body参数
     * @param string $unionId 操作者unionId
     * @param string $parentDentryUuid 父节点dentryUuid
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-27 11:34:21
     */
    public static function uploadInfosQuery(array $body, string $unionId, string $parentDentryUuid)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['file_transfer'] . $parentDentryUuid . '/uploadInfos/query';

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