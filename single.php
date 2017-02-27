<?php
/*
 * Template for displaying single posts.
 * 
 * @package Profound
 */
?>
<?php get_header() ?>

<?php if( current_user_can('expert_source') || current_user_can('journalistwriter') || current_user_can('administrator') ) {  ?>





        
              <?php if( have_posts() ) : while( have_posts() ): the_post() ?>

                    <div class="post-title">
						<?php if ( is_front_page() ): ?>
							<h1 class="front-page"><?php the_title() ?></h1>
						<?php else: ?>
							<h1><?php the_title() ?></h1>
						<?php endif ?>

						<?php// if(!profound_get_option('disable_post_meta')): ?>
						<div class="post-meta"><br /><strong>
							<?php 
							printf( __( '<span class="meta-date-url"></span> %1$s<span class="meta-author-url"> | %2$s </span>', 'profound' ),
								sprintf( '<span class="entry-date">%1$s</span>',
								get_the_date()
							),
							sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
								get_author_posts_url( get_the_author_meta( 'ID' ) ),
								esc_attr( sprintf( __( 'View all news from %s', 'profound' ), get_the_author() ) ),
								get_the_author()
							)) ?>
						</strong></div>
						<?php// endif ?>
					
                    </div>



		<div id="content-section" class="content-section grid-col-16">    
            <div id="post-<?php the_ID() ?>" <?php post_class('inner-content-section grid-float-left') ?>>

                    <div class="post-content">



<?php if (is_syndicated() and (get_the_author() !== get_syndication_source())):
 echo '<br />News Source Link: <a target="_blank" href="';  the_syndication_source_link(); echo '">';
 the_syndication_source();
  echo '</a><br /><br/>';
else: echo '<!-- NO SOURCE FOR SOME REASON WORKS FOR THIS.... -->';
 endif; ?>







                         <?php the_content() ?>




<br /><br /><?php if (is_syndicated() and (get_the_author() !== get_syndication_permalink())):
 echo '<strong> Original Source: <a target="_blank" href="';  the_syndication_permalink(); echo '">';
echo 'Click here to visit original news source';
  echo '</a></strong>';
 endif; ?>




                         <?php// wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'profound') . '</span>', 'after' => '</div>')) ?>
                    </div>

                    <div class="post-below-content">
                    	<?php edit_post_link( __( 'Edit', 'profound' ), '<div class="edit-link">', '</div>' ) ?>
                        <p class="tags-below-content"><?php the_tags( __( 'Tags: ', 'profound' ) , ' ', '') ?></p>
                    </div>

                    <?php// profound_post_nav() ?>

                    <?php// comments_template( '', true ) ?>

              <?php endwhile ?>

              <?php endif ?>

        
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