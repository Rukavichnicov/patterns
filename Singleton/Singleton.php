<?php
class Singleton
{
    private static $uniqueInstanse;
    public static function getInstance(): Singleton
    {
        if (self::$uniqueInstanse == NULL) {
            self::$uniqueInstanse = new Singleton;
        }
        return self::$uniqueInstanse;
    }
}
Singleton::getInstance();
?>