<?php
/*
 * Template for displaying single pages.
 * 
 * @package Profound
 */
?>
<?php get_header() ?>

        
              <?php if( have_posts() ) : while( have_posts() ): the_post() ?>

                    <div class="post-title">
                    <?php if ( is_front_page() ): ?>
                          <h1 class="front-page"><?php the_title() ?></h1>
                    <?php else: ?>
                          <h1 class="inner-page"><font color=#ffffff><?php the_title() ?></font></h1>
                    <?php endif; ?>
                    </div>

			<div id="content-section" class="content-section grid-col-16">
				<div id="post-<?php the_ID() ?>" <?php post_class('inner-content-section grid-float-left') ?>>

                    <div class="post-content">
                         <?php the_content() ?>





<?php if (is_page('profile')) { ?> <!-- BEGIN Pitch.Asia: Added to show different profile information for the Source Expert or the Journalist -->

<?php if( current_user_can('expert_source') ) {  ?> 
<?php echo do_shortcode('[wpuf_profile type="profile" id="71430"]'); ?>
<br /><br /><br />
<div align="center" class="button-white"><?php echo do_shortcode( '[plugin_delete_me]Delete My Account[/plugin_delete_me]' ); ?></div>

<?php } ?>


<?php if( current_user_can('journalistwriter') ) {  ?> 
<?php echo do_shortcode('[wpuf_profile type="profile" id="71406"]'); ?>
<br /><br /><br />
<div align="center" class="button-white"><?php echo do_shortcode( '[plugin_delete_me]Delete My Account[/plugin_delete_me]' ); ?></div>

<?php } ?>




<?php } ?>
<!--END LATEST COMMENTS-->





<!-- END Pitch.Asia: Added to show different profile information for the Source Expert or the Journalist -->







<?php if (is_page('dashboard')) { ?>



<!-- BEGIN This begins shows only to journalists for their personal list of media queries -->
<?php if( current_user_can('journalistwriter') ) {  ?> 
<?php echo do_shortcode('[wpuf_dashboard post_type="media_query"]'); ?>
<br />
<?php } ?><!-- END This ends shows only to journalists for their personal list of media queries -->


























<!-- BEGIN DASHBOARD NEWS -->
<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?> 


	<!-- <a href="https://www.pitch.asia/news/"><img src="https://www.pitch.asia/wp-content/uploads/newsupdates-banner.png" border="0" alt="News Updates"></a>-->


<?php
global $wpdb;
    
$journalistwriter = $wpdb->get_var( "SELECT count(meta_key) FROM wp_usermeta WHERE meta_key='wp_capabilities' and meta_value LIKE '%journalistwriter%'");

echo("$journalistwriter<br><br>");

$expert_source = $wpdb->get_var( "SELECT count(meta_key) FROM wp_usermeta WHERE meta_key='wp_capabilities' and meta_value LIKE '%expert_source%'");

echo("$expert_source<br><br>");


$latest_experts=0;
$myrows = $wpdb->get_results( "SELECT user_id FROM wp_usermeta WHERE meta_key='wp_capabilities' and meta_value LIKE '%expert_source%' ORDER BY umeta_id DESC  LIMIT 0 , 2" );
print_r($myrows);


if ( $myrows )
{
	foreach ( $myrows as $myrows_experts )
	{
		$latest_experts=$latest_experts+1;
		$experts_id[$latest_experts-1]=$myrows_experts->user_id;
		$experts_name[$latest_experts-1]="";
		$experts_name[$latest_experts-1] = $wpdb->get_var( "SELECT display_name FROM wp_users WHERE ID='".$experts_id[$latest_experts-1]."'");
	}	
}


$latest_journalists=0;
$myrows = $wpdb->get_results( "SELECT user_id FROM wp_usermeta WHERE meta_key='wp_capabilities' and meta_value LIKE '%journalistwriter%' ORDER BY umeta_id DESC  LIMIT 0 , 2" );
print_r($myrows);


if ( $myrows )
{
	foreach ( $myrows as $myrows_journalists )
	{
		$latest_journalists=$latest_journalists+1;
		$journalists_id[$latest_journalists-1]=$myrows_journalists->user_id;
		$journalists_name[$latest_journalists-1]="";
		$journalists_name[$latest_journalists-1] = $wpdb->get_var( "SELECT display_name FROM wp_users WHERE ID='".$journalists_id[$latest_journalists-1]."'");
	}	
}


$myrows = $wpdb->get_results( "SELECT ID FROM wp_users LIMIT 0 , 2" );
print_r($myrows);
?>


<?php //echo do_shortcode('[wmls name="newsmonitoring-layout-all" id="4"]'); ?>
<!-- <div align=right><a href="https://www.pitch.asia/news/">See More News &gt;&gt;</a></div> 








<hr>-->


<div class="row">
                    
					<!-- This begins shows only to expert sources for list of media queries -->
<?php if( current_user_can('expert_source') ) {  ?> 
<!-- <img src="https://www.pitch.asia/wp-content/uploads/mymediaqueries-banner.png" border="0">-->

<div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Media Query</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                   
                               
                                

<?php
//Define your custom post type name in the arguments
$args = array('post_type' => 'media_query','posts_per_page'=>'10','order'=>'DESC','orderby' => 'date','offset'=>'0');
//Define the loop based on arguments
$loop = new WP_Query( $args );
if( $loop->have_posts() ) :  
//Display the contents                        
                        ?>

		
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<!-- BEGIN IF WE HAVE MEDIA QUERIES THEN ADD MEDIA QUERIES HERE -->
				<div class="list-group-item">
					<span class="badge"><?php  if((get_post_meta( $post->ID, 'deadline', true ))) { ?>
	<font color=red><?php echo get_post_meta( $post->ID, 'deadline', true ); ?></font><?php } ?></span>
					<i class="fa fa-fw fa-check"></i> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><br>
					<i class="fa fa-fw fa-edit"></i> <?php the_excerpt(); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">More &gt;&gt;</a>
				</div>
			
<!-- END IF WE HAVE MEDIA QUERIES THEN ADD MEDIA QUERIES HERE -->


        <?php endwhile; ?>
    
    <?php else: ?>
<!-- START SHOW IF NO MEDIA QUERIES --><div class="wpuf-message" class="list-group-item"><div align="center"><img src="https://www.pitch.asia/wp-content/uploads/exclamation-octagon-icon.png" border="0"> <strong>No Media Queries From Journalists Match Your Profile</strong><br /><br /><img src="https://www.pitch.asia/wp-content/uploads/red-loading.gif" border="0" title="No Media Queries Found"><br /><br />Make sure your profile is complete so we can match you to journalists' media queries.<br /><br /><a href="https://www.pitch.asia/profile/" class="button-white">Update Profile</a></div></div>
<br /><!-- END SHOW IF NO MEDIA QUERIES -->
<?php endif; ?>
									 </div>
									<div class="text-right">
                                    <a href="#">See More Media Query <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


<?php } ?><!-- This ends shows only to expert sources for list of media queries -->

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> News</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php echo do_shortcode('[wmls name="newsmonitoring-layout-all" id="4"]'); ?>
                                </div>
                                <div class="text-right">
                                    <a href="https://www.pitch.asia/news/">See More News <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
				
<!-- END DASHBOARD NEWS -->

<!--BEGIN DASHBOARD JOBS
	<a href="https://www.pitch.asia/jobs/"><img src="https://www.pitch.asia/wp-content/uploads/latestjobs-banner.png" border="0" alt="Latest Jobs"></a>-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Jobs</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
				<?php echo do_shortcode('[jobs per_page="10" show_filters="false"]'); ?>
				</div>
				<div class="text-right">
					<a href="https://www.pitch.asia/jobs/">See More Jobs <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--END DASHBOARD JOBS -->

				

<script> // AUTO TRIGGER FOR 1st Load
jQuery(document).ready( function() {
	jQuery('.wmle_loadmore').hide(); 
	/*jQuery(".company_logo").width(50);
	jQuery(".company_logo").css("float","right");
	jQuery(".company_logo").css({'margin-left':'20px'});
	*/
});
	
	
</script>    


<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users fa-fw"></i> Total Users Widget</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th colspan="4">Network Statistics</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2"><center><?php echo get_avatar( get_current_user_id() ); ?></center></td>
								<td colspan="2"><center><?php echo get_avatar( get_current_user_id() ); ?></center></td>
							</tr>
						 
							<tr>
								<td colspan="2"><center><?php echo("$expert_source Experts"); ?></center></td>
								<td colspan="2"><center><?php echo("$journalistwriter Journalists"); ?></center></td>
							</tr>
							<tr>
								<td colspan="4"><b>Newest Member</b></td>
							</tr>
							<tr>
								<td rowspan="2"><?php if($latest_experts>=1){ echo get_avatar( $experts_id[0] ); } ?></td>
								<td><?php if($latest_experts>=1){ echo $experts_name[0]; } ?></td>
								<td rowspan="2"><?php if($latest_journalists>=1){ echo get_avatar( $journalists_id[0] ); } ?></td>
								<td><?php if($latest_journalists>=1){ echo $journalists_name[0]; } ?></td>
							</tr>
							<tr>
								<td>Expert</td>
								<td>Journalist</td>
							</tr>
							<tr>
								<td rowspan="2"><?php if($latest_experts>=2){ echo get_avatar( $experts_id[1] ); } ?></td>
								<td><?php if($latest_experts>=2){ echo $experts_name[1]; } ?></td>
								<td rowspan="2"><?php if($latest_journalists>=2){ echo get_avatar( $journalists_id[1] ); } ?></td>
								<td><?php if($latest_journalists>=2){ echo $journalists_name[1]; } ?></td>
							</tr>
							<tr>
								<td>Expert</td>
								<td>Journalist</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> News Update Chart</h3>
			</div>
			<div class="panel-body">
				<div id="morris-line-chart"></div>
			</div>
		</div>
	</div>
</div>

<?php } ?>


<?php } ?>






<?php if (is_page('news')) { ?>
<!-- BEGIN PAGE NEWS ENGLISH -->
<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?> 


	<img src="https://www.pitch.asia/wp-content/uploads/newsmonitoring-banner.png" border="0" alt="News Monitoring">


<?php echo do_shortcode('[wmls name="newsmonitoring-layout-english" id="2"]'); ?>

<hr>

<!-- END PAGE NEWS ENGLISH -->

<?php } ?><?php } ?>



<?php if (is_page('news-chinese')) { ?>
<!-- BEGIN PAGE NEWS CHINESE -->
<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?> 


	<img src="https://www.pitch.asia/wp-content/uploads/newsmonitoring-banner.png" border="0" alt="News Monitoring">


<?php echo do_shortcode('[wmls name="newsmonitoring-layout-chinese" id="3"]'); ?>

<hr>

<!-- END PAGE NEWS CHINESE -->

<?php } ?><?php } ?>
















                         <?php wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'profound') . '</span>', 'after' => '</div>')) ?>
                    </div>

                    <div class="post-below-content">
                         <?php edit_post_link( __( 'Edit', 'profound' ), '<div class="edit-link">', '</div>' ) ?>
                    </div>


              <?php endwhile ?>

              <?php// comments_template( '', true ) ?>

              <?php endif?>
        
    </div><!-- inner-content-section ends -->
	</div>
	<?php get_sidebar() ?>
	
</div><!-- Content-section ends here -->

<?php get_footer() ?>