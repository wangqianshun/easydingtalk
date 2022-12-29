<?php
declare(strict_types=1);

namespace Easydingtalk\common;

use Easydingtalk\common\Config;
use Easydingtalk\common\ApiRequest;

class AccessToken
{
    /**
     * @title 获取token
     *
     * @return mixed access_token
     */
    public static function getToken() : string
    {
        // 以数组的形式返回关于文件路径的信息
        $file_info = pathinfo(Config::getApp()['access_token']['file_path']);
        // 拼接token路径信息
        $file_path_info = $file_info['dirname'].'/'.$file_info['basename'];
        // 文件是否存在
        if (!file_exists($file_path_info)) {
            fopen($file_path_info, 'w')or die('文件不存在!');
        }

        // 获取文件内容
        $json = file_get_contents($file_path_info);
        // 为空
        if(empty($json)){
            // 获取token
            self::generateToken();
        }else{
            // json转数组
            $token = json_decode($json, true);
            // 判断是否到期
            if (($token['expires_in'] - Config::getApp()['access_token']['expires']) < time()) {
                // 获取token
                self::generateToken();
            }
        }
        // 返回token
        return json_decode(file_get_contents($file_path_info), true)['access_token'];
    }


    /**
     * @title 发起请求获取token
     *
     */
    private static function generateToken()
    {
        // 数据集
        $params = [
            'appkey' => Config::getApp()['app_key'],
            'appsecret' => Config::getApp()['app_secret']
        ];
        // 是否携带token
        $has_token = false;
        // 发起请求
        $json = ApiRequest::get(Config::getApi()['get_token'], $params, $has_token);
        // json 转 数组
        $token = json_decode($json, true);
        // 获取到期时间（7200s）
        $expires_in = $token['expires_in'];
        // 当前时间 + 到期时间
        $token['expires_in'] = $expires_in + time();
        // 写入文件
        file_put_contents(Config::getApp()['access_token']['file_path'], json_encode($token));
    }
}