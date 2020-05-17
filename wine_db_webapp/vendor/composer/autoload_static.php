<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit416cdeae71ece7b43b7a7553ba68b61d
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit416cdeae71ece7b43b7a7553ba68b61d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit416cdeae71ece7b43b7a7553ba68b61d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
