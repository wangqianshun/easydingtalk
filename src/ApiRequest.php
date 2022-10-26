<?php
declare(strict_types=1);

namespace Easydingtalk;

use Exception;

class ApiRequest extends Base
{
    /**
     * @title get请求
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public static function get(string $uri, array $query = [], bool $has_token = true)
    {
        // 请求参数不为空
        if(!empty($query)){
            // 拼接url参数
            $uri = self::joinParams($uri, $query);
        }
        // 发起get请求
        return self::http_request('get', $uri, $query, $has_token);

    }
    /**
     * @title post请求
     *
     * @param string $uri
     * @param array $json
     * @param boolean $has_token
     * @return mixed
     */
    public static function post(string $uri, array $json = [], bool $has_token = true)
    {
        // 发起post请求
        return self::http_request('post', $uri, $json, $has_token);
    }
    /**
     * @title HTTP请求
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     * @param boolean $has_token
     * @return mixed
     */
    public static function http_request(string $method, string $uri, array $body = [], bool $has_token = true)
    {

        // 拼接url
        $uri = self::$api_config['domain'] . $uri;
        // 基础header头信息
        $header[] = 'Content-Type: application/json';
        // 是否携带token
        if ($has_token) {
            // 拼接 access_token
            $uri = self::joinParams($uri, [
                'access_token' =>  (new AccessToken)->getToken()
            ]);
        }
        try {
            $method = strtoupper($method);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_URL, $uri);
            curl_setopt($ch, CURLOPT_TIMEOUT, 2);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

            if(!empty($body) && $method=='POST'){

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $res = curl_exec($ch);
            curl_close($ch);
            return $res;
        } catch (\RuntimeException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @title 拼接url参数
     *
     * @param string $uri
     * @param array $params
     * @param boolean $encode
     * @return mixed
     */
    public static function joinParams(string $uri, array $params, bool $encode = false): string
    {
        // 生成 URL-encode 之后的请求字符串
        $url = $uri . '?' . http_build_query($params);

        // 判断是否编码后返回请求地址
        return $encode ? urlencode($url) : $url;
    }
}
