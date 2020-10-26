<?php

/**
* Plugin Name: Custom Plugin	
* Plugin URI:
* Description:
* Version: 1.0
* Author: AmmielB
* Author URI:
*@package customPlugin 
**/

require "shortcode/ShortCodeinit.php";
require "AdminMenuInit.php";

defined('ABSPATH') or die('OI! STOP! You violated teh law. Pay the court a fine or server your sentence! Your stoeln goods are now forfeit');
class CPInit
{
	public function __contruct(){
		add_action( "init",array($this, 'SCinit'));

	}   
}



if(!class_exists('CPInit')){
	$CPinit = new CPInit();
	$Adminmenu = new AdminMenu();
}

// init de shortcodes
SCinit();






