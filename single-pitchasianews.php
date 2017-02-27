<?php
/*
 * Template for displaying single posts.
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
						<?php endif ?>

						<?php// if(!profound_get_option('disable_post_meta')): ?>
						<div class="post-meta"><br /><strong>
							<?php 
							printf( __( '<span class="meta-author-url"><a href="https://www.pitch.asia/pitchasianews/" title="Back to Pitch.Asia News">&lt;&lt; Back to Pitch.Asia News</a></span> | <span class="meta-date-url"></span> %1$s', 'profound' ),
								sprintf( '<span class="entry-date">%1$s</span>',
								get_the_date()
							),
							sprintf( '',
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
 echo '<br />News Source: <a target="_blank" href="';  the_syndication_source_link(); echo '">';
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







<?php get_footer() ?>