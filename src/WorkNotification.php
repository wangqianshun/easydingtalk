<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

class WorkNotification
{
    /**
     * @title 发送工作通知
     *
     * @param integer $task_id
     * @return mixed
     */
    public static function sendMessage(array $json)
    {
        // 请求地址
        $uri = Config::getApi()['work_notification']['corpconversation'];

        // 应用id
        $json['agent_id'] = Config::getApp()['agent_id'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
}