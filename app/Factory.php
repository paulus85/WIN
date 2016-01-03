<?php
/**
 * Created by PhpStorm.
 * User: priviere
 * Date: 01/01/2016
 * Time: 20:14
 */

namespace App;


class Factory
{

    static $db;

    public static function getDatabaseConnection(){
        if(!self::$db){
            self::$db = new Database('root','root','win');
        }
        return self::$db;
    }

}