<?php

/**
 * @description Cronic - Front Controller (index.php)
 * @author Erik August Johnson <erik@erikaugust.com>
 * @version 0.0.1
 */

/**
 * Base include file - adds vendor autoload, etc.
 */
require_once __DIR__.'/../php/base.php';

/**
 * Use Symfony Components:
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\ParameterBag;


use Symfony\Component\Routing\RouteCollection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;

use Silex\Application;


/**
 * Use custom models and controllers:
 */
use models\Base;
use controllers\AppController;



/**
 * Initialize Silex application:
 */
$app = new Application();

/**
 * Session
 */
$app->register(new Silex\Provider\SessionServiceProvider(), array(
    'session.storage.save_path' => __DIR__.'/../php/session',
));

/**
 * Auto-decodes JSON requests to PHP array
 */
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

/**
 * Auto-converts cookies to session variables:
 */
/*$app->before(function (Request $request) use ($app) {
    if(!$app['session']->has("Example")) {
        $cookies = $request->cookies;
        if($cookies->has("Example")) {
            $app['session']->set("Example", $cookies->get("Example"));
        }
    }
});*/

/**
 * Twig Templating
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../php/views',
));


/**
 * Routing: Front Controller
 * Add custom routes below:
 */
$app->get('/', function () use ($app) {
    return $app['twig']->render('hello_world.twig');
});

/**
 * Routing: Extended
 * Auto-generated routes in YAML format - php/config/routes.yml
 */
$app['routes'] = $app->extend('routes', function (RouteCollection $routes) {

    $locator = new FileLocator(array(__DIR__ . "/../php/config/"));
    $loader = new YamlFileLoader($locator);
    $collection = $loader->load('routes.yml');

    $routes->addCollection($collection);

    return $routes;
});


/**
 * Application Debug Mode Toggle
 */
$app['debug'] = true;


/**
 * Run Application
 */
$app->run();
