<div class="wmle_item_holder <?php echo $shortcodeData['wmlo_columns'] ?>" style="display:none;">
    <div class="wmle_item">
        
		<?php if ($layoutSettings['show_featured_image'] == 'yes'): ?>
			<?php if ( has_post_thumbnail() ) :?>
                <?php // USE LIGHT BOX OR POST URL in Image
				$useLightBox  =  $shortcodeData['wmlo_use_lightbox'];
				$imageLink	  =  get_permalink(); 		 
				if ($useLightBox == 'yes'):
					$largeImageSrc  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '');
					$imageLink		= $largeImageSrc[0]; //Send image path
				endif;	
				// SET $imageLink for feature image a tag
				?>
                <div class="wpme_image">
                    <a href="<?php echo $imageLink; ?>"><?php the_post_thumbnail($shortcodeData['wmlo_image_size']); ?></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
		<?php if ($layoutSettings['show_post_meta'] == 'yes'): ?>
            <div class="wmle_post_meta">
               <a href="<?php comments_link(); ?>"><?php comments_number('0 Response', '1 Response', '% Responses' ); ?></a>
            </div>
        <?php endif; ?>
        
		<?php if ($layoutSettings['show_title'] == 'yes'): ?>
            <div class="wmle_post_title">
                <a href="<?php the_permalink(); ?>"><?php //the_title(); ?></a><br /><?php //the_time('Y-m-d g:i:s'); ?> (+8 GMT)<br /><?php the_author(); ?>
            </div>
        <?php endif; ?>
        
		<?php if ($layoutSettings['show_excerpt'] == 'yes'): ?>
            <div class="wmle_post_excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>
        
    </div><!-- EOF wmle_item_holder -->
</div><!-- EOF wmle_item_holder -->