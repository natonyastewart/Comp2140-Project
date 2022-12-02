<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7071e3b5e25f61d2ed59752a170b122a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7071e3b5e25f61d2ed59752a170b122a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7071e3b5e25f61d2ed59752a170b122a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7071e3b5e25f61d2ed59752a170b122a::$classMap;

        }, null, ClassLoader::class);
    }
}