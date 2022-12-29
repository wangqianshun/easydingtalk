<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\Config;

class OrdinaryMessage
{
    /**
     * @title 发送消息到企业群
     *
     * @param string $sender
     * @param string $cid
     * @param array $msg
     * @return mixed
     */
    public function sendMessage(string $sender, string $cid, array $msg)
    {

        // 请求url
        $uri = Config::getApi()['ordinary_message']['send_to_conversation'];

        // 请求参数
        $json =[
            'sender' => $sender,
            'cid' => $cid,
            'msg' => $msg
        ];
        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
}