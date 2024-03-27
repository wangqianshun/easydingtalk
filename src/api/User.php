<?php
declare(strict_types=1);

namespace Easydingtalk;

use Easydingtalk\common\ApiRequest;
use Easydingtalk\common\Config;

class User
{
    /**
     * 根据userid获取用户详情
     *
     * @param string $userid
     * @return mixed
     */
    public static function get(string $userid){
        // 请求地址
        $uri = Config::getApi()['user']['get'];

        // 参数
        $json=[
            'userid' => $userid
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }


    /**
     * 创建用户
     *
     * @param array $json
     * @return mixed
     */
    public static function create(array $json){
        // 请求地址
        $uri = Config::getApi()['user']['create'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }


    /**
     * 更新用户信息
     *
     * @param array $json
     * @return mixed
     */
    public static function update(array $json){
        // 请求地址
        $uri = Config::getApi()['user']['update'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 移除用户
     *
     * @param string $userid
     * @return mixed
     */
    public static function remove(string $userid){
        // 请求地址
        $uri = Config::getApi()['user']['remove'];

        // 参数
        $json = [
            'userid' => $userid
        ];
        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取部门用户基础信息
     *
     * @param array $json
     * @return mixed
     */
    public static function listsimple(array $json){
        // 请求地址
        $uri = Config::getApi()['user']['listsimple'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取部门用户userid列表
     *
     * @param integer $dept_id
     * @return mixed
     */
    public static function listid(int $dept_id){
        // 请求地址
        $uri = Config::getApi()['user']['listid'];

        // 参数
        $json=[
            'dept_id' => $dept_id
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取部门用户详情
     *
     * @param array $json
     * @return mixed
     */
    public static function list(array $json){
        // 请求地址
        $uri = Config::getApi()['user']['list'];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取员工人数
     *
     * @param bool $only_active
     * @return mixed
     */
    public static function count(bool $only_active = true){
        // 请求地址
        $uri = Config::getApi()['user']['count'];

        // 参数
        $json = [
            'only_active' => $only_active
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取未登录钉钉的员工列表
     *
     * @return mixed
     */
    public static function getinactive(array $json){
        // 请求地址
        $uri = Config::getApi()['user']['getinactive'];

        // 发送post请求
        return ApiRequest::post($uri,$json);
    }

    /**
     * 根据手机号获取userid
     *
     * @param string $mobile
     * @return mixed
     */
    public static function getbymobile(string $mobile){
        // 请求地址
        $uri = Config::getApi()['user']['getbymobile'];

        // 参数
        $json = [
            'mobile' => $mobile
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 根据unionid获取用户userid
     *
     * @param string $unionid
     * @return mixed
     */
    public static function getbyunionid(string $unionid){
        // 请求地址
        $uri = Config::getApi()['user']['getbyunionid'];

        // 参数
        $json = [
            'unionid' => $unionid
        ];

        // 发送get请求
        return ApiRequest::post($uri, $json);
    }

    /**
     * 获取管理员列表
     *
     * @return mixed
     */
    public static function listadmin(){
        // 请求地址
        $uri = Config::getApi()['user']['listadmin'];

        // 发送post请求
        return ApiRequest::post($uri);
    }

    /**
     * 获取管理员通讯录权限范围
     *
     * @param string $userid
     * @return mixed
     */
    public static function get_admin_scope(string $userid){
        // 请求地址
        $uri = Config::getApi()['user']['get_admin_scope'];

        // 参数
        $json = [
            'userid' => $userid
        ];

        // 发送post请求
        return ApiRequest::post($uri, $json);
    }
}