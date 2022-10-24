<?php
declare(strict_types=1);

namespace EasyDingTalk;


class Base
{

    /**
     * @title 配置
     * @var array $config
     */
    protected static $config;

    public function init()
    {
        // 获取配置
        self::$config = config('easydingtalk');
    }
}