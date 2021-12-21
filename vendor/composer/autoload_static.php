<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfca93693e88a84c07e87d42bd3ab34b0
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfca93693e88a84c07e87d42bd3ab34b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfca93693e88a84c07e87d42bd3ab34b0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfca93693e88a84c07e87d42bd3ab34b0::$classMap;

        }, null, ClassLoader::class);
    }
}