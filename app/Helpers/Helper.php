<?php

namespace App\Helpers;

class Helper
{


    public static function getClassName()
    {
        $namespace = explode('\\', static::class);

        $className = explode('Helper', $namespace[2]);

        return $className[0];
    }

    public static function helperIndex()
    {
        $className = static::getClassName();
        return strtolower($className) . "s.index";
    }

    public static function helperCreate()
    {
        $className = static::getClassName();
        return strtolower($className) . "s.create";
    }

    public static function helperShow()
    {
        $className = static::getClassName();
        return strtolower($className) . "s.show";
    }

    public static function helperUpdate()
    {
        $className = static::getClassName();
        return strtolower($className) . "s.update";
    }

    public static function helperCheckNull($data)
    {
        return ($data == "*") ? NULL : $data;
    }

    public static function sanitizeData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function decideIfLike($data)
    {
        if (Helper::sanitizeData($data) == NULL)
            return 'LIKE';
        return '=';
    }

    public static function decideIfPercent($data)
    {
        if (Helper::sanitizeData($data) == NULL)
            return "%{$data}%";
        return Helper::sanitizeData($data);
    }

    public static function handleOneDigitNumbers($data)
    {
        if (strlen($data) == 1) {
            return "0" . $data;
        }

        return $data;
    }
}
