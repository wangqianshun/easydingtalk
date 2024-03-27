<?php
declare(strict_types=1);

namespace Easydingtalk\common;

class Config
{

    /**
     * 当前的应用
     *
     * @var string
     */
    private static $app_type = '';

    /**
     * 当前的api
     *
     * @var string
     */
    private static $api_type = '';

    /**
     * 当前的机器人
     *
     * @var string
     */
    private static $robot_type = '';

    /**
     * 组织id
     *
     * @var string
     */
    private static $corp_id = '';

    /**
     * 当前的应用信息
     *
     * @var string
     */
    private static $app_info = [];

    /**
     * 当前的机器人信息
     *
     * @var string
     */
    private static $robot_info = [];

    /**
     * 设选择当前的应用
     *
     * @param array $robots
     * @return $this
     */
    public static function setAppType(string $appName)
    {
        self::$app_type = $appName;
        return new self;
    }

    /**
     * 设选择当前的api
     *
     * @param array $robots
     * @return $this
     */
    public static function setApiType(string $apiName)
    {
        self::$api_type = $apiName;
        return new self;
    }

    /**
     * 选择当前的机器人
     *
     * @param array $robots
     * @return $this
     */
    public static function setRobotType(string $robotType)
    {
        self::$robot_type = $robotType;
        return new self;
    }

    /**
     * 设置企业ID
     *
     * @param array $robots
     * @return $this
     */
    public static function setCorpId(string $corp_id)
    {
        self::$corp_id = $corp_id;
        return new self;
    }

    /**
     * 设置应用信息
     *
     * @param array $robots
     * @return $this
     */
    public static function setApp(array $apps)
    {
        self::$app_info = $apps;
        return new self;
    }

    /**
     * 设置机器人应用信息
     *
     * @param array $robots
     * @return $this
     */
    public static function setRobot(array $robots)
    {
        self::$robot_info = $robots;
        return new self;
    }

    /**
     * 获取当前应用配置信息
     *
     * @return array
     */
    public static function getApp()
    {
        return self::$app_info[self::$app_type];
    }

    /**
     * 获取当前api配置信息
     *
     * @return array
     */
    public static function getApi()
    {
        return self::$app_info[self::$api_type];
    }

    /**
     * 获取当前机器人应用配置信息
     *
     * @return array
     */
    public static function getRobot()
    {
        return self::$robot_info[self::$robot_type];
    }

    /**
     * 获取企业ID
     *
     * @return string
     */
    public static function getCorpId()
    {
        return self::$corp_id;
    }
}
