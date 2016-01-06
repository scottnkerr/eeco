<?php

/****************************************************************/

// GOOGLE ANALYTICS PREFERENCES (14.6.04.1)

/****************************************************************/

/** Register GA Setting */
add_action('admin_init', function() { $add_field = new ticr_ga_acct_number_setting; $success = $add_field->add_ga_acct(); });

class ticr_ga_acct_number_setting
{
	public function add_ga_acct()
	{
		register_setting('general', 'ga_acct_number');
		register_setting('general', 'ga_no_track_cap');
		add_settings_field('ga_acct_number', 'Google Analytics Acct', array($this,'ticr_ga_acct_number_field'), 'general', 'default');
		add_settings_field('ga_no_track_cap', 'GA Ignore Capability', array($this,'ticr_ga_no_track_field'), 'general', 'default');
	}
	
	public function ticr_ga_acct_number_field()
	{
		echo '
		<input name="ga_acct_number" type="text" id="ga_acct_number" value="'.get_option('ga_acct_number').'" class="regular-text" />
		';	
	}
	
	public function ticr_ga_no_track_field()
	{
		echo '
		<input name="ga_no_track_cap" type="text" id="ga_no_track_cap" value="'.get_option('ga_no_track_cap').'" class="regular-text" />
		';	
	}
}

/** Add Google Analytics Tracking */
add_action('wp_head', 'add_ga_tracking'); 
function add_ga_tracking()
{
	$ga_acct_number = get_option('ga_acct_number');
	$ga_no_track_cap = get_option('ga_no_track_cap');
	if ($ga_acct_number && (!$ga_no_track_cap || ($ga_no_track_cap && !current_user_can($ga_no_track_cap))))
	{
		echo "
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
";
	preg_match('@^(?:http://)?([^/]+)@i', home_url(), $host);
	preg_match('/[^.]+\.[^.]+$/', $host[1], $domain);
	echo "
	ga('create', '".$ga_acct_number."', '".$domain[0]."');
  ga('send', 'pageview');

</script>
		";
	}
	
}

?>