<?php
/**
 * Profound Theme functions and definitions
 * 
 * @package Profound
 * @since 1.0
 */



/**
 * Constant to check whether Profound Premium Active or not.
 * 
 * Returns True only when Premium theme is active.
 * 
 * @since 1.0
 */
define('PROFOUND_PRO', FALSE );



/**
 * Contant for URL: [themeroot]/assets/global/
 * 
 * @since 1.0.8.1
 */
define('PROFOUND_GLOBAL_URL', get_template_directory_uri() . '/assets/global/');



/**
 * Constant for Directory: [themeroot]/includes/
 * 
 * @since 1.0.0
 * 
 */
define('PROFOUND_INCLUDES_DIR' , get_template_directory() . '/includes/' );



/**
 * Customizer call
 */
require_once PROFOUND_INCLUDES_DIR . 'customizer.php';



if( ! function_exists( 'profound_setup' ) ):
/**
 * Sets up theme defaults and registers support for various theme features
 * 
 * @since 1.0
 */
function profound_setup() {
    
    global $content_width;
    
    /**
     * Primary content width according to the design and stylesheet.
     */
    if ( ! isset( $content_width ) ) { $content_width = 890; }
    
    /**
     * Makes profound Theme ready for translation.
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain('profound', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Add custom background.
     * @todo Put E7E7E7 in a variable and then change it according to the skin
     */
    add_theme_support('custom-background', array('default-color' => 'E7E7E7'));
    
    /**
     * Automatically adds title tag
     */
    add_theme_support( "title-tag" );
    
    /**
     * Adds supports for Theme menu.
     * Profound uses wp_nav_menu() in a single location to diaplay one single menu.
     */
    register_nav_menu('primary', __('Primary Menu','profound'));

    /**
     * Add support for Post Thumbnails.
     * Defines a custom name and size for Thumbnails to be used in the theme.
     *
     * Note: In order to use the default theme thumbnail, add_image_size() must be removed
     * and 'profoundThumb' value must be removed from the_post_thumbnail in the loop file.
     */
    add_theme_support('post-thumbnails');
    add_image_size('profoundThumb', 190, 130, true);
}
endif;
add_action( 'after_setup_theme', 'profound_setup' );


/**
 * Register sidebars one at right and three footer sidebars in a box.
 * 
 * @since 1.0
 */
function profound_sidebars() {

    // Footerbox Sidebar #1
    register_sidebar(array(
        'name' => __('Right Sidebar', 'profound'),
        'id' => 'right_sidebar',
        'description' => __('Right Sidebar', 'profound'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #1
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #1', 'profound'),
        'id' => 'footerbox_sidebar_1',
        'description' => __('Footerbox Sidebar #1', 'profound'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #2
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #2', 'profound'),
        'id' => 'footerbox_sidebar_2',
        'description' => __('Footerbox Sidebar #2', 'profound'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #3
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #3', 'profound'),
        'id' => 'footerbox_sidebar_3',
        'description' => __('Footerbox Sidebar #3', 'profound'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
}
add_action( 'widgets_init', 'profound_sidebars' );

function profound_date_text() {
    if (is_date()):
        if (is_day()):
            $date_text = __('Day', 'profound');
        elseif (is_month()):
            $date_text = __('Month', 'profound');
        elseif (is_year()):
            $date_text = __('Year', 'profound');
        else:
            $date_text = __('Period', 'profound');
        endif;

        return $date_text;

    endif;
}


/**
 * Returns Theme Fonts based on $method
 * 
 * @param string $method 'enqueue'|'customizer'
 * @internal 'enqueue' for enqueueing fonts | 'customizer' for customizer options
 * @return array
 */
function profound_get_fonts($method){
    $fonts = unserialize('a:12:{i:0;a:6:{s:4:"name";s:34:"Arial, Helvetica, "Helvetica Neue"";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:5:"arial";s:11:"displayname";s:5:"Arial";}i:1;a:6:{s:4:"name";s:21:""Arial Black", Gadget";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:11:"arial-black";s:11:"displayname";s:11:"Arial Black";}i:2;a:6:{s:4:"name";s:22:""Courier New", Courier";s:6:"family";s:9:"monospace";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:11:"courier-new";s:11:"displayname";s:11:"Courier New";}i:3;a:6:{s:4:"name";s:38:"Georgia, "Palatino Linotype", Palatino";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:7:"georgia";s:11:"displayname";s:7:"Georgia";}i:4;a:6:{s:4:"name";s:4:"Lato";s:6:"family";s:10:"sans-serif";s:7:"variant";s:70:"100,100italic,300,300italic,regular,italic,700,700italic,900,900italic";s:4:"type";s:15:"google-webfonts";s:9:"shortname";s:4:"lato";s:11:"displayname";s:4:"Lato";}i:5;a:6:{s:4:"name";s:38:""Lucida Sans Unicode", "Lucida Grande"";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:6:"lucida";s:11:"displayname";s:13:"Lucida Grande";}i:6;a:6:{s:4:"name";s:9:"Open Sans";s:6:"family";s:10:"sans-serif";s:7:"variant";s:70:"300,300italic,regular,italic,600,600italic,700,700italic,800,800italic";s:4:"type";s:15:"google-webfonts";s:9:"shortname";s:8:"opensans";s:11:"displayname";s:9:"Open Sans";}i:7;a:6:{s:4:"name";s:29:""Palatino Linotype", Palatino";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:8:"palatino";s:11:"displayname";s:8:"Palatino";}i:8;a:6:{s:4:"name";s:14:"Tahoma, Geneva";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:6:"tahoma";s:11:"displayname";s:6:"Tahoma";}i:9;a:6:{s:4:"name";s:24:""Times New Roman", Times";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:5:"times";s:11:"displayname";s:15:"Times New Roman";}i:10;a:6:{s:4:"name";s:25:""Trebuchet MS", Helvetica";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:12:"trebuchet-ms";s:11:"displayname";s:12:"Trebuchet MS";}i:11;a:6:{s:4:"name";s:15:"Verdana, Geneva";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:7:"verdana";s:11:"displayname";s:7:"Verdana";}}');
    
    switch ($method):
        case 'enqueue':
            return $fonts;
            break;

        case 'customizer':
            $customizer_array = array();
            foreach($fonts as $font):
                $customizer_array[$font['shortname']] = $font['displayname'];
            endforeach;
            
            return $customizer_array;
            break;

        default;
            return $fonts;

    endswitch;
}

function wptuts_styles_with_the_lot()
{
    // Register the style like this for a theme:
    wp_register_style( 'custom-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20120208', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
    
	wp_register_style( 'custom-style2', get_template_directory_uri() . '/css/sb-admin.css', array(), '20120208', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style2' );
	
	wp_register_style( 'custom-style3', get_template_directory_uri() . '/css/plugins/morris.css', array(), '20120208', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style3' );
	
	wp_register_style( 'custom-style4', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '20120208', 'all' );
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style4' );
	
	/*
	 // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/jquery.js', array(), '20120208',true );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script');
	*/

	// Register the script like this for a theme:
    wp_register_script( 'custom-script2', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120208',true );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script2');
	
	// Register the script like this for a theme:
    wp_register_script( 'custom-script3', get_template_directory_uri() . '/js/plugins/morris/raphael.min.js', array(), '20120208' );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script3');
	
	// Register the script like this for a theme:
    wp_register_script( 'custom-script4', get_template_directory_uri() . '/js/plugins/morris/morris.min.js', array(), '20120208' );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script4');
	
	// Register the script like this for a theme:
    //wp_register_script( 'custom-script5', get_template_directory_uri() . '/js/plugins/morris/morris-data.js', array(), '20120208',true );
    // For either a plugin or a theme, you can then enqueue the script:
    //wp_enqueue_script( 'custom-script5');
	
	/**/
	
}
add_action( 'wp_enqueue_scripts', 'wptuts_styles_with_the_lot' );


//This function below will NOT reset the user's password when they are confirmed by the "New User Approve" plugin. If we remove this function, then the user will always get a reset new password when they are approved, and we do not want that to happen


function profound_logo() {
    
    $logo_img = profound_get_option('logo_img');
            
        if( empty($logo_img)): ?>
        
        <div id="site-title" class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name', 'display' )) ?></a>
            </div>
            <?php if(!profound_get_option('disable_site_desc')): ?>
                <div id="site-description" class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ) ?></div>
            <?php endif; ?>
        <?php else: ?>
        
            <div id="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" rel="home"><img src="<?php echo esc_url( profound_get_option('logo_img') ) ?>"/></a>
            </div>

        <?php endif;
}

function profound_get_social_section_individual_icon($option, $title, $icon) {
    $output = '';

    if(get_option($option)){
        $output .= '<div class="social-icons">';
        $output .= '<a href="'.esc_url(get_option($option)).'" title="'.esc_attr($title).'" target="_blank"><i class="mdf mdf-'.esc_attr($icon).'"></i></a>';
        $output .= '</div>';
    }
    return $output;
    
}
function profound_social_section_show() {    
    
    if(!get_option('disable_social_section')):

    $output = false;

    $output .= profound_get_social_section_individual_icon('facebook', 'Facebook', 'facebook');
    $output .= profound_get_social_section_individual_icon('twitter', 'Twitter', 'twitter');
    $output .= profound_get_social_section_individual_icon('google-plus', 'Google+', 'google-plus');
    $output .= profound_get_social_section_individual_icon('linkedin', 'Linkedin', 'linkedin');
    $output .= profound_get_social_section_individual_icon('instagram', 'Instagram', 'instagram');
    $output .= profound_get_social_section_individual_icon('pinterest', 'Pinterest', 'pinterest');
    $output .= profound_get_social_section_individual_icon('skype', 'Skype', 'skype');
    $output .= profound_get_social_section_individual_icon('tumblr', 'Tumblr', 'tumblr');
    $output .= profound_get_social_section_individual_icon('rss', 'RSS feed', 'rss');
    
    if($output !== false): ?>
    <div id="social-section" class="social-section">
        <?php echo $output ?>
    </div>
    <?php endif ?>
<?php
    endif;
}

/**
 * Displays the navigation links for the archive pages. Is only
 * applicable if the total number of pages is more than 'one'.
 * 
 * @since 1.0
 */
function profound_archive_nav() {
    
    global $wp_query;

    if ($wp_query->max_num_pages > 1 && !profound_get_option('disable_blog_nav')): ?>
        
        <div class="archive-nav grid-col-16">
            <div class="nav-next"><?php previous_posts_link('<span class="meta-nav">&larr;</span> ' . __('Newer posts', 'profound')); ?></div>
            <div class="nav-previous"><?php next_posts_link(__('Older posts', 'profound') . ' <span class="meta-nav">&rarr;</span>'); ?></div>
        </div>
        
<?php endif;
}
function profound_nav() {
    /*
	wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'menu',
        'menu_class' => 'sf-menu profound_menu',
        'menu_id' => 'profound_menu',
        'fallback_cb' => 'profound_nav_fallback' // Fallback function in case no menu item is defined.
    ));
	
	wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'menu2',
        'menu_class' => 'sf-menu profound_menu',
        'menu_id' => 'profound_menu'
    ));
	*/
	profound_nav_fallback();
}

function profound_nav_fallback() 
{

?>

	<div id="menu">
    	<ul class="sf-menu" id="profound_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
<?php
}

function pitch_dashboard_nav3() 
{
    
    $navMenu=wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'pitch_dashboard_menu',
        'container_class' => 'sidebar-nav navbar-collapse',
        'menu_class' => 'nav',
        'menu_id' => 'side-menu',
        'echo' => false,
        'link_before' => '<i class="fa fa-files-o fa-fw"></i> ',
        'fallback_cb' => 'pitch_dashboard_nav2' // Fallback function in case no menu item is defined.
    ));
    $navMenu=str_replace('sub-menu', 'nav nav-second-level', $navMenu);
    echo $navMenu;
    /**/
    /*
    echo str_replace('sub-menu', 'nav nav-second-level', wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'pitch_dashboard_menu',
        'container_class' => 'sidebar-nav navbar-collapse',
        'menu_class' => 'nav',
        'menu_id' => 'side-menu',
        'fallback_cb' => 'pitch_dashboard_nav2' // Fallback function in case no menu item is defined.
    ))
);
    */
    
}

function pitch_dashboard_nav() {
/*
<div id="menu">
    	<ul class="sf-menu" id="profound_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
	*/
$tempMediaQuery="Submit Media Queries";	
if( current_user_can('expert_source') ) 
{  
	$tempMediaQuery="Media Queries";	
} 



?>
	

    
	
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->
			<?php if ( is_user_logged_in() ) { ?>
			
			<ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?> "><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
			<div class="navbar-default sidebar" role="navigation">
                <?php pitch_dashboard_nav3(); ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			
			<?php } else { ?>
			
				<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
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
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="/login"><i class="fa fa-edit fa-fw"></i> Login</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Registration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register-journalist">Journalist Registration</a>
                                </li>
                                <li>
                                    <a href="/register-expertsource">Expert Registration</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="/contact"><i class="fa fa-table fa-fw"></i> Contact Us</a>
                        </li>
						<li>
                            <a href="/about"><i class="fa fa-table fa-fw"></i> About Us</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			
			<?php } ?>
			
            
        </nav>
		
<?php
}


function pitch_dashboard_nav_new() {

$tempMediaQuery="Submit Media Queries";	
if( current_user_can('expert_source') ) 
{  
	$tempMediaQuery="Media Queries";	
} 
$DisplayName="";
if ( is_user_logged_in() ) {
	
	$current_user = wp_get_current_user();
	$DisplayName=$current_user->display_name;
}
else
{
} 



if ( is_user_logged_in() ) {
?>
	

    
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="https://www.pitch.asia/wp-content/uploads/pitchasia-logo-dashboardheadertransparent-h-30.png" style="float:left;margin-top:0px;padding-top:0px;" /></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<?php 
				if ( is_user_logged_in() ) {
					/*
					
					*/
				?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo("$DisplayName"); ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?> "><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							</li>
						</ul>
					</li>
				<?php 
				}
				else
				{
				
				?>

				<?php	
				
					/*
					echo '<div align=right><br><br>';
					echo '<a href="https://www.pitch.asia/login/" class="btn btn-danger">&nbsp;&nbsp; LOGIN &nbsp;&nbsp;</a><br><br>';
					echo '<a href="https://www.pitch.asia/register-expertsource/" class="btn btn-success">&nbsp;&nbsp; Expert Source Registration &nbsp;&nbsp;</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="https://www.pitch.asia/register-journalist/" class="btn btn-primary">&nbsp;&nbsp; Journalist Registration &nbsp;&nbsp;</a>';
					echo '<br /><br /><strong>Join 20,000+ Journalists and 85,000+ Experts Building Great Stories!</strong></div>';
					*/
				}
				?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #000000;">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (is_page('dashboard')) { ?> class="active" <?php } ?>>
                        <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<?php if( current_user_can('expert_source') ) { ?>
					<li <?php if (is_page('media-query')) { ?> class="active" <?php } ?>>
						<a href="/media-query"><i class="fa fa-edit fa-fw"></i> <?php echo("$tempMediaQuery"); ?></a>
					</li>
					
					<?php } else { ?>
					<li <?php if (is_page('mediaquery')) { ?> class="active" <?php } ?>>
						<a href="/mediaquery"><i class="fa fa-edit fa-fw"></i> <?php echo("$tempMediaQuery"); ?></a>
					</li>
					<?php } ?>
					
					
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> News <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo">
                            <li <?php if (is_page('news')) { ?> class="active" <?php } ?>>
                                <a href="/news">News</a>
                            </li>
                            <li <?php if (is_page('news-chinese')) { ?> class="active" <?php } ?>>
                                <a href="/news-chinese">News Chinese</a>
                            </li>
                        </ul>
						<!-- /.nav-second-level -->
					</li>
					<li <?php if (is_page('jobs')) { ?> class="active" <?php } ?>>
						<a href="/jobs" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-desktop"></i> Jobs <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2">
                            <li <?php if (is_page('post-a-job')) { ?> class="active" <?php } ?>>
								<a href="/post-a-job">Post A Job</a>
							</li>
							<li <?php if (is_page('job-dashboard')) { ?> class="active" <?php } ?>>
								<a href="/job-dashboard">Manage Jobs</a>
							</li>
                        </ul>
					</li>
					<li <?php if (is_page('messageboard/forum/general-message-board/')) { ?> class="active" <?php } ?>>
						<a href="/messageboard/forum/general-message-board/"><i class="fa fa-table fa-fw"></i> Message Board</a>
					</li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php }
else
{
?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="https://www.pitch.asia/wp-content/uploads/pitchasia-logo-dashboardheadertransparent-h-30.png" style="float:left;margin-top:0px;padding-top:0px;" /></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<?php 
				if ( is_user_logged_in() ) {
				
				?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo("$DisplayName"); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?> "><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
				<?php 
				}
				else
				{
					/*
					echo '<div align=right><br><br>';
					echo '<a href="https://www.pitch.asia/login/" class="btn btn-danger">&nbsp;&nbsp; LOGIN &nbsp;&nbsp;</a><br><br>';
					echo '<a href="https://www.pitch.asia/register-expertsource/" class="btn btn-success">&nbsp;&nbsp; Expert Source Registration &nbsp;&nbsp;</a>';
					echo '&nbsp;&nbsp;&nbsp;';
					echo '<a href="https://www.pitch.asia/register-journalist/" class="btn btn-primary">&nbsp;&nbsp; Journalist Registration &nbsp;&nbsp;</a>';
					echo '<br /><br /><strong>Join 20,000+ Journalists and 85,000+ Experts Building Great Stories!</strong></div>';
					*/
				?>
					
				<?php	
				}
				?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #000000;">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (is_page('/')) { ?> class="active" <?php } ?>>
                        <a href="/"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                    </li>
					<li <?php if (is_page('login')) { ?> class="active" <?php } ?>>
						<a href="/login"><i class="fa fa-edit fa-fw"></i> Login</a>
					</li>
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Registration <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo">
                            <li <?php if (is_page('register-journalist')) { ?> class="active" <?php } ?>>
                                <a href="/register-journalist">Journalist Registration</a>
                            </li>
                            <li <?php if (is_page('register-expertsource')) { ?> class="active" <?php } ?>>
                                <a href="/register-expertsource">Expert Registration</a>
                            </li>
                        </ul>
						<!-- /.nav-second-level -->
					</li>
					
						<li <?php if (is_page('contact')) { ?> class="active" <?php } ?>>
                            <a href="/contact"><i class="fa fa-phone fa-fw"></i> Contact Us</a>
                        </li>
						<li <?php if (is_page('about')) { ?> class="active" <?php } ?>>
                            <a href="/about"><i class="fa fa-question fa-fw"></i> About Us</a>
                        </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php
}
}

function pitch_dashboard_nav2() {
/*
<div id="menu">
    	<ul class="sf-menu" id="profound_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
	*/
$tempMediaQuery="Submit Media Queries";	
if( current_user_can('expert_source') ) 
{  
	$tempMediaQuery="Media Queries";	
} 



?>
	
    
	
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->
			<?php if ( is_user_logged_in() ) { ?>
			
			<ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?> "><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
			<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if ( is_user_logged_in() ) { get_search_form(); } ?>
                        
                        <li>
                            <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="/mediaquery"><i class="fa fa-edit fa-fw"></i> <?php echo("$tempMediaQuery"); ?></a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> News<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/news">News</a>
                                </li>
                                <li>
                                    <a href="/news-chinese">News Chinese</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="/jobs"><i class="fa fa-bar-chart-o fa-fw"></i> Jobs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/post-a-job">Post A Job</a>
                                </li>
                                <li>
                                    <a href="/job-dashboard">Manage Jobs</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="/messageboard/forum/general-message-board/"><i class="fa fa-table fa-fw"></i> Message Board</a>
                        </li>
						<li>
                            <a href="/profile"><i class="fa fa-table fa-fw"></i> Profile</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			
			<?php } else { ?>
			
				<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
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
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="/login"><i class="fa fa-edit fa-fw"></i> Login</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Registration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/register-journalist">Journalist Registration</a>
                                </li>
                                <li>
                                    <a href="/register-expertsource">Expert Registration</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="/contact"><i class="fa fa-table fa-fw"></i> Contact Us</a>
                        </li>
						<li>
                            <a href="/about"><i class="fa fa-table fa-fw"></i> About Us</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
			
			<?php } ?>
			
            
        </nav>
		
<?php
}

function ignore_new_user_autopass() {
	return true;
}

add_filter( 'new_user_approve_bypass_password_reset', 'ignore_new_user_autopass' );



//This changes the bbpress plugin role names given to users
function my_custom_roles( $role, $user_id, $user_role ) {
	if( $role == 'Keymaster' )
		return 'Board Admin';

	return $role;
}

add_filter( 'bbp_get_user_display_role', 'my_custom_roles', 10, 3 );



function listing_published_send_email($post_id) {
   $post = get_post($post_id);
   $author = get_userdata($post->post_author);
   $message = "
      Hi ".$author->display_name.",
      Your Pitch.Asia job listing, ".$post->post_title." has just been approved at ".get_permalink( $post_id )."

You can visit https://www.Pitch.Asia and login to manage your job listing.

Many thanks,
Pitch.Asia
https://www.Pitch.Asia
   ";
   wp_mail($author->user_email, "Your job listing is online", $message);
}
add_action('publish_job_listing', 'listing_published_send_email');




add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'media_query',
    array(
      'labels' => array(
        'name' => __( 'Media Queries' ),
        'singular_name' => __( 'Media Query' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'media-query'),
        'show_ui'               => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
    )
  );
  register_post_type( 'pitchasianews',
    array(
      'labels' => array(
        'name' => __( 'PitchAsia News Posts' ),
        'singular_name' => __( 'PitchAsia News Post' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'pitchasianews'),
        'show_ui'               => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
    )
  );
}


function my_taxonomies_media_query() {
  $labels = array(
    'name'              => _x( 'Media Query Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Media Query Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Media Query Categories' ),
    'all_items'         => __( 'All Media Query Categories' ),
    'parent_item'       => __( 'Parent Media Query Category' ),
    'parent_item_colon' => __( 'Parent Media Query Category:' ),
    'edit_item'         => __( 'Edit Media Query Category' ), 
    'update_item'       => __( 'Update Media Query Category' ),
    'add_new_item'      => __( 'Add New Media Query Category' ),
    'new_item_name'     => __( 'New Media Query Category' ),
    'menu_name'         => __( 'Media Query Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'media_query_category', 'media_query', $args );
}
add_action( 'init', 'my_taxonomies_media_query', 0 );






function my_taxonomies_pitchasianews() {
  $labels = array(
    'name'              => _x( 'PitchAsia News Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'PitchAsia News Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search PitchAsia News Categories' ),
    'all_items'         => __( 'All PitchAsia News Categories' ),
    'parent_item'       => __( 'Parent PitchAsia News Category' ),
    'parent_item_colon' => __( 'Parent PitchAsia News Category:' ),
    'edit_item'         => __( 'Edit PitchAsia News Category' ), 
    'update_item'       => __( 'Update PitchAsia News Category' ),
    'add_new_item'      => __( 'Add New PitchAsia News Category' ),
    'new_item_name'     => __( 'New PitchAsia News Category' ),
    'menu_name'         => __( 'PitchAsia News Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'pitchasianews_category', 'pitchasianews', $args );
}
add_action( 'init', 'my_taxonomies_pitchasianews', 0 );




//This adds a bubble showing the number of pending posts in a category within the admin area
//If we want to add a new custom post type, we just add it to the array in the same way we just added "media_query"
function show_pending_number($menu) {    
    $types = array("post", "page", "custom-post-type", "media_query", "job_listing");
    $status = "pending";
    foreach($types as $type) {
        $num_posts = wp_count_posts($type, 'readable');
        $pending_count = 0;
        if (!empty($num_posts->$status)) $pending_count = $num_posts->$status;

        if ($type == 'post') {
            $menu_str = 'edit.php';
        } else {
            $menu_str = 'edit.php?post_type=' . $type;
        }

        foreach( $menu as $menu_key => $menu_data ) {
            if( $menu_str != $menu_data[2] )
                continue;
            $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
            }
        }
    return $menu;
}
add_filter('add_menu_classes', 'show_pending_number');





/***********************EDITED BY RAVI 9-DEC-2015**************************/
function emailAlias($email,$frdemail,$action) {
	$whmusername = "pitchasia";
	$whmpassword = "NEWMnUUj74RfgWeLD2EzDEo4S8ScNEW";
	
	if($action == 'add'){
	$query = "https://192.111.132.84:2083/cpsess1973261420/execute/Email/add_forwarder?domain=mediaquery.pitchasia.com&email=$email&fwdopt=fwd&fwdemail=$frdemail";
	} elseif ($action == 'delete') {
	$query = "https://192.111.132.84:2083/cpsess1973261420/execute/Email/delete_forwarder?address=$email&forwarder=$frdemail";
	}
	 
	$curl = curl_init();                                // Create Curl Object
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);       // Allow self-signed certs
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);       // Allow certs that do not match the hostname
	curl_setopt($curl, CURLOPT_HEADER,0);               // Do not include header in output
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);       // Return contents of transfer on curl_exec
	$header[0] = "Authorization: Basic " . base64_encode($whmusername.":".$whmpassword) . "\n\r";
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);    // set the username and password
	curl_setopt($curl, CURLOPT_URL, $query);            // execute the query
	$result = curl_exec($curl);
	if ($result == false) {
	    error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");   
	                                                    // log error if curl exec fails
	}
	curl_close($curl);
}

//publish a post
add_action('save_post','save_post_callback');
function save_post_callback($post_id){

	global $post;
    if (isset($post) && $post->post_type != 'media_query'){
        return;
    }	
	$status = get_post_status( $post_id );
	
	$alias = $post_id .date("y").date("m").rand(100,9999).'@mediaquery.pitchasia.com';
	
    if ( ! get_post_meta( $post_id, 'mail_alias', $alias, false ) ) {
		if ( ! add_post_meta( $post_id, 'mail_alias', $alias, true )  )	{	
           update_post_meta ( $post_id, 'mail_alias', $alias );
		}
	}		

	$email =  get_post_meta( $post_id, 'contact_email', false );
	$t_email =  get_post_meta( $post_id, 'mail_alias', false );
	
	$name = explode('@',$t_email[0]);

	if($status == 'publish'){
		emailAlias($name[0],$email[0],'add');
	
	} else {		
		emailAlias($t_email[0],$email[0],'delete');
	}

}


//Delete a post
add_action('delete_post','delete_post_callback');

function delete_post_callback(){
		
	global $post;
	
	(isset($_GET['pid']))? $post_id = $_GET['pid'] : $post_id = $post->ID;
	
	if (get_post_type($post_id) != 'media_query'){
        return;
    }

	$email =  get_post_meta( $post_id, 'contact_email', false );
	$t_email =  get_post_meta( $post_id, 'mail_alias', false );
	emailAlias($t_email[0],$email[0],'delete');				
}
