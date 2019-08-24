<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit522886a03c6680e8aa55c81225b7aa21
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gaming\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gaming\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Gaming',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit522886a03c6680e8aa55c81225b7aa21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit522886a03c6680e8aa55c81225b7aa21::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}