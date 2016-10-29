<?php
/**
* Plugin Name: SendX
* Description: Basic WordPress Plugin for Customisation
* Version:     1.0
* Author:      SendX
* Author URI:  https://himanshu4746.github.io/
* License:     GPL2
*/
$name="";

/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'SendX', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	global $ACCID;
	?>
	<div>
		<h1> sendx Settings </h1>
		<a href="#" target="_blank">Take a Tour</a>
		<a href="#" target="_blank">Support</a>
		<div id="confirm"></div>
		<div>
			<h2>Account ID<h2>
			<input type="text" id="acid" value=""><br>
			<button onclick="myFunction();">Save Changes</button>

			<div id="demo"></div>

			<script>
				function myFunction(){
					var text = document.getElementById("acid").value;
					document.getElementById("demo").innerHTML = text;
					if(text){
						document.getElementById("confirm").innerHTML = "Settings Saved";
					}
				}
			</script>
		</div>
		
	</div>	
	<?php
}
//alert

function fxn_load_custom_script(){
	$ACCID="A140";
	//wp_register_style('custom_plugin_css',plugin_dir_url(__FILE__).ACCID.'/main.css',false,'0.1');
	//wp_enqueue_style('custom_plugin_css');
	wp_enqueue_script('custom_plugin_js',plugin_dir_url(__FILE__).$ACCID.'/script.js');
}
//add_action( 'admin_enqueue_scripts', 'fxn_load_custom_script');
add_action( 'wp_enqueue_scripts', 'fxn_load_custom_script');
?>