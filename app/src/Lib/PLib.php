<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 28/07/18
 * Time: 14:25
 */

namespace App\Lib;

class PLib
{
    public static function capitalize_name($text, $maxNames = null)
    {
        return mb_convert_case($text, MB_CASE_TITLE, 'UTF-8');
    }
}