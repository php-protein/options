<?php declare(strict_types=1);

/**
 * Options trait
 *
 * This trait embeds a small key-value map for class internal settings.
 *
 * @package Proteins
 * @author  "Stefano Azzolini"  <lastguest@gmail.com>
 */

namespace Proteins;

trait Options {
    protected static $__options;

    public static function optionGet(string $path, $default = null){
        if (empty(static::$__options)) static::$__options = new Map();
        return static::$__options->get($path, $default);
    }
    
    public static function optionSet(string $path, $value){
        if (empty(static::$__options)) static::$__options = new Map();
        return static::$__options->set($path, $value);
    }

    public static function option(string $path, $default = null){
        return static::optionGet($path, $default);
    }

}