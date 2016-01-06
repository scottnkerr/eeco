<?php

if ( !defined( 'ABSPATH' ) ) exit;







	if(empty($_POST['timeline_pro_hidden']))
		{
			$timeline_pro_delete = get_option( 'timeline_pro_delete' );					
					
		}

	else
		{
		
		if($_POST['timeline_pro_hidden'] == 'Y')
			{
			//Form data sent
			
			
			$timeline_pro_delete = $_POST['timeline_pro_delete'];
			update_option('timeline_pro_delete', $timeline_pro_delete);	
			
			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p>
            </div>
            
            
            
            
<?php
			}
		} 
?>


<div class="wrap">
<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="timeline_pro_hidden" value="Y">
        <?php settings_fields( 'timeline_pro_plugin_options' );
				do_settings_sections( 'timeline_pro_plugin_options' );
		?>

<div class="wp-settings-pro">
    <div class="heading"><h2>Timeline Pro Settings</h2></div>
    
    <div class="settings-saved">

    </div>
    
    <div class="setting-descriptions"><p></p></div>






<div class="option-area">
    <div class="option-title"><strong>Delete data when uninstall ?</strong>
    
    </div>
    <div class="option-descriptions" style="color:#f00;">All data and settings for timeline will be deleted when uninstall or delete plugin.
    </div>
    
    <div class="option-input">
        <select name="timeline_pro_delete">
        	<option value="no" <?php  if($timeline_pro_delete=='no') echo "selected"; ?>>No</option>
        	<option value="yes" <?php  if($timeline_pro_delete=='yes') echo "selected"; ?>>Yes</option>
        </select> 
    </div>

</div>





















    <div class="option-area">
    <div class="option-title"><strong>Need Help ?</strong>
    
    </div>
    <div class="option-descriptions">Feel free to share your problem and issue you found with this plugin and share any idea via support forum.
    </div>
    
    <div class="option-input">
    
		<p>
Please report any issue via our support forum <a href="http://kentothemes.com/questions-answers/">kentothemes.com &raquo; Q&A</a> ask any question. <br />
Checkout Our Latest Plugin <a href="http://kentothemes.com/">http://kentothemes.com</a>
<br /><br />
Check documentation for this plugin:<br /><a href="http://kentothemes.com/doc/timeline-pro/" >http://kentothemes.com/doc/timeline-pro/</a> 
    </p>
    
    </div>

</div>



    <div class="option-area">
    <div class="option-title"><strong>Do you like this plugin ?</strong>
    
    </div>
    <div class="option-descriptions">If you like this plugin please share our plugin link with our friends.
    </div>
    
    <div class="option-input">
<table>
<tr>
<td width="100px"> 
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-href="http://kentothemes.com/items/social/timeline-pro-responsive-timeline-for-wordpress/"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fkentothemes.com%2Fitems%2Fsocial%2Ftimeline-pro-responsive-timeline-for-wordpress%2F&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://kentothemes.com/items/social/timeline-pro-responsive-timeline-for-wordpress/" data-text="Timeline Pro – Responsive Timeline for WordPres">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
<hr />
      
    
    </div>

</div>

    


                <p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>

</div>



		</form>








<style type="text/css">
.wp-settings-pro {
  background: none repeat scroll 0 0 #FFFFFF;
  margin-bottom: 20px;
  padding-bottom: 20px;
  width: 100%;
}

.wp-settings-pro .heading {
  border-bottom: 2px solid #666666;
}




.wp-settings-pro .heading h2 {
  color: #333333;
  font-size: 20px;
  font-weight: bold;
  padding-left: 20px;
}

.wp-settings-pro .heading .updated {
  margin-left: 20px;
}


.wp-settings-pro .submit {
	margin-left: 20px;
}
.wp-settings-pro .setting-descriptions{

}

.wp-settings-pro .setting-descriptions p {
  border-bottom: 1px solid;
  color: #999999;
  font-size: 13px;
  margin-bottom: 15px;
  margin-left: 20px;
  margin-top: 15px;
  padding-bottom: 5px;
}

.wp-settings-pro .option-area {
  margin: 30px 0;
}


.wp-settings-pro .option-area .option-title {
  font-size: 15px;
  margin: 10px 0;
  padding-left: 20px;
}

.wp-settings-pro .option-area .option-descriptions {
  font-size: 13px;
  padding-left: 20px;
}

.wp-settings-pro .option-area .option-input {
  border-bottom: 1px solid #DDDDDD;
  margin-left: 20px;
  padding: 20px 0;
}

</style>







</div>