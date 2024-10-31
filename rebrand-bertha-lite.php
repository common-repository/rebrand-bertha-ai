<?php
/**
 * Plugin Name: 	Rebrand Bertha.ai
 * Plugin URI: 	    https://rebrandpress.com/rebrand-berthaai/
 * Description: 	Bertha.ai is a next-generation AI content plugin for writing high-converting blog posts, landing pages, product pages, and more. Customize your Bertha.ai plugin with a choice of 25 robot icons, 7 preloader images, or the option to add your own of each. Further features include a name generator and enhanced branding capabilities (pro version).
 * Version:     	1.0
 * Author:      	RebrandPress
 * Author URI:  	https://rebrandpress.com/
 * License:     	GPL2 etc
 * Network:         Active
*/

if (!defined('ABSPATH')) { exit; }				

if ( !class_exists('Rebrand_BerthaAI_Pro') ) {
	
	class Rebrand_BerthaAI_Pro {
		
		public function bzrba_load()
		{
			global $bzrba_load;
			load_plugin_textdomain( 'bzrba', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 

			if ( !isset($bzrba_load) )
			{
			  require_once(__DIR__ . '/rba-settings.php');
			  $PluginRAP = new BZ_RBA\BZRebrandBerthaAISettings;
			  $PluginRAP->init();
			}
			return $bzrba_load;
		}
		
	}
}
$PluginRebrandBerthaAI = new Rebrand_BerthaAI_Pro;
$PluginRebrandBerthaAI->bzrba_load();
