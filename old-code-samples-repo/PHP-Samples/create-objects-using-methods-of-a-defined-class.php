<?php

 /**
     * Creating other objects using methods of a defined class
     * 
     * This example is inspired by CodeIgniter frameowork pattern
     * 
     * In this example, I will have one defined class which will have a few methods that will allows us to create
     * other objects from some classes that are included in an external file, just to make it more plausible and related to CodeIgniter
     * 
     * 
     * 
     */
     
     
     /*
      classes.php file : 
                  <?php


            class Test {


                function say() {
                    echo "hello from test!";
                }

            }


            class Andrei {
                
                function name() {
                    echo "hello from Andrei's class!";
                }   
            }
            
     */
     


    // Define the main class
    class MyClass {

    // $obj will hold the loaded classes
    private $obj; 

    function __construct()
    {
        //  Here we include the file, just to avoid any kind of errors
        include 'classes.php';
    }

    // Assign this function to a variable in order to create the object from the $class parameter
    function get($class) {

        // We call the function that, as its name says, will initialize the given class 
        return $this->initClass(ucfirst($class));

    }


    // This function will return the new instance!
    function initClass($class){

        // If it is not set already
        if(!isset($this->obj[0][strtolower($class)])) {
            
            // Assign the new instance
            $this->obj[0][strtolower($class)] = new $class();
        
        }

        return $this->obj[0][strtolower($class)];

    }

    }

    // Create a new instance of the defined class in order to load the other classes
    $myclass = new MyClass();


    // Get the new instance of the Test class
    $test = $myclass->get("test");
    $test->say(); # hello from test!

    echo PHP_EOL;

    // Get the new instance of the Andrei class
    $myself = $myclass->get("andrei");
    $myself->name(); # hello from Andrei's class!
    
    
    
