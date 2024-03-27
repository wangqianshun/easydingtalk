<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

class Department
{
    /**
     * 创建部门
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        // 请求地址
        $uri = Config::getApi()['department']['create'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 更新部门
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        // 请求地址
        $uri = Config::getApi()['department']['update'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
    /**
     * 删除部门
     *
     * @param int $dept_id
     * @return mixed
     */
    public static function remove(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['department']['remove'];

        // 参数
        $json=[
            'dept_id'=>$dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取部门详情
     *
     * @param array $json
     * @return mixed
     */
    public static function get(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['department']['get'];

        // 参数
        $json = [
            'dept_id' => $dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取部门列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listsub(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['department']['listsub'];

        // 参数
        $json=[
            'dept_id'=>$dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取子部门id列表
     *
     * @param array $json
     * @return mixed
     */
    public static function listsubid(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['department']['listsubid'];

        // 参数
        $json=[
            'dept_id'=>$dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取指定部门的所有父部门列表
     *
     * @param int $dept_id
     * @return mixed
     */
    public static function listparentbydept(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['department']['listparentbydept'];

        // 参数
        $json=[
            'dept_id'=>$dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取指定用户的所有父部门列表
     *
     * @param string $userid
     * @return mixed
     */
    public static function listparentbyuser(string $userid){
        // 请求地址
        $uri = Config::getApi()['department']['listparentbyuser'];

        // 参数
        $json=[
            'userid'=>$userid
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
}