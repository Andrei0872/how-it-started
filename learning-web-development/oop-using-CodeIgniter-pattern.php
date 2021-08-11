<?php

    /**
     * 
     * In this example, there is a piece of code that shed a light for me on how the CodeIgniter classes work depending on the Controller class
     * 
     * This code doesn't refer only  to CodeIgniter framework, but I can be a way of understanding how OOP works in PHP.
     * 
     * If you find any errors or improvements, please feel free to share!  
     *
     */


    // We first define some classes in order to help us understanding better 
    class Load {

        function say() {
            echo "Hello from load";
        }

    }

    class Uri {

        function say() {
            echo "Hello from URI";
        }

    }

    class Lang {

        function say() {
            echo "Hello from Lang";
        }

    }



    // Define the Controller class, following the CI pattern
    class Controller {

        private static $instance; 

        function __construct() {
            
            // Store the object and all its changes (in this example there will be no changes)
            self::$instance = & $this;
            
            // Almost the same as the CI original Controller class... 
            foreach(array('Load','Uri','Lang') as $class) {
                $this->$class =  new $class(); // Assign the class name and create in instance
            }
            
        }

        // A STATIC function that will return the object itself using the static property "$instance"
       static function &get() {
           
            return self::$instance;
        }

    } 

    // Need this in order to work further
    $obj = new Controller;

    // A global function that will help us to get the Controller object
    function &getInst() {
        
        // Return the object using the static method..
        return Controller::get();
   
    }


    // obj2 will act as a Controller instance
    $obj2 = &getInst();  
    $obj->Lang->say() . PHP_EOL; // Hello from Lang



   // Now, let's see how Model class and Controller classes communicate 
   class Model {


    // This magic function lets us get unavailable properties
    function __get($key) {

        // Load Controller
        $CI = &getInst();
        
        // Return the asked key (key is actually the class)
        return $CI->$key;
    }

   } 


   // Let's make it more as a practical exemple 
   class Pages extends Model {

    function allGood() {

        // $this->Load invokes the magic function __get() which is available here because this class extends the Model class
        $this->Load->say();
    }

   }

   // Create a new instance
   $page = new Pages();

   // See if this Works!!
   $page->allGood(); // Hello from Load
