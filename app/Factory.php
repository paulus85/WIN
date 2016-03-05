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
    static $formatter;

    public static function getDatabaseConnection(){
        if(!self::$db){
            self::$db = new Database('root','root','win');
        }
        return self::$db;
    }

    public static function getFormatter(){
        if(!self::$formatter){
            self::$formatter = new \IntlDateFormatter('fr_FR', \IntlDateFormatter::LONG,
                \IntlDateFormatter::NONE,
                'Europe/Paris',
                \IntlDateFormatter::GREGORIAN);
        }
        return self::$formatter;
    }


}