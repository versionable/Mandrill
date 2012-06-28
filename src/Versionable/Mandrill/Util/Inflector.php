<?php

namespace Versionable\Mandrill\Util;

/**
 * Description of Inflector
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Inflector
{
    public static function camelCase($string)
    {
        return str_replace(" ", "", ucwords(strtr($string, "_-", "  ")));
    }
    
    public static function underscore($string)
    {
        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $string));
    }
}
