<?php

/**
 * Front controller
 * 
 * PHP version 8.1
 */

//echo 'Requested URL = "' .$_SERVER['QUERY_STRING'].'"';

// Require the controller class
// require '../App/Controllers/Posts.php';

/**
 * Routing
 */
// require '../Core/Router.php';

/**
 * Composer 
 */
require '../vendor/autoload.php';

/**
 * Twig
 */

 Twig_Autoloader::register();


/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
  $root = dirname(__DIR__); // get the parent Directory
  $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_readable($file)) {
    require $root . '/' . str_replace('\\', '/', $class) . '.php';
  }
});

/**
 * Error and Exception handling
 */
// error_reporting*(E_ALL);
//set_error_handler('Core\Error::errorHandler');
//set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

//echo get_class($router);

// Add the Routes
// $router->Add('', ['controller' => 'Home', 'action' => 'index']);
// $router->Add('posts', ['controller' => 'Posts', 'action' => 'index']);
// //$router->Add('posts/new',['controller' => 'Posts', 'action' => 'new']);
// $router->Add('{controller}/{action}');
// $router->add('{controller}/{id:\d+}/{action}');

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    


//Display the routing table
#echo '<pre>';
#echo htmlspecialchars(print_r($router->getRoutes(), true));
#echo '</pre>';

/**
 * Display the routing table
 * echo'<pre>';
 * var_dump(route->getRoutes());
 * echo '</pre>';
 */

// Match the requested route
/* $url = $_SERVER['QUERY_STRING'];
 if ($router->match($url)) {
 # if it found the route for URL
 echo'<pre>';
 var_dump($router->getParams());
 echo '</pre>';
 } else {
 echo "<pre> No route found for URL '$url'</pre>"; 
 }*/
$router->dispatch($_SERVER['QUERY_STRING']);

?>