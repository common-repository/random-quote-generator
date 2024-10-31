<?php

/*
Plugin Name: Random Quote Generator
Plugin URI: 
description: A plugin to generate random qoutes to be shown to the user at home page.
Version: 1.1.0
Author: Moaz khan
Author URI: 
License: GPL2
*/

function qoute_shortcode() {

    $file = fopen(plugin_dir_url( __FILE__ ).'quotes.txt',"r");
  
    $content = array();

    while(! feof($file))
    {
        array_push($content, fgets($file));
    }

    fclose($file);

    $n = rand(1, count($content));

    $q = $content[$n-1];

    $quote = explode('--', $q);

    $string = '<h3>Quote of the Day</h3> <p>"'. $quote[0].'"</p> <p> <b>By: </b>'.$quote[1].'</p>';
  
    return $string;
}

add_shortcode('qoute', 'qoute_shortcode');
