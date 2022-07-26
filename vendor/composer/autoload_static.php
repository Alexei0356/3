<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3a089029b2e2ca63899a956e21112bd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Matex\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Matex\\' => 
        array (
            0 => __DIR__ . '/..' . '/madorin/matex/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3a089029b2e2ca63899a956e21112bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3a089029b2e2ca63899a956e21112bd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3a089029b2e2ca63899a956e21112bd::$classMap;

        }, null, ClassLoader::class);
    }
}
