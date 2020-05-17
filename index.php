<?php

define('WEBROOT', dirname(__FILE__).'/webroot');
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));


/* echo WEBROOT . "\n<br>";
echo ROOT . "\n<br>";
echo CORE . "\n<br>";

echo $_SERVER['SCRIPT_NAME'] . "\n<br>";
echo BASE_URL . "\n<br>";
echo $_SERVER['PATH_INFO'] . "\n<br>"; 
echo $_SERVER['REQUEST_URI']; */

/*
C:\wamp64\www\lab\00_projets_grafikart\28_projet_grafikart_devsite\webroot
C:\wamp64\www\lab\00_projets_grafikart\28_projet_grafikart_devsite
C:\wamp64\www\lab\00_projets_grafikart\28_projet_grafikart_devsite\core

/00_projets_grafikart/28_projet_grafikart_devsite/webroot/index.php
/00_projets_grafikart/28_projet_grafikart_devsite
/pages/view/1
*/

require CORE.DS.'includes.php';
new Dispatcher();
?>