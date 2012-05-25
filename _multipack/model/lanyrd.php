<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Lanyrd API (based on https://github.com/phuu/lanyrd-php)
   * 
   * Requires CFPropertyList
   */

  require_once("CFPropertyList/CFPropertyList.php");
  
  class Lanyrd {
  
    private $base = "http://lanyrd.com/mobile/ios/";  
  
    /* Search & Event Wrapper */
  
    public function search ($query) {
      return $this->get("search/?context=future&q=" . urlencode($query)); // Should be htmlentities() / htmlspecialchars()?
    }
  
    public function events ($query) {
      return $this->event_details($query);
    }
  
    public function next_event ($query) {
      $results = $this->events_from_guide($query);
      $event = $this->event_by_id($results[0]["id"]);
      return $event;
    }
  
    public function events_search ($query) {
      $results = $this->search($query);
      return $results["events"];
    }
  
    public function guide ($query) {
      return $this->get("search/?q=" . urlencode($query) . "&type=guide");
    }

    public function schedule_from_id ($id) {
      $result = $this->get("schedule/" . $id);
      error_log(print_r($result, true));
    }
  
    public function events_from_guide ($query) {
      $results = $this->guide($query);
      return $results["events"];
    }
  
    public function event_by_id ($id) {
      $result = $this->get("event/" . $id);
      return $result["event"];
    }
  
    /* Private */
  
    private function event_details ($query) {
      $results = $this->events_from_guide($query);
      foreach($results as &$event) {
        $event = $this->event_by_id($event["id"]);
      }
      return $results;
    }
  
    private function get ($url) {
      error_log("Getting: " . $url);
      $url = $this->base . $url;
      $results = file_get_contents($url);
      $fp = fopen(__DIR__ . "/results", "w");
      fwrite($fp, $results);
      fclose($fp);
      return $this->parse(__DIR__ . "/results");
    }
  
    private function parse ($file) {
      $plist = new CFPropertyList( $file, CFPropertyList::FORMAT_BINARY );
      unlink($file);
      return $plist->toArray();
    }
  
  }
?>