<?php
/**
 * Template for displaying archive page.
 * 
 * @package Profound
 */
?>
<?php get_header() ?>



<div id="content-section" class="content-section grid-col-16">
        
        <?php if (have_posts()) : ?>

           <br /><div class="post-title">
	<h1 class="inner-page"><font color=#ffffff>Pitch.Asia Updates</font></h1>
<br /><br />

                </div>

            </div><!-- Archive Meta Container ends -->
            
		<div class="inner-content-section grid-float-left">
            <div class="loop-container-section grid-float-left clearfix">

                <?php
                    // Here starts the loop
                    while (have_posts()): the_post();
                        get_template_part('loop', 'archive');
                    endwhile;
                ?>                
                
            </div><!-- loop-container-section ends -->

            <?php profound_archive_nav() // Calls the 'Previous' and 'Next' Post Links.  ?>

        <?php else : ?>

            <?php profound_404_show() // Function dedicated for handling empty queries.  ?>

        <?php endif; ?>

    </div> <!-- inner-content-section ends here -->
	<?php get_sidebar() ?>
</div><!-- Content-section ends here -->



<?php get_footer() ?>