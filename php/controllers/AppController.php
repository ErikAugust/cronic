<?php
namespace controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

/**
 * Class AppController
 * @package controllers
 * @description AppController - can be used as middleware controller
 */
class AppController {

    /**
     * @name testAction
     * @return Application
     */
    public function testAction(Application $app) {
        return $app->json(array('response' => 'Hello world!'));
    }
}
