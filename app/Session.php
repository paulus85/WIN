<?php
/**
 * Created by PhpStorm.
 * User: priviere
 * Date: 05/01/2016
 * Time: 17:50
 */

namespace App;


/**
 * This class is used to manage flash messages in the whole application. It works like a "producer-consumer"-like stack.
 * Session class is a Singleton.
 * @package App
 */
class Session
{

    protected static $instance;

    protected function __construct(){
        session_start();
    }

    public static function getInstance(){
        if(!self::$instance) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    /**
     * Add a flash message
     * @param string $message The content which have to be displayed in the flash message
     * @param string $category The category of the flash message. This should correspond to class extension in the Bootstrap framework.
     */
    public function addFlash($message, $category) {
        $_SESSION['flash'][$category] = $message;
    }

    /**
     * Get the array with the messages to display
     * @return array The associative array composed by $class => $message objects.
     */
    public function getFlashes(){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    /**
     * Says if there are some flash messages to read.
     * @return bool
     */
    public function hasFlashes(){
        return isset($_SESSION['flash']);
    }


}