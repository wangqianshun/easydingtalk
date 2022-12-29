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
     * @author 初心
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
     * @author 初心
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
     * @author 初心
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
     * @author 初心
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

    /**
     * 获取单个审批实例详情
     *
     * @author 初心
     * @param string $processInstanceId
     * @return mixed
     */
    public static function getInstance(string $processInstanceId)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances'];

        // 参数
        $params = [
            'processInstanceId' => $processInstanceId
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发起请求
        return ApiRequest::get_v1($uri);
    }

    /**
     * 转交OA审批任务
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function tasksRedirect(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['tasks_redirect'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 获取审批钉盘空间信息
     *
     * @author 初心
     * @param string $userId
     * @return mixed
     */
    public static function spaceInfosQuery(string $userId)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['spaces_infos_query'];

        // 参数
        $body = [
            // 用户的userId
            'userId' => $userId,
            // 应用标识AgentId
            'agentId' => Config::getApp()['agent_id']
        ];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 添加审批评论
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function comments(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_comments'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 同意或拒绝审批任务
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function execute(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_execute'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 撤销审批实例
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function terminate(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_terminate'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 授权预览审批附件
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function spaceAuthPreview(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_spaces_auth_preview'];

        // 应用标识AgentId
        $body['agentId'] = Config::getApp()['agent_id'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 授权下载审批钉盘文件
     *
     * @author 初心
     * @param array $body
     * @return mixed
     */
    public static function fileAuthPreview(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_spaces_files_auth_download'];

        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 下载审批附件
     *
     * @author 初心
     * @param string $processInstanceId
     * @param string $fileId
     * @return mixed
     */
    public static function fileDownload(string $processInstanceId, string $fileId)
    {

        // 请求地址
        $uri = Config::getApi()['oa']['process_instances_spaces_files_urls_download'];

        // 参数
        $body = [
            'processInstanceId' => $processInstanceId,
            'fileId' => $fileId
        ];
        // 发起请求
        return ApiRequest::post_v1($uri, $body);
    }
}