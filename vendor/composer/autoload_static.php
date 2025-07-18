<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite41cb5ebca33f2ece18200c090e43032
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SolarEstimator\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SolarEstimator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite41cb5ebca33f2ece18200c090e43032::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite41cb5ebca33f2ece18200c090e43032::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite41cb5ebca33f2ece18200c090e43032::$classMap;

        }, null, ClassLoader::class);
    }
}
