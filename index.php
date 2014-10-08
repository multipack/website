<?php

/**
 * ✨
 * MULTIPACK
 *
 * Read the README before making changes.
 *
 * Welcome! This framework is based on lowcarb (https://github.com/phuu/lowcarb).
 *
 * There is one controller that handles all routes.
 *
 * To edit some content on the site, take a look in _multipack/view/.
 *
 * Coding style:
 *   - Indentation using 2 spaces, no tabs
 *   - Brackets are ... {
 *     } like that
 *   - Please comment anything that is not immediately obvious
 *
 */

/**
 * Setup
 */

error_log('');
error_log('- - - - - - - - - - - -');
// Log new access
error_log(date('r'));
error_log('');

// To stop direct script access
define('BOOT', true);

// CMS directories
define('DIR_ROOT',  __DIR__);
define('DIR_APP',   DIR_ROOT . '/_multipack');
define('DIR_LIB',   DIR_APP . '/lib');
define('DIR_MODEL', DIR_APP . '/model');

// Supress page errors?
// error_reporting(0);

/**
 * Load components
 */

$load = array('config', 'store', 'router',
              'uri', 'model', 'controller');

foreach($load as $file) {
  require(DIR_LIB . '/' . $file . ".php");
}

/**
 * Load site config
 */

$config = new Config();
require(DIR_APP . '/config.php');

/**
 * Load models
 */

$path = get_include_path();
set_include_path(DIR_MODEL);

foreach($config->models as $file) {
  require(DIR_MODEL . '/' . $file . ".php");
}

set_include_path($path);
unset($path);

/**
 * Parse URI and pass to router
 */

$uri = new URI($config->prefix);

$router = new Router($config->routes);
$route	= $router->match($uri->segments());

$redirects	= new Router($config->redirects, true);
$redirect	= $redirects->match($uri->segments());

/**
 * Model
 */

$model = new Store();

// Lanyrd API is a model
$model->lanyrd = new Lanyrd();
//$model->cache = new Cache();
Cache::setPath(DIR_APP . '/cache');

/**
 * Controller
 */

require(DIR_APP . '/multipack.php');

$controller = new Multipack($model, $config->url, $uri);

/**
 * Away we go!
 */

// Method should always exists as the Router handles 404 errors
if($redirect['is_error'] === false && method_exists($controller, $redirect['function']) ) {

  // Debuggin'
  $buf = "Redirect: " . $redirect['function'];
  error_log($buf);

  // This is nasty, nasty, nasty.
  call_user_func_array(array($controller, $redirect['function']), array_merge(array($redirects->get_routes()), $redirect['arguments']));
}
else if( method_exists($controller, $route['function']) ) {

  // Debuggin'
  $buf = "Req: " . $route['function'];
  error_log($buf);

  // This is nasty, nasty, nasty.
  call_user_func_array(array($controller, $route['function']), $route['arguments']);

} else {

  // http://en.wikipedia.org/wiki/Hyper_Text_Coffee_Pot_Control_Protocol
  exit("418 Error. I'm a teapot.");

}
