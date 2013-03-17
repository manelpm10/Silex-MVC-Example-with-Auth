<?php
namespace Controller
{
	use Silex\Application;
	use Silex\ControllerProviderInterface;

	class IndexController implements ControllerProviderInterface
	{
		public function connect( Application $app )
		{
			$indexController = $app['controllers_factory'];
			$indexController->get("/", array( $this, 'index' ) )->bind( 'homepage' );
			return $indexController;
		}

		public function index( Application $app )
		{
			$token = $app['security']->getToken();
			if ( empty( $token ) && !$token->isAuthenticated() )
			{
				return $app->redirect( $app['url_generator']->generate( 'login' ) );
			}
			return $app['twig']->render( 'home/home.tpl', array() );
		}
	}

}