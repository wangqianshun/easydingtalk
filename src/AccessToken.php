<?php
declare(strict_types=1);

namespace EasyDingTalk;

class AccessToken extends Base
{
    public static function getToken()
    {
        var_dump(self::$config);
    }
}