<?php $mediaUrl = wmlp_layout_url(__FILE__); // Donot remove this ?>
<!--<div class="wmle_item_holder <?php //echo $shortcodeData['wmlo_columns'] ?>" style="display:none;">-->
    <!--<div class="wmle_item">-->
		<div class="list-group-item" style="width:100%;">
        <?php if ($layoutSettings['show_title'] == 'yes'): ?>
            <div class="wmle_post_title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <!--<a href="<?php// comments_link(); ?>" class="commentLink"><span class="icon-bubble icons"></span>&nbsp;<?php //comments_number('0', '1', '%' ); ?></a>-->
<br><?php the_time('Y-m-d g:i:s'); ?> (+8 GMT)
            </div>
        <?php endif; ?>
        
		<?php if ($layoutSettings['show_author'] == 'yes'): ?>
            <div class="wmle_post_meta">
               <div class="wmle_avatar">
			   		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></a>
					<div class="wmle_author_name" style="float:right;">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a> - &nbsp;
					<?php the_category(','); ?>
                    </div>
               </div>
               
               <div style="clear:both;"></div>
            </div>
        <?php endif; ?>
		</div>
    <!--</div> EOF wmle_item_holder -->
<!--</div> EOF wmle_item_holder -->


