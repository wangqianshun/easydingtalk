<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * OA审批
 */
class OA
{
    /**
     * 获取表单 schema
     *
     * @param string $processCode
     * @return mixed
     */
    public static function getByProcessCode(string $processCode)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['workflow'];

        // 参数
        $params = [
            'processCode' => $processCode
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 创建或修改审批表单模板
     *
     * @param array $body
     * @return mixed
     */
    public static function save(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['forms'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 获取审批单流程中的节点信息
     *
     * @param array $body
     * @return mixed
     */
    public static function forecast(array $body){
        // 请求地址
        $uri = Config::getApi()['oa']['forecast'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 发起审批实例
     *
     * @param array $body
     * @return mixed
     */
    public static function request(array $body){
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances'];

        // 应用标识AgentId
        $body['microappAgentId'] = Config::getApp()['agent_id'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }
}