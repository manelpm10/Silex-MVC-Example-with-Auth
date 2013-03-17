<?php

$app->mount( '/', new Controller\IndexController() );
$app->mount( '/user', new Controller\UserController() );

/**
 * example:
$app['post_model'] = $app->share(
	function( $app )
	{
		return new Model\PostModel( $app['db'] );
	}
);
$app->mount( '/post', new Controller\PostController( $app['post_model'] ) );
*/
