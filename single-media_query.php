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
							printf( __( '<span class="meta-date-url"></span>Posted Date: %1$s<span class="meta-author-url"> </span>', 'profound' ),
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


<strong>Media Query:</strong>
                         <?php the_content() ?>


<?php  if((get_post_meta( $post->ID, 'media_outlet', true ))) { ?>
<strong>Media Outlet: <font color=red><?php echo get_post_meta( $post->ID, 'media_outlet', true ); ?></font></strong><br><br>
<?php } ?>

<?php  if((get_post_meta( $post->ID, 'deadline', true ))) { ?>
<strong>Deadline: <font color=red><?php echo get_post_meta( $post->ID, 'deadline', true ); ?></font></strong><br><br>
<?php } ?>

<?php  if((get_post_meta( $post->ID, 'mail_alias', true ))) { ?>
<strong>Make a pitch: <a href="mailto:<?php echo get_post_meta( $post->ID, 'mail_alias', true ); ?>"><?php echo get_post_meta( $post->ID, 'mail_alias', true ); ?></a></strong><br><br>
<?php } ?>


<p style="clear:both"></p><br /><br />
<strong>What Do I Do Now?</strong><br><ol>
<li>If you think you can answer the Media Query, send the journalist an email using the secure, anonymous email address.</li>
<li>Make sure your email lists your expert credentials, and try to be brief.</li>
<li>If the journalist likes what you write, he or she may connect with you and use your comments in an article.</li>
</ol>





                         <?php// wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'profound') . '</span>', 'after' => '</div>')) ?>
                    </div>

                    <div class="post-below-content">
                    	<?php edit_post_link( __( 'Edit', 'profound' ), '<div class="edit-link">', '</div>' ) ?>
                        <p class="tags-below-content"><?php the_tags( __( 'Tags: ', 'profound' ) , ' ', '') ?></p>
                    </div>


              
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
<h1><?php the_title() ?></h1>
 </div>
     <div id="content-section" class="content-section grid-col-16">    
            <div id="post-<?php the_ID() ?>" <?php post_class('inner-content-section grid-float-left') ?>>

                    <div class="post-content">




<div align=center>
<h2><font color=red>Please Login To View Full Media Query.</font></h2>
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