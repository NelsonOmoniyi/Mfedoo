<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81bdd20206da4363db4b15c1565899a1
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit81bdd20206da4363db4b15c1565899a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81bdd20206da4363db4b15c1565899a1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81bdd20206da4363db4b15c1565899a1::$classMap;

        }, null, ClassLoader::class);
    }
}
