<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Store
   * A simple wrapper for an array that lets
   * you use $object->property syntax on't.
   * 
   * It's kinda neat.
   */

  class Store {
    
    private $data;
  
    /**
     *  constructor
     * 
     */
    function __construct($data = array()) {
      $this->data = $data;
    }
    
    /**
     *  sets data property
     * 
     */ 
    public function __set($name, $value) {
      
      $this->data[$name] = $value;
      
    }
    
    /**
     *  gets data property or null
     * 
     */
    public function __get($name) {
      if( array_key_exists($name, $this->data) ) {
        return $this->data[$name];
      }
      return null;
    }
  
  }