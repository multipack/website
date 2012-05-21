<?php if(!BOOT) exit("No direct script access.");

  /**
   * ✨
   * MULTIPACK
   * 
   * Controller
   */
  
  class Controller {
    
    public $model, $url, $uri, $view, $view_data, $view_errors;
    
    /**
     * construct controller
     *
     * @param array $model 
     * @param string $url 
     * @param string $uri 
     * @author Tom Ashworth
     */
    function __construct($model, $url, $uri) {
      
      $this->model = $model;
      $this->url = $url;
      $this->uri = $uri;
      
    }
    
    /**
     * serve error page
     *
     * @return void
     * @author Tom Ashworth
     */
    public function error() {
      
      $this->view('error',$data,$errors);
      
    }
    
    /**
     * output some view file to the reader, and show admin panel if authenticated
     *
     * @param string $view 
     * @param array $data 
     * @param array $errors 
     * @return void
     * @author Tom Ashworth
     */
    protected function view($view, $data = array(), $errors = array()) {
     
      $this->current_view = $view;
      $this->view_data = new Store($data);
      $this->view_errors = new Store($errors);

      include(DIR_APP . "/view/layout.php");
      
    }

    /**
     * retrieve view component
     * 
     * @param  string $file file to load
     */
    protected function view_component($file, $data = array()) {

      // If the data's already a Store, don't screw around with it
      if( $data instanceOf Store ) {
        $view_component_data = $data;
      } else {
        $view_component_data = new Store($data);
      }

      $file = $file . '.php';

      include(DIR_APP . '/view/' . $file);

    }

    /**
     * get view titile
     * @return string view title
     */
    protected function view_title() {
      return $this->view_data->title;
    }

    /**
     * get view titile
     * @return string view description
     */
    protected function view_description() {
      return $this->view_data->description;
    }
    
  }

?>