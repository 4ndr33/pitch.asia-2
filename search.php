<?php
/*
 * Template for displaying search queries.
 * 
 * @package Profound
 */
?>
<?php get_header() ?>

<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?>

<div id="content-section" class="content-section grid-col-16">
        
              <?php if( have_posts() ) : ?>

                    <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php _e( 'Search Results', 'profound' ) ?></h1>
                         </div>
                        <div class="archive-description">
                            <?php printf(__('</strong>We found following info based on your search query:<font color=red> %s.</strong>', 'profound'), get_search_query()) ?>
                        </div>
                         
                    </div><!-- Archive Meta Container ends -->

				<div class="inner-content-section grid-float-left">
              

<?php echo do_shortcode('[wmls name="searchresults-layout" id="5"]'); ?>

        
                    
                    <?php profound_archive_nav() // Calls the 'Previous' and 'Next' Post Links. ?>

              <?php else : ?>

 <div class="archive-meta-container">
                         <div class="archive-head">
                              <h1><?php _e( 'Nothing Found!', 'profound' ) ?></h1>
                         </div>
                        <div class="archive-description">
                            <?php printf(__('<strong>We found nothing for your search query:<font color=red> %s.</font></strong>', 'profound'), get_search_query()) ?>
<br /><br />Please try your search again.
                        </div>
                         
                    </div>

<br />
<div style="clear:both;"></div>

              <?php endif;?>

                    
    </div><!-- inner-content-section ends -->
	
	<?php get_sidebar() ?>
	
</div><!-- Content-section ends here -->


<?php } ?>

<?php //START This code will stop non-loggedin users from seeing this page
if ( is_user_logged_in() ) {
} else { ?>
 <div class="post-title">
<h1 class="inner-page" style="color:#FFFF00;">Please Login</h1>
 </div>
     <div id="content-section" class="content-section grid-col-16">    
            <div id="post-<?php the_ID() ?>" <?php post_class('inner-content-section grid-float-left') ?>>

                    <div class="post-content">
<div align=center>
<h2>This area is for logged in users only.</h2>
<br /><br />
<a href="https://www.pitch.asia/login/" title="Login Please"><img src="https://www.pitch.asia/wp-content/uploads/loginplease-icon.jpg" alt="Please Login" border="0"></a>
<br />


<a href="https://www.pitch.asia/login/"><strong>LOGIN</strong></a><br /><br />

<h3>Or Register:</h3>
<a href="https://www.pitch.asia/register-expertsource/"><strong>I'm an Expert</strong></a> |
<a href="https://www.pitch.asia/register-journalist/"><strong>I'm a Journalist</strong></a>


            </div></div></div>
        </div>
   <?php
};
?>



<?php get_footer() ?>