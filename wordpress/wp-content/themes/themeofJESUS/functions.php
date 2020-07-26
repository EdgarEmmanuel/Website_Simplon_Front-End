<?php 



    function load_style(){

        // for bootstrap
        wp_register_style( 'stylesheet' , get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css' ,array()
         , false , 'all');
        wp_enqueue_style( 'stylesheet' );


        //for font-awesome
        wp_register_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',array()
        ,false , 'all');
        wp_enqueue_style( 'fontawesome' );
    
    
        // for my own style
        wp_register_style('style',get_template_directory_uri() ."/style.css" , array() , false , 'all');
        wp_enqueue_style( 'style' );
    }

    function load_js(){

        // //jquery js
        // wp_register_script('jquery', get_template_directory_uri().'/lib/bootstrap/js/jquery.js', array(),'',3,true );
        // wp_enqueue_scripts('jquery');


        //my custom js
        wp_register_script( 'customjs', get_template_directory_uri()."/script.js", array(), '' , 1 ,true );
        wp_enqueue_script('customjs');
    }



add_action('wp_enqueue_scripts', 'load_style' );
add_action('wp_enqueue_scripts','load_js');





?>