<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Config
   */
  
  class Config {
    
    // Allow for multiple deploy enviroments
    private $environment;
    
    private $config = array();
  
    /**
     *  constructor
     * 
     */
    function __construct($env = "development") {
      
      $this->environment = trim($env);
      
      $this->config[$env] = array();
      
    }
    
    /**
     *  changes deploy environment
     * 
     */
    public function environment($env = "development") {
      if( !array_key_exists($env, $this->config) ) {
         $this->config[$env] = array();
      }
      $this->environment = $env;
    }
    
    /**
     *  sets config property
     * 
     */ 
    public function __set($name, $value) {
      
      if( !array_key_exists($this->environment, $this->config) ) {
        return null;
      }
      
      $this->config[$this->environment][$name] = $value;
      
    }
    
    /**
     *  gets config property or null
     * 
     */
    public function __get($name) {
      if( array_key_exists($name, $this->config[$this->environment]) ) {
        return $this->config[$this->environment][$name];
      }
      return null;
    }
  
  }