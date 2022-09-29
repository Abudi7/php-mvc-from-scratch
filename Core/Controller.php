<?php
namespace Core;

/**
 * Base Controller
 * 
 * PHP Version 8.1 
 */
// abstract class that mean i can't create an object directly
abstract class Controller
{ /**
  * Paramter from the Matched route 
  * @var array
  */

     
protected $routeParams = [];


     
/**
      * Class constructor
      * 
      * @param array $routParams Paramters from the route
      * 
      * @return Void 
      */public function __construct($routeParams)
     {
          $this->routeParams = $routeParams;
     }

     /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods need to be named
     * with an "Action" suffix, e.g. indexAction, showAction etc.
     *
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
      public function __call($name, $args)
      {
          $method = $name ."Action";

          if(method_exists($this,$method)) {
               //run code before the method existiert
               if ($this->before() !== false) {
                    # use the call_user_func_array to exists the private method outside the class
                    call_user_func_array([$this,$method],$args);
                    $this->after();
               }
          }else {
               //echo "Method $method not found in controller " . get_class($this);
            throw new \Exception("Method $method not found in controller " .
            get_class($this));
          }
      }
      /**
       * Before filter- called before an action method.
       * 
       * @return  void
       */
      protected function before() 
      {

      }

      /**
       * After filter - called after an action method:
       * 
       * @return void
       */

       protected function after()
       {
          # code...
       }


}
?>