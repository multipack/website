<?php if(!BOOT) exit("No direct script access.");

  /**
   * 
   * ✧ lowcarb
   * 
   *   Model
   * 
   *   autoloaded
   * 
   */

  class Model {
    
    private $query, $table;
    
    /**
     *  constructor
     * 
     */
    function __construct($table, $db = null) {
      
      if( !isset($table) ) {
        exit("Model created with no associated table.");
      }
      
      if( $db == null ) {
        exit("Model created with no database method.");
      }
      
      $this->table = trim($table);
      
      // this is a handle to a DB query function.
      // it does not care if the DB has been connected,
      // and so calling query("...SQL...") could actually
      // be forcing a DB connection, and then querying
      $this->db = $db;
      
    }
    
    /**
     * run select query 
     *
     */
    public function select($options = array(), $fields = array(), $asc = false, $debug = false) {
      
      $this->_process_fields($fields);
      
      $this->_process_options($options);
      
      $sql = "SELECT " . $fields
           . " FROM " . $this->table
           . " " . $options
           . " ORDER BY date " . ($asc ? "ASC" : "DESC");
           
      if( $debug ) {
        print_r($sql);
        exit();
      }
          
      $result = $this->db->query($sql);
      
      return $this->_process_result($result);
      
    }
    
    /**
     * run insert query 
     *
     */
    public function insert($fields = array(), $debug = false) {
      
      if( empty($fields) ) return false;
      
      $columns = array();
      $values = array();
      
      foreach($fields as $field => $value) {
        
        array_push($columns, mysql_escape_string(stripslashes($field)));
        array_push($values, mysql_escape_string(stripslashes($value)));
        
      }
                
      $sql = "INSERT INTO " . $this->table
           . " (" . implode($columns, ', ') . ") "
           . " VALUES ('" . implode($values, "', '") ."')";
           
      if( $debug ) {
        print_r($sql);
        exit();
      }         
    
      $this->db->query($sql);
            
      return true;
      
    }
    
    /**
     * run update query 
     *
     */
    public function update($fields = array()) {
      
      if( empty($fields) ) return false;
      
      $pairs = array();
      
      foreach($fields as $field => $value) {
        
        if( $field != 'id' ) {
          array_push($pairs, $field."='".mysql_escape_string(stripslashes($value))."'");
        }
        
      }
                
      $sql = " UPDATE " . $this->table
           . " SET " . implode($pairs, ', ')
           . " WHERE id=" . $fields['id']; 
         
      $this->db->query($sql);
            
      return true;
      
    }
    
    /**
     * run delete query 
     *
     */
    public function delete($options = array(), $debug = false) {
      
      $this->_process_options($options);
      
      $sql = "DELETE FROM " . $this->table
           . " " . $options
           . " LIMIT 1";
           
      if( $debug ) {
        print_r($sql);
        exit();
      }
          
      $this->db->query($sql);
      
    }
    
    /**
     * process sql query result to array
     *
     */
    private function _process_result($result) {
      
      $temp = array();
      
      while($row = mysql_fetch_array($result)) {
        array_push($temp, $row);
      }
      
      return $temp;
      
    }
    
    /**
     * process sql query fields
     *
     */
    private function _process_fields(&$fields) {
      
      if( empty($fields) || $fields[0] == "*" ) {
        $fields = "*";
      } else {
        $fields = implode(", ", $fields);
      }
      
    }
    
    /**
     * process sql query options
     *
     */
    private function _process_options(&$options) {
      
      $temp = "WHERE ";
      
      if( empty($options) ) {
        $options = "";
        return null;
      } else {
        $count = 0;
        foreach($options as $field => $value) {
          if($count > 0) {
            $temp .= " AND";
          }
          $temp .= " " . $field . "='" . filter_var($value, FILTER_SANITIZE_STRING) . "'";
          $count += 1;
        }
      }
      
      $options = $temp;
      
    }
    
    /**
     * turn post title into stored name
     *
     */
    public function process_name(&$name) {
      
      $name = strtolower(str_replace(array("%20", " "), '-', $name));
      $name = preg_replace('/[^a-z\-]/i','',$name);
      
    }
    
    /**
     * turn post title into stored name
     *
     */
    public function check_name($name) {
      
      $sql = "SELECT * FROM " . $this->table . " WHERE name='" . $name . "'";
      
      $result = $this->db->query($sql);
      
      if( count($this->_process_result($result)) > 0 ) {
        return false;
      }
      
      return true;
      
    }
    
    
  }
  
?>