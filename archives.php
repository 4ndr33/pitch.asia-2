<?php
/**
 * Template for displaying archives page.
 * 
 * @package Profound
 */
?>
<?php get_header() ?>

<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?>


<div id="content-section" class="content-section grid-col-16">
        
        <?php if (have_posts()) : ?>

            <div class="archive-meta-container">
                <div class="archive-head">
                    <h1><?php if (is_day()) : ?>
                            <?php printf(__('Daily Archives: %s', 'profound'), '<span>' . get_the_date() . '</span>'); ?>
                        <?php elseif (is_month()) : ?>
                            <?php printf(__('Monthly Archives: %s', 'profound'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'profound')) . '</span>'); ?>
                        <?php elseif (is_year()) : ?>
                            <?php printf(__('Yearly Archives: %s', 'profound'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'profound')) . '</span>'); ?>
                        <?php else : ?>
                            <?php _e('News Archives', 'profound'); ?>
                        <?php endif; ?></h1>
                </div>
                <div class="archive-description">
                    <?php printf(__('<p>Archive of news published in the specified %s </p>', 'profound'), profound_date_text()) ?>
                </div>
            </div><!-- Archive Meta Container ends -->
            
					<div class="inner-content-section grid-float-left">
              

<?php echo do_shortcode('[wmls name="searchresults-layout" id="5"]'); ?>

        
                    
                    <?php profound_archive_nav() // Calls the 'Previous' and 'Next' Post Links. ?>

        <?php else : ?>

            <?php profound_404_show() // Function dedicated for handling empty queries.  ?>

        <?php endif; ?>

    </div> <!-- inner-content-section ends here -->
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