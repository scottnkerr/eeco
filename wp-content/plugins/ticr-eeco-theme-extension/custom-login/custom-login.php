<?php 

// Titanium Creative Custom Login Class
$ticr_custom_login = new ticr_custom_login;

class ticr_custom_login
{
	
	function __construct()
	{
		add_filter( 'login_headerurl', array($this, 'my_login_logo_url'));
		add_filter( 'login_headertitle', array($this, 'my_login_logo_url_title'));
		add_filter( 'login_redirect', array($this,'my_login_redirect'),10,3);
		add_filter( 'login_message', array($this, 'ticr_login_message'));
		
		add_action( 'login_enqueue_scripts', array($this, 'my_login_stylesheet'));
		add_action( 'login_enqueue_scripts', array($this, 'my_login_styles'));
	}
	
	function my_login_redirect( $redirect_to, $query, $user ) 
	{ 
		if($redirect_to) { return $redirect_to; }
		else { return get_bloginfo( 'url' ); }
	}
	
	function ticr_login_message ($message)
	{
		// in any case
		if(!$message) { $message = '<p class="custom-logout-message">EECO Website Login</p>'; }
		
		//check to see if it's the logout screen
		if ( isset($_GET['loggedout']) && TRUE == $_GET['loggedout'] ) 
		{ $message = '<p class="custom-logout-message">Thanks for stopping by. Hope to see you again soon.</p><br />'; }

    return $message;
	}
	
	function my_login_logo_url() { return get_bloginfo( 'url' ); }
	
	function my_login_logo_url_title() { return get_bloginfo( 'name' ); }
	
	// Custom Stylesheet
	function my_login_stylesheet() {
		$output = '<link rel="stylesheet" id="custom_wp_login_css"  href="'.plugins_url( '/style-login.css', __FILE__).'" type="text/css" media="all" />';
		echo $output;
	}
	
	// CUSTOM LOGIN LOGO
	function my_login_styles() {
	$output = '
		<style type="text/css"> 
			html { background-image:url('.plugins_url( 'img/ECCO-block-background.jpg', __FILE__).'); }
			body.login div#login h1 a { background-image: url('.plugins_url( 'img/EECO-logo.png', __FILE__).');  }
		</style>
	';
		echo $output;
	}

}
?>