<?php
/**
 * Created by PhpStorm.
 * User: priviere
 * Date: 01/01/2016
 * Time: 20:11
 */

namespace App;


class Utils
{
    /**
     * Method which displays the value of an object in a good presentation (using <pre> and print_r)
     * @param $object
     */
    public static function dd($object) {
        echo '<pre>';
        print_r($object);
        echo '</pre>';
    }

}