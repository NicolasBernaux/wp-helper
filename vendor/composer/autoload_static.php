<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd8a0b3e64a578a32c9afdbfdd394dc1
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Helper\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Helper\\Helper' => __DIR__ . '/../..' . '/Helper.php',
        'Helper\\Image' => __DIR__ . '/../..' . '/Helper/Image.php',
        'Helper\\Transient' => __DIR__ . '/../..' . '/Helper/Transient.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd8a0b3e64a578a32c9afdbfdd394dc1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd8a0b3e64a578a32c9afdbfdd394dc1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbd8a0b3e64a578a32c9afdbfdd394dc1::$classMap;

        }, null, ClassLoader::class);
    }
}
