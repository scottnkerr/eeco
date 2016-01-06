<?php


if ( !defined( 'ABSPATH' ) ) exit;


add_action('init', 'timeline_pro_register');
function timeline_pro_register() {
 
        $labels = array(
                'name' => _x('Timeline Pro', 'post type general name'),
                'singular_name' => _x('Timeline Pro', 'post type singular name'),
                'add_new' => _x('Add New Timeline Pro', 'Timeline Pro'),
                'add_new_item' => __('Add New Timeline Pro'),
                'edit_item' => __('Edit Timeline Pro'),
                'new_item' => __('New Timeline Pro'),
                'view_item' => __('View Timeline Pro'),
                'search_items' => __('Search Timeline Pro'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => TIMELINE_PRO_PLUGIN_PATH.'/css/tp-menu.png',
				

          );
 
        register_post_type( 'timeline_pro' , $args );

}




function meta_boxes_timeline_pro()
	{
		$screens = array( 'timeline_pro' );
		foreach ( $screens as $screen )
			{
				add_meta_box('timeline_pro_sectionid',__( 'Timeline Pro Options','timeline_pro' ),'meta_boxes_timeline_pro_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_timeline_pro' );




function meta_boxes_timeline_pro_input( $post ) {

	wp_nonce_field( 'meta_boxes_timeline_pro_input', 'meta_boxes_timeline_pro_input_nonce' );


	
	$timeline_pro_posttype = get_post_meta( $post->ID, 'timeline_pro_posttype', true );
	$timeline_pro_taxonomy = get_post_meta( $post->ID, 'timeline_pro_taxonomy', true );
	$timeline_pro_taxonomy_category = get_post_meta( $post->ID, 'timeline_pro_taxonomy_category', true );
	$timeline_pro_hide_thumb = get_post_meta( $post->ID, 'timeline_pro_hide_thumb', true );
	$timeline_pro_content = get_post_meta( $post->ID, 'timeline_pro_content', true );
	$timeline_pro_excrept_length = get_post_meta( $post->ID, 'timeline_pro_excrept_length', true );
	$timeline_pro_excrept_readmore = get_post_meta( $post->ID, 'timeline_pro_excrept_readmore', true );
	$timeline_pro_hide_share = get_post_meta( $post->ID, 'timeline_pro_hide_share', true );	
	$timeline_pro_hide_zoom = get_post_meta( $post->ID, 'timeline_pro_hide_zoom', true );
	$timeline_pro_hide_date = get_post_meta( $post->ID, 'timeline_pro_hide_date', true );
	$timeline_pro_hide_author = get_post_meta( $post->ID, 'timeline_pro_hide_author', true );	
	$timeline_pro_hide_category = get_post_meta( $post->ID, 'timeline_pro_hide_category', true );
	
	$timeline_pro_hide_comments = get_post_meta( $post->ID, 'timeline_pro_hide_comments', true );	
	$timeline_pro_maincolor = get_post_meta( $post->ID, 'timeline_pro_maincolor', true );
	$timeline_pro_bgcolor = get_post_meta( $post->ID, 'timeline_pro_bgcolor', true );
	$timeline_pro_loadmore_text = get_post_meta( $post->ID, 'timeline_pro_loadmore_text', true );	
	$timeline_pro_loading_text = get_post_meta( $post->ID, 'timeline_pro_loading_text', true );
	$timeline_pro_no_more_post_text = get_post_meta( $post->ID, 'timeline_pro_no_more_post_text', true );	
	
   ?>

<table class="form-table">

               
	<tr valign="top">
		<th scope="row"><label for="timeline_pro-maincolor">TimeLine Main Color</label></th>
		<td style="vertical-align:middle;">

<input type="text" name="timeline_pro_maincolor" id="timeline_pro-maincolor" value ="<?php  if ( isset($timeline_pro_maincolor) ) echo $timeline_pro_maincolor; ?>"  ><br />
               
                     
		</td>
	</tr>


<tr valign="top">
		<th scope="row"><label for="timeline_pro-bgcolor">TimeLine Area Background Color</label></th>
		<td style="vertical-align:middle;">

<input type="text" name="timeline_pro_bgcolor" id="timeline_pro-bgcolor" value ="<?php  if ( isset($timeline_pro_bgcolor) ) echo $timeline_pro_bgcolor; ?>"  ><br />
               
                     
		</td>
	</tr>


<tr valign="top">
		<th scope="row">Display These Post Type</th>
		<td style="vertical-align:middle;">
        
<?php

$post_types = get_post_types( '', 'names' ); 

foreach ( $post_types as $post_type ) {

	if($post_type=='post')
		{
		   echo '<label for="timeline_pro_posttype['.$post_type.']"><input class="timeline_pro_posttype" type="checkbox" name="timeline_pro_posttype['.$post_type.']" id="timeline_pro_posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $timeline_pro_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
	   
		}
	elseif($post_type=='page')
		{
		}

	else
		{
		   echo '<label for="timeline_pro-posttype['.$post_type.']"><input type="checkbox" name="timeline_pro_posttype['.$post_type.']" class="timeline_pro_posttype" id="timeline_pro-posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $timeline_pro_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
   
		}

}
?>
                           

		</td>
	</tr>




<tr valign="top">
		<th scope="row"></th>
		<td style="vertical-align:middle;">
 

        </td>
	</tr>









<tr valign="top">
		<th scope="row">Taxonomy <span class="timeline_pro_taxonomy_reset"  style="text-decoration:underline; cursor:pointer; color:#ff5d44;">(reset)</span></th>
		<td style="vertical-align:middle;">
        <table >
        	<tr style=" height:200px; overflow:scroll; vertical-align:top;">
            	<td style=" height:200px; overflow:scroll; vertical-align:top; padding:0;"> 
<?php 
$timeline_pro_taxonomies = get_taxonomies('','names'); 
foreach ($timeline_pro_taxonomies as $taxonomy ) {
	?>

	
  <label ><input type="radio" class="timeline_pro_taxonomy" name="timeline_pro_taxonomy" value="<?php echo $taxonomy; ?>" <?php if($timeline_pro_taxonomy==$taxonomy)  echo "checked";?> /><?php echo $taxonomy; ?></label><br />
  
  <?php
}
?>
                
                </td>
                <td style=" height:200px; overflow:scroll; vertical-align:top; padding:0; padding-left:20px;">
                <span class="timeline_pro_loading_taxonomy_category" ></span>
                <div class="timeline_pro_taxonomy_category">
                
				<?php
                if(!empty($timeline_pro_taxonomy))
					{
					timeline_pro_get_taxonomy_category($post->ID);
					}
				else
					{
					
					}
				
				?>
                
                
				</div>
     

                
                
                
                
                
                
                
                </td>
            </tr>
</table>

        </td>
	</tr>











<tr valign="top">
		<th scope="row">Display Thumbnails</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro-hide-thumb">
        <input type="checkbox" name="timeline_pro_hide_thumb" id="timeline_pro-hide-thumb"  value ="1" <?php if (  $timeline_pro_hide_thumb=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_thumb=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>


<tr valign="top">
		<th scope="row">Display Share Buttons</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_share">
        <input type="checkbox" name="timeline_pro_hide_share" id="timeline_pro_hide_share"  value ="1" <?php if (  $timeline_pro_hide_share=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_share=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>



<tr valign="top">
		<th scope="row">Display Zoom Button</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_zoom">
        <input type="checkbox" name="timeline_pro_hide_zoom" id="timeline_pro_hide_zoom"  value ="1" <?php if (  $timeline_pro_hide_zoom=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_zoom=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>




<tr valign="top">
		<th scope="row">Display Date</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_date">
        <input type="checkbox" name="timeline_pro_hide_date" id="timeline_pro_hide_date"  value ="1" <?php if (  $timeline_pro_hide_date=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_date=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>



<tr valign="top">
		<th scope="row">Display Author</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_author">
        <input type="checkbox" name="timeline_pro_hide_author" id="timeline_pro_hide_author"  value ="1" <?php if (  $timeline_pro_hide_author=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_author=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>






<tr valign="top">
		<th scope="row">Display Categories</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_category">
        <input type="checkbox" name="timeline_pro_hide_category" id="timeline_pro_hide_category"  value ="1" <?php if (  $timeline_pro_hide_category=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_category=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>













<tr valign="top">
		<th scope="row">Display Comments ?</th>
		<td style="vertical-align:middle;">
        <label for="timeline_pro_hide_comments">
        <input type="checkbox" name="timeline_pro_hide_comments" id="timeline_pro_hide_comments"  value ="1" <?php if (  $timeline_pro_hide_comments=="1") echo "checked"; ?> >
        
		<?php if (  $timeline_pro_hide_comments=="1") {echo "Hide";} else { echo "Display"; } ?>
        
        </label>
        </td>
	</tr>




<tr valign="top">
		<th scope="row">Display Content</th>
		<td style="vertical-align:middle;">
        <select name="timeline_pro_content" class="timeline_pro_content" >
        	<option value="content" <?php if (  $timeline_pro_content=="content") echo "selected"; ?> >Full Content</option>
            <option   value="excrept" <?php if (  $timeline_pro_content=="excrept") echo "selected"; ?> >Excerpt</option>       
        </select>
        <br />
        <br />
        
        <script>
		jQuery(document).ready(function(jQuery){
			jQuery(".timeline_pro_content").change(function()
					{
						var timeline_pro_content = jQuery('.timeline_pro_content').val();
						
						
						
						if(timeline_pro_content=="excrept")
							{
								jQuery("#timeline_pro-excrept").css("display","block");
								
							}
						else
							{
								jQuery("#timeline_pro-excrept").css("display","none");
								
							}
						
						
						})
	})
		</script>
        
        
   
        
<div id="timeline_pro-excrept"  <?php if (  $timeline_pro_content=="excrept") {echo "style='display:block;'";} else {echo "style='display:none;'";} ?> >
        <label for="timeline_pro_excrept_length" >
      	 Excrept Length:<br />
        
        <input type="text" name="timeline_pro_excrept_length" id="timeline_pro_excrept_length"  value ="<?php if (!empty($timeline_pro_excrept_length)) { echo $timeline_pro_excrept_length; } else {echo "50";} ?>"  >
        </label>
        <br /><br />
        <label for="timeline_pro_excrept_readmore" >
        Read More Text: <br />
        <input type="text" name="timeline_pro_excrept_readmore" id="timeline_pro_excrept_readmore"  value ="<?php if (!empty($timeline_pro_excrept_readmore)) { echo $timeline_pro_excrept_readmore; } else {echo "Read More...";} ?>"  >        
        </label>
        
        
</div>








        </td>
	</tr>









<tr valign="top">
		<th scope="row">Load More Text</th>
		<td style="vertical-align:middle;">
<input type="text" name="timeline_pro_loadmore_text" id="timeline_pro_loadmore_text"  value ="<?php if (!empty($timeline_pro_loadmore_text)) { echo $timeline_pro_loadmore_text; } else {echo "Load More...";} ?>"  >        

		</td>
</tr>



<tr valign="top">
		<th scope="row">Loading Text</th>
		<td style="vertical-align:middle;">
<input type="text" name="timeline_pro_loading_text" id="timeline_pro_loading_text"  value ="<?php if (!empty($timeline_pro_loading_text)) { echo $timeline_pro_loading_text; } else {echo "Loading...";} ?>"  >        

		</td>
</tr>

<tr valign="top">
		<th scope="row">No More Post Text</th>
		<td style="vertical-align:middle;">
<input type="text" name="timeline_pro_no_more_post_text" id="timeline_pro_no_more_post_text"  value ="<?php if (!empty($timeline_pro_no_more_post_text)) { echo $timeline_pro_no_more_post_text; } else {echo "No more post.";} ?>"  >        

		</td>
</tr>



<tr valign="top">
		<th scope="row">Shortcode</th>
		<td style="vertical-align:middle;">
        <textarea cols="50" rows="2" style="background:#bfefff" onClick="this.select();" >[timeline_pro <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="2" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[timeline_pro id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
 <br />
 <span style=" color:#22aa5d;font-size: 12px;">Copy this shortcode and paste on page or post where you want to display Timeline. <br />Use PHP code to your themes file to display Timeline</span>
		</td>
	</tr>
    



<tr valign="top">
		<th scope="row"><br />Need Help ?</th>
		<td style="vertical-align:middle;"><br />Please report any issue via our support forum <a href="http://kentothemes.com/questions-answers/">kentothemes.com &raquo; Q&A</a> or ask any question if you need. <br />
        Check Documentation  <a href="http://kentothemes.com/doc/timeline-pro/">http://kentothemes.com/doc/timeline-pro/</a><br />
        
        
                           

		</td>
	</tr>













 <script>
 jQuery(document).ready(function()
	{
 		jQuery("#timeline_pro-maincolor, #timeline_pro-bgcolor").wpColorPicker();
	})
 </script>



    
</table>








<?php

}

function meta_boxes_timeline_pro_save( $post_id ) {

  if ( ! isset( $_POST['meta_boxes_timeline_pro_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_timeline_pro_input_nonce'];

  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_timeline_pro_input' ) )
      return $post_id;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

	$timeline_pro_posttype = stripslashes_deep( $_POST['timeline_pro_posttype'] );
	$timeline_pro_taxonomy = sanitize_text_field( $_POST['timeline_pro_taxonomy'] );
	$timeline_pro_taxonomy_category = stripslashes_deep( $_POST['timeline_pro_taxonomy_category'] );	
	$timeline_pro_hide_thumb = sanitize_text_field( $_POST['timeline_pro_hide_thumb'] );			
	$timeline_pro_content = sanitize_text_field( $_POST['timeline_pro_content'] );
	$timeline_pro_excrept_length = sanitize_text_field( $_POST['timeline_pro_excrept_length'] );
	$timeline_pro_excrept_readmore = sanitize_text_field( $_POST['timeline_pro_excrept_readmore'] );	
	$timeline_pro_hide_share = sanitize_text_field( $_POST['timeline_pro_hide_share'] );
	$timeline_pro_hide_zoom = sanitize_text_field( $_POST['timeline_pro_hide_zoom'] );
	$timeline_pro_hide_date = sanitize_text_field( $_POST['timeline_pro_hide_date'] );	
	$timeline_pro_hide_author = sanitize_text_field( $_POST['timeline_pro_hide_author'] );	
	$timeline_pro_hide_category = sanitize_text_field( $_POST['timeline_pro_hide_category'] );	
	
	$timeline_pro_hide_comments = sanitize_text_field( $_POST['timeline_pro_hide_comments'] );	
	$timeline_pro_maincolor = sanitize_text_field( $_POST['timeline_pro_maincolor'] );
	$timeline_pro_bgcolor = sanitize_text_field( $_POST['timeline_pro_bgcolor'] );	
	$timeline_pro_loadmore_text = sanitize_text_field( $_POST['timeline_pro_loadmore_text'] );	
	$timeline_pro_loading_text = sanitize_text_field( $_POST['timeline_pro_loading_text'] );		
	$timeline_pro_no_more_post_text = sanitize_text_field( $_POST['timeline_pro_no_more_post_text'] );	
	

	update_post_meta( $post_id, 'timeline_pro_posttype', $timeline_pro_posttype );	
	update_post_meta( $post_id, 'timeline_pro_taxonomy', $timeline_pro_taxonomy );
	update_post_meta( $post_id, 'timeline_pro_taxonomy_category', $timeline_pro_taxonomy_category );	
	update_post_meta( $post_id, 'timeline_pro_hide_thumb', $timeline_pro_hide_thumb );	
	update_post_meta( $post_id, 'timeline_pro_content', $timeline_pro_content );		
	update_post_meta( $post_id, 'timeline_pro_excrept_length', $timeline_pro_excrept_length );
	update_post_meta( $post_id, 'timeline_pro_excrept_readmore', $timeline_pro_excrept_readmore );	
	update_post_meta( $post_id, 'timeline_pro_hide_share', $timeline_pro_hide_share );
	update_post_meta( $post_id, 'timeline_pro_hide_zoom', $timeline_pro_hide_zoom );
	update_post_meta( $post_id, 'timeline_pro_hide_date', $timeline_pro_hide_date );	
	update_post_meta( $post_id, 'timeline_pro_hide_author', $timeline_pro_hide_author );
	update_post_meta( $post_id, 'timeline_pro_hide_category', $timeline_pro_hide_category );	
	
		
		
	update_post_meta( $post_id, 'timeline_pro_hide_comments', $timeline_pro_hide_comments );		
	update_post_meta( $post_id, 'timeline_pro_maincolor', $timeline_pro_maincolor );
	update_post_meta( $post_id, 'timeline_pro_bgcolor', $timeline_pro_bgcolor );	
	update_post_meta( $post_id, 'timeline_pro_loadmore_text', $timeline_pro_loadmore_text );	
	update_post_meta( $post_id, 'timeline_pro_loading_text', $timeline_pro_loading_text );
	update_post_meta( $post_id, 'timeline_pro_no_more_post_text', $timeline_pro_no_more_post_text );	
	
		
  
}
add_action( 'save_post', 'meta_boxes_timeline_pro_save' );
