<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Controller
   */
  
  class Multipack extends Controller {
    
    /**
     * serve home page with events
     *
     */
    public function index() {

      // Data is passed to the view
      $data = array("title" => "Home", "description" => "The Multipack");

      // Get raw events from Lanyrd, or cache
      $data["events"] = $this->get_events();
      
      $this->view('home', $data);
      
    }

    /**
     * serve style guide
     *
     */
    public function style() {

      // Data is passed to the view
      $data = array("title" => "Style Guide", "description" => "The Multipack Style Huide");

      // Get raw events from Lanyrd, or cache
      $data["events"] = $this->get_events();
      
      $this->view('style', $data);
      
    }

    /**
     * Meetup specifc routes
     * @param  string $slug [description]
     * @return [type]       [description]
     */
    public function meetup_leampack($slug = '') {
      $this->meetup('leampack', $slug);
    }
    public function meetup_multipack($slug = '') {
      $this->meetup('multipack birmingham', $slug);
    }

    /**
     * serve meetup page
     * 
     * @param  string $slug Lanyrd slug for the event
     */
    private function meetup($meetup, $slug = '') {

      // Data is passed to the view
      $data = array();

      if( $slug !== '' ) {
        // Get raw events from Lanyrd, or the cache
        $ev = $this->get_event_by_slug($slug);
      } else {
        // Get raw event from Layrd or cache using meetup name
        $ev = $this->get_event_by_meetup($meetup);
      }

      // Store the ID of the first event
      $id = $ev["id"];

      // Get the event from Lanyrd, or the cache
      $raw_event = $this->get_event_by_id($id);
      
      // Extract the event
      $event = $this->extract_event($raw_event);
      
      // Add view data
      $data['title'] = ucwords($event->meetup);
      if( $slug !== '' ) $data['title'] = ucwords(str_replace('-', ' ', $slug));
      $data["event"] = $event;

      // Gogogo!
      $this->view('meetup', $data);

    }

    /**
     * presents page
     */
    public function presents() {

      $data = array();
      
      $data['title'] = "Presents";
      $data["events"] = $this->get_events();

      $this->view('coming_soon', $data);
    }

    /**
     * retrieve a single event's data from Lanyrd
     * @param  $id the lanyrd id of the event
     */
    private function get_event_by_id($id) {

      $cache_id = 'event-' . $id;

      // Is it cached? Send it right back
      if( Cache::cached($cache_id) ) {
        return Cache::get($cache_id);
      }

      // Store it and cache it (with a long expiry time)
      $event = $this->model->lanyrd->event_by_id($id);

      Cache::put($cache_id, $event, strtotime("+6 months"));

      return $event;

    }

    /**
     * get single event's details from Lanyrd using slug
     * @param  string $slug slug event identifier
     * @return array       event array
     */
    private function get_event_by_slug($slug) {

      // Is it cached? Send it right back
      if( Cache::cached($slug) ) {
        return Cache::get($slug);
      }

      // Nope, so grab and store it for a long time
      $result = $this->model->lanyrd->events_search($slug);
      $event = $result[0];
      
      Cache::put($slug, $event, strtotime("+6 months"));

      return $event;

    }

    /**
     * get single event's details from Lanyrd using meetup name
     * @param  string $meetup meetup name
     * @return array       event array
     */
    private function get_event_by_meetup($meetup) {

      $cache_id = 'event-meetup-' . $meetup;

      // Is it cached? Send it right back
      if( Cache::cached($cache_id) ) {
        return Cache::get($cache_id);
      }

      // Nope, so grab and store it for a long time
      $result = $this->model->lanyrd->events_search($meetup);
      $event = $result[0];
      
      Cache::put($cache_id, $event, strtotime("+1 week"));

      return $event;

    }

    /**
     * retrieve next $count event's data from Lanyrd & process for ease
     * of use in the view
     * @param $count number of events retrieved
     */
    private function get_events($count = 2) {

      $cached = Cache::cached('events');

      // Do we have events cached?
      if( $cached ) {
        $raw_events = Cache::get('events');
      } else {
        $raw_events = $this->model->lanyrd->events_from_guide("multipack");
      }

      $cache_data = array();

      $events = array();
      foreach( $raw_events as $key => $event ) {
        // We only want $count events
        if( $key === $count ) break;
        // Pull out the id
        $id = $raw_events[$key]["id"];
        // Get detailed event information
        $raw_e = $this->get_event_by_id($id);
        // Extract the important info
        $e = $this->extract_event($raw_e);
        // Store it
        $events[$key] = $e;
        $cache_data[$key] = $raw_e;
      }

      if( !$cached ) {
        Cache::put('events', $cache_data, strtotime("+3 days"));
      }

      return $events;

    }

    /**
     * extract event to be more useful for our purposes
     * @param  array $raw_event
     */
    private function extract_event($raw_event) {

      // Grab the meetup name
      $raw_meetup = explode('-',  $raw_event['slug']);
      $meetup = $raw_meetup[0];

      // And the date
      $raw_date = explode('-', $raw_event['start_date']);
      $date = date('j M', mktime(0, 0, 0, $raw_date[1], $raw_date[2], $raw_date[0]));

      // And the location
      $raw_location = explode(',', $raw_event['place_name']);

      $event = array(
        "meetup" => $meetup,
        "date" => $date,
        "venue" => $raw_event['venues'][0],
        "location" => $raw_location[0],
        "lanyrd" => $raw_event['web_url'],
        "map_url" => $raw_event['gmap_url'],
        "url" => $meetup . "/" . $raw_event['slug'],
        "tagline" => $raw_event['tagline']
      );

      // And send it all back with some other useful data (as a Store)
      return new Store($event);

    }
    
  }