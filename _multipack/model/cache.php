<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Cache
   * 
   * Cache data as JSON and use it seamlessly (and statically):
   * 
   * Cache::put($id, $data);
   * Cache::get($id);
   * Cache::cached($id)
   * Cache::clear([$id]); // NOT IMPLEMENTED (yet)
   * 
   * Cache::setPath($dir)
   * Cache::getPath()
   */
  
  class Cache {


    private static $path = __DIR__;
    private static $prefix = "cache-";
    private static $extension = ".json";
    private static $date_format = 'U';

    public static $throw_exceptions = true;

    /**
     * Set cache path
     * @param $path target path
     */
    public static function setPath($path) {

      // Strip trailing slashes
      $path = rtrim(trim($path), '/');

      // Check that directory exists
      if( is_dir($path) && is_writable($path) ) {

        self::$path = $path;
      } else {
        self::__throw("Cache path does not exist or is not writable.", __LINE__);
      }

    }

    /**
     * Get cache path
     * @return string target path
     */
    public static function getPath() {
      return self::$path;
    }

    /**
     * retrieve cached data with identifier $id
     * 
     * @param $id data identifier
     * @param $test [optional] if true, return true if file is cached
     */
    public static function get($id, $test = false) {

      $id = self::checkID($id);

      // Set up filename & route to file
      $filename = self::$prefix . $id . self::$extension;
      $filepath = self::$path . '/' . $filename;

      error_log("Cache get: " . $id . " - " . $filepath . ". Test: " . ($test ? "Yes." : "No."));

      $data = null;

      // Check file exists
      if( ! file_exists($filepath) ) {
        if( $test ) {
          error_log("Cache file does not exist.");
          return false;
        }
        self::__throw($filename . " could not be retrieved from the cache - file does not exist.", __LINE__);
      }

      // Attempt to extract data
      try {
        // Grab as associative array (hash), not object
        $data = json_decode(file_get_contents($filepath), true);
      } catch(Exception $e) {
        self::__throw("Failed to decode JSON from " . $filename . ".", __LINE__, $e);
      }

      // Has this file expired?
      if( time() - $data['expires'] > 0 ) {
        unlink($filepath);
        error_log("Cache file expired");
        return false;
      }

      // File exists and has not expired
      
      // If testing, return true
      if( $test ) return true;

      // Not testing, so push back the data
      return $data['data'];

    }

    /**
     * check if $id is cached - shorthand for get($id, true)
     */
    public static function cached($id) {
      return self::get($id, true);
    }

    /**
     * cache $data using $id as identifier
     *
     * @param string $id 
     * @param array $data 
     */
    public static function put($id, $data, $expires = '') {

      if( $expires === '' ) $expires = strtotime("+1 week");

      $id = self::checkID($id);

      error_log("Cache put: " . $id);

      // Set up filename & route to file
      $filename = self::$prefix . $id . self::$extension;
      $filepath = self::$path . '/' . $filename;

      // Set up important data
      $old_data = array();
      $created = intval(date(self::$date_format));
      $modified = $created;

      // If the file already exists,
      // pull out when it was created
      if( file_exists($filepath) ) {
        try {
          // Grab using ASSOC (ie, comes out as an array, not an object)
          $old_data = json_decode(file_get_contents($filepath), true);
        } catch(Exception $e) {
          self::__throw("Failed to decode JSON from " . $filename . ".", __LINE__, $e);
        }
        $created = intval($old_data['created']);
      }

      // Open, and wipe, file for writing
      $file = fopen($filepath, 'w');

      // Build data structure
      $cache_data = array(
        "created" => $created,
        "modified" => $modified,
        "expires" => $expires,
        "data" => $data
      );

      error_log(print_r($cache_data, true));

      $json = "";

      // Attempt to encode $cache_data
      try {
        $json = json_encode($cache_data);
      } catch (Exception $e) {
        self::__throw("Failed to encode JSON to " . $filename . ".", __LINE__, $e);
      }

      // Whack it into the cache file
      fwrite($file, $json);
      fclose($file);

    }

    private static function checkID($id) {
      // ensure $id is a string
      if( ! is_string($id) ) {
        self::__throw("$id must be string.", __LINE__);
      }

      // Strip nasties (allow A-Z, a-z, 0-9, '.' and '-')
      return preg_replace("/[^a-z0-9\.\-]/i", '', $id);
    }

    /**
     * handle errors - allows errors to be turned off
     *
     * @param $message 
     * @param $line 
     * @param $exception
     */
    private static function __throw($message, $line, $exception = null) {
      if( self::$throw_exceptions ) {
        if( $exception !== null ) {
          $message .= " " . $exception->message;
        }
        throw new CacheException($message, $line);
      }
    }

}

/**
 * Exception with some added jazz
 *
 * @package default
 */
class CacheException extends Exception {
  private $prefix = "Cache Error: ";
  function __construct($message, $line) {
    parent::__construct($this->prefix . $message);
    $this->line = $line;
  }
}

?>