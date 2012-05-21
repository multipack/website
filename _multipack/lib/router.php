<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Router
   */

  class Router {
    
    private $routes = array();
    
    private $uri;
    
    /**
     *  constructor
     * 
     */
    function __construct($routes) {
      
      foreach($routes as $uri => $function) {
        $this->_add($uri, $function);
      }
      
    }
    
    /**
     * matches uri to callback
     *
     */
    public function match($segments) {
      
      $uri = $segments;
      
      $function = "";
      $arguments = $segments;
            
      if( empty($segments) ) {
        return array("function" => $this->_get_route('index'), "arguments" => array());
      }
      
      foreach($segments as &$segment) {
        $segment = trim(preg_replace('/\d+/i',':num',$segment), '/');
      }
      
      if( $segments[0] !== ':num' ) {
        array_shift($arguments);
        return array("function" => $this->_get_route($segments[0]), "arguments" => $arguments);
      } elseif( $segments[0] == ':num' ) {
        return array("function" => $this->_get_route('index'), "arguments" => $arguments);
      }
      
      return array("function" => $this->_get_route('error'), "arguments" => $arguments);
      
    }
    
    /**
     *  gets route value
     * 
     */
    private function _get_route($key) {
      
      if( array_key_exists($key, $this->routes) ) {
        return $this->routes[$key];
      } else {
        return 'error';
      }
      
    }
    
    /**
     *  adds a route
     * 
     */
    private function _add($uri, $function) {
      
      $uri = trim($uri);
      
      if( $uri == '' ) {
        $uri = 'index';
      }
            
      if( isset($this->routes[$uri]) ) {
        exit("Attempted route override.");
      }
      
      $this->routes[$uri] = $function;
            
    }
    
    
  }