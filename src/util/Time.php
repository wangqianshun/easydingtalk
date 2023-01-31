<?php
declare(strict_types=1);

namespace Easydingtalk\util;

use DateTime;

class Time
{
    /*
     * 实例化
     */
    public static function setDate(string $date){
        return new DateTime($date);
    }

    /*
     * 转换
     */
    public static function toTime(string $date,bool $isMilisecond = false){
        // 是否为Unix时间戳毫秒
        if($isMilisecond){
            return self::setDate($date)->getTimestamp() * 1000;
        }else{
            return self::setDate($date)->getTimestamp();
        }
    }
}