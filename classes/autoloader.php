<?php
class Autoloader {

    public static $loader;

    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct()
    {
        spl_autoload_register(array($this,'classes'));
    }


    public function classes($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'/classes/');
        spl_autoload($class);
    }

	/*
	Um exemplo de como carregar classes em outra pasta.

    spl_autoload_register(array($this,'classes2'));

	public function classes2($class)
    {
        set_include_path(get_include_path().PATH_SEPARATOR.'../classes2/');
        spl_autoload($class);
    }
	*/
}
?>