<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe3a40b368655bdc88e18c27361ff7a2
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe3a40b368655bdc88e18c27361ff7a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe3a40b368655bdc88e18c27361ff7a2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe3a40b368655bdc88e18c27361ff7a2::$classMap;

        }, null, ClassLoader::class);
    }
}
