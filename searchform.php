<?php
/*
 * Template for displaying Search Form.
 * 
 * @package Profound
 
 <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="search-box clearfix">
        <input type="text" value="" name="s" id="s" placeholder="<?php _e('Search...', 'profound') ?>" />
        <input type="submit" id="searchsubmit" value="<?php _e('Go', 'profound') ?>" />
    </div>
</form>

<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
 */
?>



<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control"  value="" name="s" id="s" placeholder="Search News...">
                                <span class="input-group-btn">
                                <input type="submit" id="searchsubmit" class="btn btn-default" value="<?php _e('Go', 'profound') ?>" />
                                
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
