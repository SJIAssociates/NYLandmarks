<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
//use Roots_Vcard_Widget;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);

    if(is_front_page() ):
      wp_enqueue_style('sage/owl.css', asset_path('styles/owl.css'), false, null);
      wp_enqueue_script('sage/owl.js', asset_path('scripts/owl.js'), ['jquery'], null, true);
    endif;

    if( get_page_template_slug() == 'views/template-celebrate.blade.php' ):
      wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', false, null);
      wp_enqueue_style('sage/celebrate.css', asset_path('styles/celebrate.css'), false, null);
      wp_enqueue_script('swiper-8', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', null, true);
    endif;

    if(is_singular('location')):
      wp_enqueue_style('sage/celebrate.css', asset_path('styles/celebrate.css'), false, null);
    endif;

    $typekit_api = get_field('typekit_id','options');
    $typekit_link = 'https://use.typekit.net/' . $typekit_api . '.css';

    wp_enqueue_style( 'AdobeBenton' ,$typekit_link,false, null);


    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if( is_post_type_archive('landmark') or is_singular('landmark') or is_singular('site') or is_singular('location') or  get_page_template_slug() == 'views/template-ssoh.blade.php'  ) {
      $Google_api = get_field('google_maps_api', 'options');

      $googleMapLink = 'https://maps.googleapis.com/maps/api/js?key=' . $Google_api;

      wp_enqueue_script( 'google-api', $googleMapLink , null, null, true); // Add in your key
    }

    if( is_post_type_archive('landmark') ) {
      wp_enqueue_script('sage/explorer.js', asset_path('scripts/explorer.js'), ['jquery'], '1.0.0', true);
    }

    //Sacred Sites JS
    if( get_page_template_slug() == 'views/template-ssoh.blade.php') {
      wp_enqueue_script('sage/sacred.js', asset_path('scripts/sacred.js'), ['jquery'], '1.0.0', true);
    }

    //Celebrate JS
    if( get_page_template_slug() == 'views/template-celebrate.blade.php') {
      wp_enqueue_script('sage/celebrate.js', asset_path('scripts/celebrate.js'), ['jquery'], '1.0.0', true);
    }

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation'  => __('Footer Navigation', 'sage'),
        'trustee_navigation' => __('Trustee Navigation','sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });



});



class Roots_Vcard_Widget extends \WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add a vCard', 'roots'));

    parent::__construct('widget_roots_vcard', __('Roots: vCard', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      //echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <br>
      <span class="email "><a  href="mailto:<?php echo $instance['email']; ?>" class='text-black'/>Email: <?php echo $instance['email']; ?></a></span><br>
      <span class="tel">Phone: <span class="value"><?php echo $instance['tel']; ?></span></span>

    </p>
          <br>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}
// -------------------------------------------------------------
// VCard
// -------------------------------------------------------------
function register_Roots_Vcard_Widget() {
	register_widget( __NAMESPACE__ . '\\Roots_Vcard_Widget' );
}
add_action('widgets_init', __NAMESPACE__ . '\\register_Roots_Vcard_Widget');


// -------------------------------------------------------------
// News Excerpt
// -------------------------------------------------------------
function news_excerpt( $length ) {
    return 20;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\news_excerpt', 999 );

// -------------------------------------------------------------
// Options Page
// -------------------------------------------------------------
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}
// -------------------------------------------------------------
// Remove Comments
// -------------------------------------------------------------
function custom_menu_page_removing() {
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', __NAMESPACE__ .'\\custom_menu_page_removing' );
// -------------------------------------------------------------
// Google Map
// -------------------------------------------------------------
function my_acf_init() {

  $api = get_field('google_maps_api', 'options');

	acf_update_setting('google_api_key', $api);
}

add_action('acf/init', __NAMESPACE__ .'\\my_acf_init');


function admin_styles() {
	echo '<style type="text/css">
        #adminmenu li.wp-menu-separator {margin: 0; background: #444;}
        .column-featured_image img{ height: 50px;}
        .acf-table .acf-row:nth-of-type(odd) .acf-fields{background: #FAFAFA;}
        .acf-flexible-content .layout .acf-fc-layout-handle {background: #DDD; font-size: 18px;}
    </style>';
}
add_action('admin_head', __NAMESPACE__ .'\\admin_styles');
// -------------------------------------------------------------
// Homepage Thumbnail
// -------------------------------------------------------------
function news_thumbnail() {
  add_image_size( 'news_thumb', 600, 400, array( 'center', 'center' ) );
}
add_action('init', __NAMESPACE__ .'\\news_thumbnail');

function location_thumbnail() {
  add_image_size( 'location_thumb', 500, 500, array( 'center', 'center' ) );
}
add_action('init', __NAMESPACE__ .'\\location_thumbnail');

// -------------------------------------------------------------
// Fix Titles for Archives
// -------------------------------------------------------------
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
// -------------------------------------------------------------
// Trustee Portal Automatically Logs out
// -------------------------------------------------------------
function custom_password_cookie_expiry( $expires ) {
    return time() + 3600;  // 3600 seconds is 1 hour. (60 Minutes * 60 seconds)
}
add_filter( 'post_password_expires', __NAMESPACE__  .'\\custom_password_cookie_expiry' );


// -------------------------------------------------------------
// Trustee Portal Password Error
// -------------------------------------------------------------
add_filter( 'the_password_form', __NAMESPACE__  .'\\wpse_71284_custom_post_password_msg' );

/**
 * Add a message to the password form.
 *
 * @wp-hook the_password_form
 * @param   string $form
 * @return  string
 */
function wpse_71284_custom_post_password_msg( $form )
{
    // No cookie, the user has not sent anything until now.
    if ( ! isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) )
        return $form;

    // Translate and escape.
    $msg = esc_html__( 'Sorry, your password is wrong.', 'your_text_domain' );

    // We have a cookie, but it doesn’t match the password.
    $msg = "<p class='custom-password-message text-center'>$msg</p>";

    return $msg . $form;
}
// -------------------------------------------------------------
// Clean Up
// -------------------------------------------------------------
function script_cleanup() {

  if(is_front_page()  ) {
    wp_dequeue_script('tribe-common');
    wp_dequeue_script('tribe-tooltip-js');

    wp_dequeue_script('contact-form-7');


    //Wp Facet
    wp_dequeue_script('fwpcl-front');
  }

}
add_action('wp_footer', __NAMESPACE__ .'\\script_cleanup');

function style_cleanup() {
  if(is_front_page()  ) {
    //Staff Profile Pages
    wp_dequeue_style('staff-styles');

    //Contact Form 7
    wp_dequeue_style('contact-form-7');

    //Formstack
    wp_dequeue_style('formstack-css');

    //Events
    wp_dequeue_style('tribe-tooltip');
    wp_dequeue_style('tribe-events-admin-menu');

    //Simple Lightbox
    //wp_dequeue_style('slb_core');

    //Wp Facet
    wp_dequeue_style('fwpcl-front');
  }

  if(basename(get_page_template()) == "template-form.blade.php") {
    //Wp Facet
    wp_dequeue_style('fwpcl-front');
  }
}
add_action('wp_enqueue_scripts', __NAMESPACE__ .'\\style_cleanup',100);


function remove_roots_share_buttons_assets() {
  wp_dequeue_style('roots-share-buttons');
}
add_action('wp_enqueue_scripts',  __NAMESPACE__ .'\\remove_roots_share_buttons_assets');
// -------------------------------------------------------------
// Clean Up Title Tag for Archive
// -------------------------------------------------------------
add_filter( 'the_seo_framework_title_from_generation', function( $title, $args ) {
	/**
	 * @link https://developer.wordpress.org/reference/functions/is_post_type_archive/
	 */
	if ( is_post_type_archive( 'landmark' ) ) {
		$title = 'Explore NY';
	}

	return $title;
}, 10, 2 );

// -------------------------------------------------------------
// Changes past event views to reverse chronological order
// -------------------------------------------------------------
// function tribe_past_reverse_chronological ($post_object) {
// 	$past_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX && $_REQUEST['tribe_event_display'] === 'past') ? true : false;
// 	if(tribe_is_past() || $past_ajax) {
// 		$post_object = array_reverse($post_object);
// 	}
// 	return $post_object;
// }
// add_filter('the_posts', __NAMESPACE__ .'\\tribe_past_reverse_chronological', 100);



/**
 * Changes Past Event Reverse Chronological Order
 *
 * @param array $template_vars An array of variables used to display the current view.
 *
 * @return array Same as above.
 */
function tribe_past_reverse_chronological_v2( $template_vars ) {

  if ( ! empty( $template_vars['is_past'] ) ) {
    $template_vars['events'] = array_reverse( $template_vars['events'] );
  }

  return $template_vars;
}
// Change List View to Past Event Reverse Chronological Order
add_filter( 'tribe_events_views_v2_view_list_template_vars',  __NAMESPACE__ .'\\tribe_past_reverse_chronological_v2', 100 );
// Change Photo View to Past Event Reverse Chronological Order
add_filter( 'tribe_events_views_v2_view_photo_template_vars',  __NAMESPACE__ .'\\tribe_past_reverse_chronological_v2', 100 );




/*
Plugin Name: Collapse ACF Repeaters by Default
Description: Meant to be used with <a href="https://wordpress.org/plugins/advanced-custom-field-repeater-collapser/" target="_blank">Advanced Custom Fields Repeater &amp; Flexible Content Fields Collapser</a>, this plugin defaults to collapsing all fields.
Plugin URI:  https://github.com/JulienMelissas/acf-collapser-collapse-default
Author:      Julien Melissas
Author URI:  http://www.julienmelissas.com
Version:     1.0
*/
/* Load the javascript on the ACF admin pages */
function collapse_acf_repeater() {
    ?>
    <script type="text/javascript">
        (function($){

            $(document).ready(function(){

                $('.directoryRepeater .acf-row').addClass('-collapsed');
                $('.directoryRepeater .acf-icon').addClass('collapsed');

            });

        })(jQuery);
    </script>
    <?php
}

add_action('acf/input/admin_head', __NAMESPACE__ .'\\collapse_acf_repeater');

// -------------------------------------------------------------
// Removes or edits the 'Protected:' part from posts titles
// -------------------------------------------------------------
function remove_protected_text() {
  return __('%s');
}
add_filter( 'protected_title_format',  __NAMESPACE__ .'\\remove_protected_text' );

// -------------------------------------------------------------
// Change the no Event Text
// -------------------------------------------------------------
function sji_customize_notice( $html, $notices ) {

	// If text is found in notice, then replace it
	if( stristr( $html, '. Please try viewing the full calendar for a complete list of events.' ) ) {
		 // Customize the message as needed
		 $html = str_replace( '. Please try viewing the full calendar for a complete list of events.', ' at this time, please check back.', $html );
	}

	return $html;

}
add_filter( 'tribe_the_notices', __NAMESPACE__ .'\\sji_customize_notice', 10, 2 );

// -------------------------------------------------------------
// Remove Captcha on pages without hte shortcode
// -------------------------------------------------------------
function conditionally_load_plugin_js_css(){
	if( !is_page('who-we-are') ) { # Only load CSS and JS on needed Pages

		wp_dequeue_script('contact-form-7'); # Restrict scripts.
		wp_dequeue_script('google-recaptcha');

		wp_dequeue_script('recaptcha-v2');
		wp_dequeue_script('recaptcha-lib-v2');


		wp_dequeue_script('wpcf7-recaptcha');
		wp_dequeue_style('contact-form-7'); # Restrict css.
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ .'\\conditionally_load_plugin_js_css', 20, 0 );

// -------------------------------------------------------------
// Automatically Set the City field
// -------------------------------------------------------------
function auto_save_city( $post_id ) {

  $location = get_field('location');
  // Address, City, State zip
  $Fulladdress = $location['address'];

  $city = ltrim(explode(",",$Fulladdress)[1]);


  // do something
  if( empty(get_field('city'))  ):
  
    update_field('city', $city);
    
  endif;
}

add_action('acf/save_post',  __NAMESPACE__ .'\\auto_save_city', 20);



function hide_sacred_city( $field ) {

    // Don't show this field once it contains a value.
    if( $field['value'] ) {
        return false;
    }
    return $field;
}

// Apply to fields named "example_field".
add_filter('acf/prepare_field/name=city',  __NAMESPACE__ .'\\hide_sacred_city');

// -------------------------------------------------------------
// Change Search Results URL
// -------------------------------------------------------------
function wpb_change_search_url() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', __NAMESPACE__ .'\\wpb_change_search_url' );

// -------------------------------------------------------------
// Change Order of Menu
// -------------------------------------------------------------

/**
 * Filters WordPress' default menu order
 */
function my_new_admin_menu_order( $menu_order ) {
  // define your new desired menu positions here
  // for example, move 'upload.php' to position #9 and built-in pages to position #1
  $new_positions = array(
    'edit.php?post_type=ctct_forms' => 12,
    'edit.php?post_type=accordions' => 13,
  );
  // helper function to move an element inside an array
  function move_element(&$array, $a, $b) {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
  }
  // traverse through the new positions and move
  // the items if found in the original menu_positions
  foreach( $new_positions as $value => $new_index ) {
    if( $current_index = array_search( $value, $menu_order ) ) {
      move_element($menu_order, $current_index, $new_index);
    }
  }
  return $menu_order;
};
add_filter('custom_menu_order', function() { return true; });
add_filter('menu_order', __NAMESPACE__ .'\\my_new_admin_menu_order');

// -------------------------------------------------------------
// Get the WPFacet to ignore The EVent Calendar - Added by Collin Berg on 1/8/2023
// ------------------------------------------------------------
add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( 'tribe_events' == $query->get( 'post_type' ) ) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2 );
