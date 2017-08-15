<?php
/**
 * Created by PhpStorm.
 * User: danilo.silva
 * Date: 08/08/2017
 * Time: 17:22
 */
spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', __DIR__ . DIRECTORY_SEPARATOR . $class . '.php'));
});