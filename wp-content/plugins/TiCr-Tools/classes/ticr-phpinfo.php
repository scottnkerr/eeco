<?php

/****************************************************************/

// PHP INFO ADMIN REPORT (14.5.28.2)

/****************************************************************/

add_action('init', 'ticr_tools_phpinfo');
function ticr_tools_phpinfo() {
	
	// Add the user ids of the users who should see this to the phpinfo_users array ex. $phpinfo_users = array(1,15,27);
	// Since we aren't using the built in capabilities system, we are able to keep this completely "off book"
	$phpinfo_users = array(0);
	
	if (in_array(get_current_user_id(), $phpinfo_users) || current_user_can('administrator')) {
		$ticr_phpinfo_report = new ticr_phpinfo_report;
		add_action('admin_menu', array($ticr_phpinfo_report, 'add_report'));
	};
}

class ticr_phpinfo_report
{
	public function add_report()
	{
		$user = wp_get_current_user();
		add_dashboard_page('TiCr PHP INFO', 'TiCr PHP INFO', 'update_core', 'ticr-phpinfo-report', array($this, 'optionPage'));
	}
	
	public function optionPage()
	{
		echo '<div class="wrap"><h2>TiCr PHP INFO - UserID: '.get_current_user_id().'</h2><hr />';
		
		ob_start();
		phpinfo();
		$pinfo = ob_get_contents();
		ob_end_clean();
		
		$style = '
			<style type="text/css">
				#phpinfo body {background-color: #ffffff; color: #000000;}
				#phpinfo body, #phpinfo #phpinfo td, #phpinfo th, #phpinfo h1, #phpinfo h2 {font-family: sans-serif;}
				#phpinfo pre {margin: 0px; font-family: monospace;}
				#phpinfo a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
				#phpinfo a:hover {text-decoration: underline;}
				#phpinfo table {border-collapse: collapse; width:80%; min-width:600px;}
				#phpinfo .center {text-align: center; overflow:hidden;}
				#phpinfo .center table { margin-left: auto; margin-right: auto; text-align: left;}
				#phpinfo .center th { text-align: center !important; }
				#phpinfo td, #phpinfo th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
				#phpinfo h1 {font-size: 150%;}
				#phpinfo h2 {font-size: 125%;}
				#phpinfo .p {text-align: left;}
				#phpinfo .e {background-color: #ccccff; font-weight: bold; color: #000000;}
				#phpinfo .h {background-color: #9999cc; font-weight: bold; color: #000000;}
				#phpinfo .v {background-color: #cccccc; color: #000000;
					white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
					white-space: -pre-wrap;      /* Opera 4-6 */
					white-space: -o-pre-wrap;    /* Opera 7 */
					white-space: pre-wrap;       /* css-3 */
					word-wrap: break-word;       /* Internet Explorer 5.5+ */
					word-break: break-all;
					white-space: normal;
				}
				#phpinfo .vr {background-color: #cccccc; text-align: right; color: #000000;}
				#phpinfo img {float: right; border: 0px;}
				#phpinfo hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
				
				@media only screen and (max-width:600px)
				{
					#phpinfo { width:100%; }
					#phpinfo table { margin:auto; width:100%; min-width:300px; }
					#phpinfo th { inline-block; width:auto; }
					#phpinfo tr, #phpinfo .h { display:block; }
					#phpinfo .e, #phpinfo .v { display:block; }
				}
			</style>';
		 
		$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
		echo $style.'<div id="phpinfo">'.$pinfo.'</div>';
 		echo '<p style="font-size:.8em; text-align:right; margin-right:25px;">Responsive WordPress adaptation by Titanium Creative, Inc. (TiCr)</p>';
		echo '</div>';
	}
}
?>