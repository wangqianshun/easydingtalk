<?php
declare(strict_types=1);

namespace Easydingtalk;


class WorkNotification extends Base
{
    /**
     * @title 发送工作通知
     *
     * @param integer $task_id
     * @return mixed
     */
    public function sendMessage(array $json)
    {
        // 请求地址
        $uri = self::$api_config['work_notification']['corpconversation'];

        // 应用id
        $json['agent_id'] = self::$app_config['agent_id'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
}