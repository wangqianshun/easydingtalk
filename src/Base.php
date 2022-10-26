<?php
declare(strict_types=1);

namespace Easydingtalk;

class Base
{

    /**
     * @title app配置
     * @var array $app_config
     */
    public static $app_config;

    /**
     * @title api配置
     * @var array $api_config
     */
    public static $api_config;

    // 构造方法
    public function __construct()
    {
        self::init();
    }

    // 初始化
    private static function init(){
        // app配置
        self::$app_config = config('easydingtalk.app');
        // api配置
        self::$api_config = config('easydingtalk.api');
    }
}