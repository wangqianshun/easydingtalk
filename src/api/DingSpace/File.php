<?php
declare(strict_types=1);

namespace easydingtalk\api\DingSpace;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 钉盘
 *
 * Class File
 * @package Easydingtalk\DingSpace
 * @author: 王乾顺
 * @time: 2023-09-18 15:15:11
 */
class File
{
    /**
     *
     *
     * @param
     * @return mixed
     */
    public static function test()
    {
        // 请求地址
        $uri = Config::getApi()['attendance']['group_management']['test'];

        // 参数
        $body = [
            'op_user_id' => 1,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }
}