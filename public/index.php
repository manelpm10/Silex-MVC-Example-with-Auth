<?php

define( 'PATH_ROOT', dirname( __DIR__ ) );
define( 'PATH_CACHE', PATH_ROOT . '/cache' );
define( 'PATH_LOCALES', PATH_ROOT . '/locales' );
define( 'PATH_LOG', PATH_ROOT . '/log' );
define( 'PATH_PUBLIC', PATH_ROOT . '/public' );
define( 'PATH_SRC', PATH_ROOT . '/src' );
define( 'PATH_VENDOR', PATH_ROOT . '/vendor' );
define( 'PATH_VIEWS', PATH_SRC . '/views' );

ini_set('display_errors', 0);

require_once PATH_VENDOR . '/autoload.php';

$app = new Silex\Application();

require PATH_SRC . '/config/prod.php';
require PATH_SRC . '/app.php';

$app['http_cache']->run();
