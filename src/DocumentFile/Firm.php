<?php
declare(strict_types=1);

namespace Easydingtalk\DocumentFile;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 企业管理
 *
 * Class Storage
 * @package Easydingtalk\DocumentFile
 * @author: 王乾顺
 * @time: 2023-09-18 16:52:13
 */
class Firm
{
    /**
     * 获取企业信息
     *
     * @param string $unionId 用户unionId。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 15:58:29
     */
    public static function getOrgInfos(string $unionId)
    {
        // 请求地址
        $uri = Config::getApi()['document_file']['storage']['firm']['get_org_infos'] . Config::getCorpId();

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