<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 10/24/20
 * Time: 12:19 PM
 */

class ContainerIoc
{
    private static $container = [];

    public static function register($alias, $resolver)
    {
        static::$container[$alias] = $resolver;
    }

    public static function resolve($alias)
    {
        $resolver = static::$container[$alias];

        return $resolver();
    }
}