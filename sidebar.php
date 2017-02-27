<?php
/*
 * Footer box (sidebar) section of Profound theme
 * 
 * @package Profound
 */
?>

<div id="sidebar-right-section" class="sidebar-right-section grid-float-left">


<?php //This code will display the skyscraper banner only to LOGGED OUT users
if ( is_user_logged_in() ) {
    
    if ( !dynamic_sidebar( 'right_sidebar' ) ){ ?>
		<!--
        <div class="widget widget_recent_entries">
            <h4 class="widget-title"><?php //_e( 'Recent Posts', 'profound' ); ?></h4>
            <ul><?php //wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'html' ) ); ?></ul>
        </div>
        
        <div class="widget widget_search">
            <h4 class="widget-title"><?php //_e( 'Search', 'profound' ); ?></h4>
            <?php //get_search_form(); ?>
        </div>  -->

    <?php } 
    
} else { ?>
<!-- <div align="center">
<img src="https://www.pitch.asia/wp-content/uploads/truly-asian-media.png" title="Asia Media" alt="Asia Media">
</div> -->
   <?php
};
?>


    
    
</div>