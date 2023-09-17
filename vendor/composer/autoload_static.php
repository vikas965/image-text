<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d669aff46a763b729c2733999c77bd2
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'thiagoalessio\\TesseractOCR\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'thiagoalessio\\TesseractOCR\\' => 
        array (
            0 => __DIR__ . '/..' . '/thiagoalessio/tesseract_ocr/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d669aff46a763b729c2733999c77bd2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d669aff46a763b729c2733999c77bd2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d669aff46a763b729c2733999c77bd2::$classMap;

        }, null, ClassLoader::class);
    }
}
