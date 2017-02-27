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


<!-- This begins shows only to expert sources for list of media queries -->
<?php if( current_user_can('expert_source') ) {  ?> 
<img src="https://www.pitch.asia/wp-content/uploads/mymediaqueries-banner.png" border="0">

<?php
//Define your custom post type name in the arguments
$args = array('post_type' => 'media_query','posts_per_page'=>'5','order'=>'DESC','orderby' => 'date','offset'=>'0');
//Define the loop based on arguments
$loop = new WP_Query( $args );
if( $loop->have_posts() ) :  
//Display the contents                        
                        ?>

    <div class="rg-container">
	<!--<div class="rg-header">
		<div class="rg-hed">Latest Media Queries</div>
		<div class="rg-subhed">Are you an expert in any of the topics below?</div>
	</div>-->
	<div class="rg-content">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th class="text rg-th">Subject</th>
				<th class="text rg-th">Details</th>
				<th class="text rg-th">Deadline</th>
			</thead>
			<tbody>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<!-- BEGIN IF WE HAVE MEDIA QUERIES THEN ADD MEDIA QUERIES HERE -->

				<tr>
						<td class="text subject" data-title="Subject"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></td>
						<td class="text details" data-title="Details"><?php the_excerpt(); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">More &gt;&gt;</a></td>
						<td class="text" data-title="Deadline"><?php  if((get_post_meta( $post->ID, 'deadline', true ))) { ?>
<font color=red><?php echo get_post_meta( $post->ID, 'deadline', true ); ?></font><?php } ?></td>
				</tr>
			
<!-- END IF WE HAVE MEDIA QUERIES THEN ADD MEDIA QUERIES HERE -->


        <?php endwhile; ?>
    
    </tbody>
		</table>
	</div>
</div>
    
    <?php else: ?>
<!-- START SHOW IF NO MEDIA QUERIES --><div class="wpuf-message"><div align="center"><img src="https://www.pitch.asia/wp-content/uploads/exclamation-octagon-icon.png" border="0"> <strong>No Media Queries From Journalists Match Your Profile</strong><br /><br /><img src="https://www.pitch.asia/wp-content/uploads/red-loading.gif" border="0" title="No Media Queries Found"><br /><br />Make sure your profile is complete so we can match you to journalists' media queries.<br /><br /><a href="https://www.pitch.asia/profile/" class="button-white">Update Profile</a></div></div>
<br /><!-- END SHOW IF NO MEDIA QUERIES -->
<?php endif; ?>



<?php } ?><!-- This ends shows only to expert sources for list of media queries -->























<!-- BEGIN DASHBOARD NEWS -->
<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?> 


	<a href="https://www.pitch.asia/news/"><img src="https://www.pitch.asia/wp-content/uploads/newsupdates-banner.png" border="0" alt="News Updates"></a>





<?php echo do_shortcode('[wmls name="newsmonitoring-layout-all" id="4"]'); ?>
<div align=right><a href="https://www.pitch.asia/news/">See More News &gt;&gt;</a></div>






<hr>

<!-- END DASHBOARD NEWS -->

<!--BEGIN DASHBOARD JOBS-->
	<a href="https://www.pitch.asia/jobs/"><img src="https://www.pitch.asia/wp-content/uploads/latestjobs-banner.png" border="0" alt="Latest Jobs"></a>
<?php echo do_shortcode('[jobs per_page="3" show_filters="false"]'); ?>
<!--END DASHBOARD JOBS -->
<a href="https://www.pitch.asia/jobs/">See More Jobs &gt;&gt;</a>

<?php } ?><?php } ?>






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