<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteaf25bdd8d2698c62902ddbe6df64d12
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderIniteaf25bdd8d2698c62902ddbe6df64d12', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteaf25bdd8d2698c62902ddbe6df64d12', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteaf25bdd8d2698c62902ddbe6df64d12::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
