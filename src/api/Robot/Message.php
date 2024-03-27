<?php
declare(strict_types=1);

namespace easydingtalk\api\Robot;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

class Message
{
    /**
     * 批量发送人与机器人会话中机器人消息
     *
     * @param array $userIds 接收机器人消息的用户的userId列表
     * @param string $msgKey 消息模板key
     * @param array $msgParam 消息模板参数
     * @return mixed
     * @author 王乾顺
     * @time 2024-03-26 21:28:45
     */
    public static function oToMessagesBatchSend(array $userIds, string $msgKey, array $msgParam)
    {
        // 请求地址
        $uri = Config::getApi()['robot']['oto_messages_batch_send'];
        // 机器人code
        $robotCode = Config::getRobot()['robot_code'];

        // 参数
        $body = [
            'robotCode' => $robotCode,
            'userIds' => $userIds,
            'msgKey' => $msgKey,
            'msgParam' => json_encode($msgParam, JSON_UNESCAPED_UNICODE)
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 人与人会话中机器人发送普通消息
     *
     * @param string $msgKey 消息模板key
     * @param array $msgParam 消息模板参数
     * @param string $openConversationId 会话ID
     * @param string $coolAppCode 酷应用编码
     * @return mixed
     * @author 王乾顺
     * @time 2024-03-26 21:57:52
     */
    public static function privateChatMessagesSend(string $msgKey, array $msgParam, string $openConversationId = '', string $coolAppCode = '')
    {
        // 请求地址
        $uri = Config::getApi()['robot']['private_chat_messages_send'];
        // 机器人code
        $robotCode = Config::getRobot()['robot_code'];

        // 参数
        $body = [
            'msgKey' => $msgKey,
            'msgParam' => json_encode($msgParam, JSON_UNESCAPED_UNICODE),
            'openConversationId' => $openConversationId,
            'robotCode' => $robotCode,
            'coolAppCode' => $coolAppCode
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 机器人发送群聊消息
     *
     * @param string $msgKey 消息模板key
     * @param array $msgParam 消息模板参数
     * @param string $openConversationId 会话ID
     * @return mixed
     * @author 王乾顺
     * @time 2024-03-26 21:57:52
     */
    public static function groupMessagesSend(string $msgKey, array $msgParam, string $openConversationId = '')
    {
        // 请求地址
        $uri = Config::getApi()['robot']['group_messages_send'];
        // 机器人code
        $robotCode = Config::getRobot()['robot_code'];

        // 参数
        $body = [
            'msgKey' => $msgKey,
            'msgParam' => json_encode($msgParam, JSON_UNESCAPED_UNICODE),
            'openConversationId' => $openConversationId,
            'robotCode' => $robotCode
        ];

        // 发送请求
        return ApiRequest::post_v1($uri, $body);
    }

    /**
     * 自定义机器人发送群消息
     *
     * @param string $accessToken 自定义机器人调用接口的凭证
     * @param array $body body参数
     * @return mixed
     * @author 王乾顺
     * @time 2024-03-26 22:46:51
     */
    public static function send(string $accessToken, array $body = [])
    {
        // 请求地址
        $uri = Config::getApi()['robot']['send'];

        // 参数
        $params = [
            // 自定义机器人调用接口的凭证
            'access_token' => $accessToken,
        ];

        // 数据拼接
        $uri = ApiRequest::joinParams($uri, $params);

        // 发送请求
        return ApiRequest::post($uri, $body, false);
    }
}