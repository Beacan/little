<?php
/**
 * Created by PhpStorm.
 * User: shenjin001
 * Date: 2019/1/6
 * Time: 1:36
 */

namespace App;


class Constant
{
    const EFFECT = 1;
    const INVALID = 0;
    const ONLINE = 1;
    const OFFLINE = 2;
    const OFFLINT_AWARD = 1;
    public static function getTime(){
        return date('Y-m-d H:i:s',time());
    }

}