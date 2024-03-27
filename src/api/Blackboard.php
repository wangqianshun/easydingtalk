<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 公告
 *
 * Class Blackboard
 * @package Easydingtalk
 * @author: 王乾顺
 * @time: 2023-09-18 14:09:30
 */
class Blackboard
{
    /**
     * 创建企业公告
     *
     * @param array $create_request 请求对象。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:17:31
     */
    public static function create(array $create_request)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['create'];

        // 参数
        $body = [
            'create_request' => $create_request,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 更新企业公告
     *
     * @param array $update_request 请求对象。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:27:24
     */
    public static function update(array $update_request)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['update'];

        // 参数
        $body = [
            'update_request' => $update_request,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 删除公告
     *
     * @param string $blackboard_id 公告ID，可以通过获取公告ID列表接口获取result参数值。
     * @param string $operation_userid 操作人userId，必须是公告管理员。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 15:07:30
     */
    public static function remove(string $blackboard_id, string $operation_userid)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['remove'];

        // 参数
        $body = [
            'blackboard_id' => $blackboard_id,
            'operation_userid' => $operation_userid,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取公告ID列表
     *
     * @param array $query_request 请求对象。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:27:24
     */
    public static function listids(array $query_request)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['listids'];

        // 参数
        $body = [
            'query_request' => $query_request,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取公告详情
     *
     * @param string $blackboard_id 公告id。
     * @param string $operation_userid 操作人userId，必须是公告管理员。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:40:21
     */
    public static function get(string $blackboard_id, string $operation_userid)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['get'];

        // 参数
        $body = [
            'blackboard_id' => $blackboard_id,
            'operation_userid' => $operation_userid,
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取公告分类列表
     *
     * @param string $operation_userid 操作人userId，必须是公告管理员。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:50:20
     */
    public static function category_list(string $operation_userid)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['category_list'];

        // 参数
        $body = [
            'operation_userid' => $operation_userid
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取用户可查看的公告
     *
     * @param string $userid 员工的userId。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 14:59:56
     */
    public static function listtopten(string $userid)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['listtopten'];

        // 参数
        $body = [
            'userid' => $userid
        ];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取公告钉盘空间信息
     *
     * @param string $operationUserId 操作人userId。
     * @return mixed
     * @author 王乾顺
     * @time 2023-09-18 15:03:10
     */
    public static function spaces(string $operationUserId)
    {
        // 请求地址
        $uri = Config::getApi()['blackboard']['spaces'];

        // 参数
        $body = [
            'operationUserId' => $operationUserId
        ];

        // 发送请求
        return ApiRequest::get_v1($uri, $body);
    }
}