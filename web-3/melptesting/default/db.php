<?php
use \Melp\TestingBundle\Controller\DefaultController as Controller;

$controller =  new Controller();
$controller->setContainer(
    include APP_ROOT . '/services/container.php'
);

// This could be inlined by the Router component
$get = $request->query->all();
$response = $controller->dbAction($get['name']);

// This could be inlined by the Templating request listener
if (is_array($response)) {
    $env = $response;

    $response = new \Symfony\Component\HttpFoundation\Response(
    // this could be inlined by the templating compiler.
    // result of compiling 'MelpTestingBundle:Default:index.html.twig'
        'Hello ' . htmlspecialchars($env['real_name'])
    );
}

