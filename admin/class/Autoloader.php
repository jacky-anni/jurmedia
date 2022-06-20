<?php

class Autoloader
{

	static function autoload($Class_NAme)
	{
		require $Class_NAme.'.php';
	}


}
spl_autoload_register(array('autoloader','autoload'));
?>
