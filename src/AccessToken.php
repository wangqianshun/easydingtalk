<?php
declare(strict_types=1);

namespace easydingtalk;

class AccessToken extends Base
{
    public static function getToken()
    {
        var_dump(self::$config);
    }
}