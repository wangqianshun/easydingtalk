<?php
declare(strict_types=1);

namespace easydingtalk\api;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;
use easydingtalk\util\encrypt\DingCallbackCrypto;

class EventCallback
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
        $crypt = (new DingCallbackCrypto(Config::getApp()['callback_info']['token'], Config::getApp()['callback_info']['aes_key'], Config::getApp()['app_key']));
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
        return ApiRequest::get(Config::getApi()['callback_failed_lists']);
    }
}