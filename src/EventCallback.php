<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\util\encrypt\DingCallbackCrypto;

class EventCallback extends Base
{
    /**
     * @title 解码加密信息
     *
     * @param string $signature
     * @param string $timeStamp
     * @param string $nonce
     * @param string $encrypt
     * @return array
     */
    public function getEncryptedMap(string $signature, string $timeStamp, string $nonce, string $encrypt) : array
    {
        // 实例化钉钉加解密类
        $crypt = (new DingCallbackCrypto(self::$app_config['callback_info']['token'], self::$app_config['callback_info']['aes_key'], self::$app_config['app_key']));
        // 获取解密信息
        $text = $crypt->getDecryptMsg($signature, $timeStamp, $nonce, $encrypt);
        // 获取返回钉钉服务器信息
        $res = $crypt->getEncryptedMap("success");
        // 返回结果集
        return [
            'msg' => json_decode($text, true),
            'map' => $res
        ];
    }

    /**
     * @title 获取推送失败的事件列表
     *
     * @return mixed
     */
    public function getCallbackFailedLists(){
        return ApiRequest::get(self::$api_config['callback_failed_lists']);
    }
}