<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

/**
 * 工作通知
 */
class WorkNotification
{
    /**
     * @title 发送工作通知
     *
     * @param array $body
     * @return mixed
     */
    public static function sendMessage(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['corpconversation'];

        // 应用id
        $body['agent_id'] = Config::getApp()['agent_id'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 更新工作通知状态栏
     *
     * @param array $body
     * @return mixed
     */
    public static function updateStatusBar(array $body)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['update_status_bar'];

        // 应用id
        $body['agent_id'] = Config::getApp()['agent_id'];

        // 发送请求
        return ApiRequest::post($uri, $body);
    }

    /**
     * 获取工作通知消息的发送进度
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function getSendProgress(int $task_id)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['get_send_progress'];

        // 参数
        $json = [
            'agent_id' => Config::getApp()['agent_id'],
            'task_id' => $task_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取工作通知消息的发送结果
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function getSendResult(int $task_id)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['get_send_result'];

        // 参数
        $json = [
            'agent_id' => Config::getApp()['agent_id'],
            'task_id' => $task_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 撤回工作通知消息
     *
     * @param int $msg_task_id
     * @return mixed
     */
    public static function recall(int $msg_task_id)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['recall'];

        // 参数
        $json = [
            'agent_id' => Config::getApp()['agent_id'],
            'msg_task_id' => $msg_task_id
        ];

        // 发送请求
        return ApiRequest::post($uri, $json);
    }
}