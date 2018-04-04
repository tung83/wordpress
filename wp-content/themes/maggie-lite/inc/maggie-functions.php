<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Maggie Lite
 */

/**
 * Define categories lists in array
 */
$maggie_lite_categories = get_categories( array( 'hide_empty' => 0 ) );
foreach ( $maggie_lite_categories as $maggie_lite_category ) {
  $maggie_lite_cat_array[$maggie_lite_category->term_id] = $maggie_lite_category->cat_name;
}

//categories in dropdown
$maggie_lite_cat_dropdown['0'] = __( 'Select Category', 'maggie-lite' );
foreach ( $maggie_lite_categories as $maggie_lite_category ) {
  $maggie_lite_cat_dropdown[$maggie_lite_category->term_id] = $maggie_lite_category->cat_name;
}

/*---------------Ticker ---------------------------------*/
function maggie_ticker_header_customizer(){
  //Check if ticker is enabled
  $es_ticker = get_theme_mod('maggie_ticker_setting','1');
  if($es_ticker==1)
  {
    $ticker_title = get_theme_mod('maggie_ticker_title',__('Latest News','maggie-lite'));
    $ticker_category = esc_attr(get_theme_mod('ticker_setting_category',''));
    if( !empty($ticker_category)) {
      ?>
      <div class="top-ticker">
        <script>
          jQuery(document).ready(function($){
            $('#ticker').newsTicker({
              row_height: 35,
              max_rows: 1,
              speed: 600,
              direction: 'up',
              duration: 4000,
              autostart: 1,
              pauseOnHover: true
            });
          }); //jquery close
        </script> <!-- close script -->
        <?php
        $loop = new WP_Query(array(
          'category_name' => $ticker_category,
          'posts_per_page' => -1,
          'post_type' => 'post',
          'post_status' => 'publish',
          'order' => 'DESC', 
          ));
        if($loop->have_posts()) {
          ?>
          <span class="ticker-title"><?php echo esc_html($ticker_title);?></span>
          <ul id="ticker" class="hidden">
            <?php
            $i=0;
            while($loop->have_posts()){
              $loop->the_post();
              $i++;
              ?>
              <li>
                <a class="ticker_tick ticker-h5-<?php echo $i; ?>" href="<?php the_permalink();?>"><?php the_title(); ?></a>
              </li>
              <?php  
            }
            ?>
          </ul>
          <?php
        }
        ?>
      </div>
      <?php
    }
    wp_reset_postdata();
  }
}

/*-----------------------Homepage slider--------------------------*/
function maggie_lite_slider_cb(){        
  $slider_category = get_theme_mod('homepage_option_slider');
  if(!empty($slider_category)){
    $slider_type_option = get_theme_mod('slider_type_option','single');
    $slide_count = 10;
    $slide_info = get_theme_mod( 'title_option','1' );
    $posts_perpage_value = $slide_count*4;

    $slider_args = array(
      'category_name' => $slider_category,
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => $posts_perpage_value,
      'order' => 'DESC',
      'meta_query' => array(
        array(
          'key' => '_thumbnail_id',
          'compare' => '!=',
          'value' => null
          )
        )
      );
    $slider_query = new WP_Query($slider_args);
    $slide_counter = 1; 
    if($slider_query->have_posts())
    {
      echo '<div id="homeslider" class="slide-'.$slider_type_option.'">';
      while($slider_query->have_posts())
      {
        $slider_query->the_post();
        if($slider_type_option=='multiple'){
          if($slide_counter%3==1){
            echo '<div class="slider-wrap">';
          }
        }
        ?>
        <div class="slider">
          <div class="slide-image">
            <?php
            if($slider_type_option=='multiple'){
              the_post_thumbnail('maggie-lite-block-small-thumb');
            }else{
              the_post_thumbnail('maggie-lite-slider-image');
            }
            ?>
            <?php do_action( 'maggie_lite_post_format_icon' ); ?>
          </div>
          <?php if($slide_info==1):?>
          <div class="mag-slider-caption">
            <div class="maggie-container">
              <div class="maggie-slider-caption-wrap">
                <?php $sl_link = get_permalink();?>
                <?php do_action('maggie_lite_home_posted_on');?>
                <span class="cat-name"><?php $cat_name = get_the_category(); echo esc_attr( $cat_name[0]->name ); ?></span>
                <h3 class="slide-title"><?php the_title();?></h3>
                <div class="slide-excerpt"><?php the_excerpt();?></div>
                <a class="slider-btn" href="<?php echo esc_url($sl_link);?>"><?php esc_html_e( 'READ MORE', 'maggie-lite' ); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php endif;
      if($slider_type_option=='multiple'){
        if($slide_counter%3==0){
          echo '</div>';
        }
      }
      $slide_counter++;
    }
    echo '</div>';
  }
}
}
add_action( 'maggie_lite_slider', 'maggie_lite_slider_cb', 10 );


function maggie_lite_slider_script(){
  $slider_category = get_theme_mod('homepage_option_slider');
  if(!empty($slider_category)){
    $slider_controls = ( get_theme_mod('controls_option' , '1') ) ? "true" : "false";
    $slider_auto_transaction = ( get_theme_mod('transition_option' , '1') == "1" ) ? "true" : "false";
    $slider_pager = (get_theme_mod('pager_option' , '1') == "1" ) ? "true" : "false";
    $slider_speed = get_theme_mod('slider_speed' , '500');
    $slider_pause = get_theme_mod('slider_pause' , '4000');
    ?>
    <script type="text/javascript">
      jQuery(function($){
        $("#homeslider").bxSlider({
          controls:<?php echo esc_attr($slider_controls); ?>,
          pager:<?php echo esc_attr($slider_pager);?>,
          auto:<?php echo esc_attr($slider_auto_transaction);?>,
          speed:<?php echo esc_attr($slider_speed);?>,
          pause:<?php echo esc_attr($slider_pause);?>,
        });
      });
    </script>
    <?php
  }
}
add_action( 'wp_head', 'maggie_lite_slider_script' );

/*-----------------Dynamic Css-------------------*/

function maggie_lite_custom_css(){
  $maggie_lite_bg_image = get_theme_mod( 'background_image' );
  $maggie_lite_bg_color = get_theme_mod('background_color');
  $maggie_lite_bg_reapet = get_theme_mod('background_repeat');
  $maggie_lite_bg_position = get_theme_mod('background_position_x');
  $maggie_lite_bg_attachment = get_theme_mod( 'background_attachment' );
  $maggie_lite_bg_size = get_theme_mod( 'stretch_background' );
  echo '<style type="text/css">';
  if( !empty ( $maggie_lite_bg_image )){
    echo "body{background:url(".esc_url( $maggie_lite_bg_image) .") ".esc_html( $maggie_lite_bg_reapet )." ".esc_html( $maggie_lite_bg_attachment )." ".esc_html( $maggie_lite_bg_position )."}";    
  } elseif( !empty ( $maggie_lite_bg_color ) ) {
    echo "body{background-color:".esc_html( $maggie_lite_bg_color )." !important}";
  } else {

  }
  if($maggie_lite_bg_size==1){
    echo "body{background-size:cover}";
  }  
  $header_bg_v = get_header_image();  
  if(($header_bg_v)){
    $header_bg_v =   '.logo-ad-wrapper { background: url("'.esc_url($header_bg_v).'") no-repeat scroll left top rgba(0, 0, 0, 0); position: relative; z-index: 1;background-size: cover; }';
    echo $header_bg_v;
    echo "\n";
    echo '.logo-ad-wrapper:before {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0,0,0,0.7);
      z-index: -1;
    }';
  }
  echo '</style>';
}
add_action('wp_head','maggie_lite_custom_css');

/*--------------Sidebar layout for post & pages----------------------*/
function maggie_lite_sidebar_layout_class($classes){
  global $post;
  if( is_404()){
   $classes[] = ' ';
 }elseif(is_singular()){
  $global_sidebar= get_theme_mod( 'post_option_sidebar','right-sidebar');
  $post_sidebar = get_post_meta( $post -> ID, 'maggie_lite_sidebar_layout', true );        
  $page_sidebar = get_post_meta( $post -> ID, 'maggie_lite_page_sidebar_layout', true );
  if('post'==get_post_type()){
    if($post_sidebar=='global-sidebar'){
      $post_class = $global_sidebar;
    } else {
      $post_class = $post_sidebar;
    }
    $classes[] = 'single-post-'.$post_class;
  } else {
    $classes[] = 'page-'.$page_sidebar;
  }
} elseif(is_archive()){
  $archive_sidebar = get_theme_mod( 'archive_page_sidebar_option','right-sidebar' );
  $classes[] = 'archive-'.$archive_sidebar;
} elseif(is_search()){
  $archive_sidebar = get_theme_mod( 'archive_page_sidebar_option','right-sidebar');
  $classes[] = 'archive-'.$archive_sidebar;
}else{
 $classes[] = 'page-right-sidebar';	
}
return $classes;
}
add_filter( 'body_class', 'maggie_lite_sidebar_layout_class' );

/*--------------Template style layout for post & pages----------------------*/

function maggie_lite_template_layout_class($classes){
  global $post;
  if( is_404()){
   $classes[] = ' ';
 }elseif(is_singular()){
  $global_template= get_theme_mod( 'post_option_default','default-template');
  $post_template = get_post_meta( $post -> ID, 'maggie_lite_post_template_layout', true );
  if('post'==get_post_type()){
    if($post_template=='global-template'){
      $post_template_class = $global_template;
    } else {
      $post_template_class = $post_template;
    }
    $classes[] = 'single-post-'.$post_template_class;
  }       
} elseif(is_archive()){
  $archive_template = get_theme_mod( 'archive_page_option','default-template');
  $classes[] = 'archive-page-'.$archive_template;
} elseif(is_search()){
  $archive_template = get_theme_mod( 'archive_page_option','default-template');
  $classes[] = 'archive-page-'.$archive_template;
}else{
 $classes[] = 'page-default-template';	
}
return $classes;
}
add_filter( 'body_class', 'maggie_lite_template_layout_class' );

/*---------------------Website layout---------------------------------*/

function maggie_lite_website_layout_class( $classes ){
  $website_layout = get_theme_mod( 'website_layout_option' , 'fullwidth' );
  if($website_layout == 'boxed' ){
    $classes[] = 'boxed-layout';
  } else {
    $classes[] = 'fullwidth-layout';
  }
  return $classes;
}
add_filter( 'body_class', 'maggie_lite_website_layout_class' );


/*----------------------Meta post on -----------------------------------*/
function maggie_lite_post_meta_cb(){
  global $post;
  $show_comment_count = get_theme_mod('post_option_comment','1');
  if($show_comment_count==1){
    $post_comment_count = get_comments_number( $post->ID );
    echo '<span class="comment_count"><i class="fa fa-comments"></i>'.esc_attr( $post_comment_count ).' '.__('Comments','maggie-lite').'</span>';
  }
}
add_action( 'maggie_lite_post_meta', 'maggie_lite_post_meta_cb', 10 );

function maggie_lite_home_posted_on_cb(){
  global $post;
  $show_comment_count = get_theme_mod('post_option_comment','1');
  $show_post_date = get_theme_mod('post_option_date','1');
  
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string_human = human_time_diff(get_the_modified_time( 'U' ),current_time('timestamp')).' '.__('ago','maggie-lite');
    $time_string = '<time class="entry-date published" datetime="%1$s">'.$time_string_human.'</time><time class="updated" datetime="%3$s">%4$s</time>';
  }

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date('M d, Y') ),
    esc_attr( get_the_modified_date( 'c' ) ),
    esc_html( get_the_modified_date('M d, Y') )
    );

  if($show_post_date==1){
    $posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
  } else {
    $posted_on = '';
  }
  echo '<span class="posted-on">' . $posted_on . '</span>';
  if($show_comment_count==1){
    $post_comment_count = get_comments_number( $post->ID );
    echo '<span class="comment_count"><i class="fa fa-comments"></i>'.esc_attr( $post_comment_count )." ".__('Comments','maggie-lite').'</span>';
  }
}
add_action( 'maggie_lite_home_posted_on', 'maggie_lite_home_posted_on_cb', 10 );

/*-------------------Excerpt length---------------------*/

function maggie_lite_customize_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'maggie_lite_customize_excerpt_more' );

function maggie_lite_word_count( $string, $limit ) {
	$words = explode( ' ', $string );
	return implode( ' ', array_slice( $words, 0, $limit ));
}

function maggie_lite_letter_count( $content, $limit ) {
	$striped_content = strip_tags( $content );
	$striped_content = strip_shortcodes( $striped_content );
	$limit_content = mb_substr( $striped_content, 0 , $limit );
	if( $limit_content < $content ){
		$limit_content .= "..."; 
	}
	return $limit_content;
}

/*---------------Get excerpt content-------------------*/

function maggie_lite_excerpt(){
  global $post;
  $excerpt_type = get_theme_mod( 'misc_excerpts_type','');
  $excerpt_length = get_theme_mod( 'misc_excerpts_length','50');
  $excerpt_content = get_the_excerpt($post -> ID);
  if( $excerpt_type == 'letters' ){
    $excerpt_content = maggie_lite_letter_count( $excerpt_content, $excerpt_length );
  } else {
    $excerpt_content = maggie_lite_word_count( $excerpt_content, $excerpt_length );
  }
  echo '<p>'. $excerpt_content .'</p>';
}

/*---------------- BreadCrumb --------------------------*/

function maggie_lite_breadcrumbs() {
 global $post;
     $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
     $delimiter = '<span class="bread_arrow"> > </span>'; // delimiter between crumbs
     $home = __( 'Home', 'maggie-lite' ); // text for the 'Home' link
     $showHomeLink = get_theme_mod( 'home_link_option','');

	  $showCurrent = get_theme_mod( 'singlepost_title_option','1'); // 1 - show current post/page title in breadcrumbs, 0 - don't show
	  $before = '<span class="current">'; // tag before the current crumb
	  $after = '</span>'; // tag after the current crumb
	  
	  $homeLink = home_url();
	  
	  if (is_home() || is_front_page()) {

     if ($showOnHome == 1) echo '<div id="maggie-breadcrumbs"><div class="maggie-container"><a href="' . $homeLink . '">' . $home . '</a></div></div>';

   } else {
    if($showHomeLink == 1){ 
      echo '<div id="maggie-breadcrumbs" class="clearfix"><span class="bread-you">'.__( 'You are here', 'maggie-lite' ).'</span><div class="maggie-container"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    } else {
      echo '<div id="maggie-breadcrumbs" class="clearfix"><span class="bread-you">'.__( 'You are here', 'maggie-lite' ).'</span><div class="maggie-container">' . $home . ' ' . $delimiter . ' ';
    }

    if ( is_category() ) {
     $thisCat = get_category(get_query_var('cat'), false);
     if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
     echo $before .  single_cat_title('', false) . $after;

   } elseif ( is_search() ) {
     echo $before . __( "Search results for", "maggie-lite" ).' "' . get_search_query() . '"' . $after;

   } elseif ( is_day() ) {
     echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
     echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
     echo $before . get_the_time('d') . $after;

   } elseif ( is_month() ) {
     echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
     echo $before . get_the_time('F') . $after;

   } elseif ( is_year() ) {
     echo $before . get_the_time('Y') . $after;

   } elseif ( is_single() && !is_attachment() ) {
     if ( get_post_type() != 'post' ) {
       $post_type = get_post_type_object(get_post_type());
       $slug = $post_type->rewrite;
       echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
       if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
     } else {
       $cat = get_the_category(); $cat = $cat[0];
       $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
       if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
       echo $cats;
       if ($showCurrent == 1) echo $before . get_the_title() . $after;
     }

   } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
     $post_type = get_post_type_object(get_post_type());
     echo $before . $post_type->labels->singular_name . $after;

   } elseif ( is_attachment() ) {
     $parent = get_post($post->post_parent);
     $cat = get_the_category($parent->ID); $cat = $cat[0];
     echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
     echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>';
     if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

   } elseif ( is_page() && !$post->post_parent ) {
     if ($showCurrent == 1) echo $before . get_the_title() . $after;

   } elseif ( is_page() && $post->post_parent ) {
     $parent_id  = $post->post_parent;
     $breadcrumbs = array();
     while ($parent_id) {
       $page = get_page($parent_id);
       $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
       $parent_id  = $page->post_parent;
     }
     $breadcrumbs = array_reverse($breadcrumbs);
     for ($i = 0; $i < count($breadcrumbs); $i++) {
       echo $breadcrumbs[$i];
       if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
     }
     if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

   } elseif ( is_tag() ) {
     echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

   } elseif ( is_author() ) {
    global $author;
    $userdata = get_userdata($author);
    echo $before . 'Author: ' . $userdata->display_name . $after;

  } elseif ( is_404() ) {
   echo $before . 'Error 404' . $after;
 }
 else
 {

 }

 if ( get_query_var('paged') ) {
   if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
   echo __('Page' , 'maggie-lite') . ' ' . get_query_var('paged');
   if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
 }	  
 echo '</div></div>';	  
}
}

/*--------------WooCommerce breadcrumbs---------------------*/
add_filter( 'woocommerce_breadcrumb_defaults', 'maggie_lite_woocommerce_breadcrumbs' ); 

function maggie_lite_woocommerce_breadcrumbs() { 
  $seperator = ' <span class="bread_arrow"> > </span> ';    
  $home_text = __( 'Home', 'maggie-lite' );
  $trans_here = __( 'You are here', 'maggie-lite' );
  return array( 
    'delimiter' => " ".$seperator." ", 
    'before' => '', 
    'after' => '', 
    'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><span class="bread-you">'.$trans_here.'</span><div class="maggie-container">', 
    'wrap_after' => '</div></nav>', 
    'home' => $home_text, 
    ); 
} 

add_action( 'init', 'maggie_lite_remove_wc_breadcrumbs' ); 
function maggie_lite_remove_wc_breadcrumbs() { 
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 ); 
} 

$maggie_lite_show_breadcrumb = get_theme_mod( 'breadcrumbs_option','1'); 
if((function_exists('maggie_lite_woocommerce_breadcrumbs') && $maggie_lite_show_breadcrumb == 1)) { 
  add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 10, 0 ); 
} 

/*------------Remove bbpress breadcrumbs-----------------------*/

function maggie_lite_bbp_no_breadcrumb ($arg){
  return true ;
}
add_filter('bbp_no_breadcrumb', 'maggie_lite_bbp_no_breadcrumb' );

function maggie_lite_custom_tools_css(){
  $custom_css = wp_filter_nohtml_kses(get_theme_mod('custom_css',''));
  if(!empty($custom_css)){
    echo '<style type="text/css">';
    echo $custom_css;
    echo '</style>';
  }
}
add_action('wp_head','maggie_lite_custom_tools_css');

function maggie_lite_count_widgets( $sidebar_id ) {
  // If loading from front page, consult $_wp_sidebars_widgets rather than options
  // to see if wp_convert_widget_settings() has made manipulations in memory.
  global $_wp_sidebars_widgets;
  if ( empty( $_wp_sidebars_widgets ) ) :
    $_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
  endif;

  $sidebars_widgets_count = $_wp_sidebars_widgets;

  if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
    $widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
  $widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
  return $widget_classes;
  endif;
}


function maggie_lite_get_the_category_list(){

  $colors = array( "red", "orange", "blue", "green", "purple", "pink", "light_red" );
  $category = get_the_category();
  ?>
  <ul class="post-categories">
    <?php
    if(!empty($category)){
      foreach($category as $cat){
        echo '<li>';
        $choosed_color = array_rand( $colors, 1 );
        echo '<a class="'.$colors[$choosed_color].'" href="'. esc_url( get_category_link( $cat->cat_ID ) ).'">' . esc_attr( $cat->cat_name ) . '</a></li>';
      }
    } ?>
  </ul>
  <?php
}

/**
 * Title for tab in Tabbed Widget
 * 
 * @param $tabbed_title string
 * @param $maggie_lite_cat_id intiger
 *
 * @return $tabbed_title or $category_title if parameter is empty
 *
 */
if( ! function_exists( 'maggie_lite_tabbed_title' ) ):
  function maggie_lite_tabbed_title( $tabbed_title, $maggie_lite_cat_id ) {
    if( !empty( $tabbed_title ) ) {
      echo $tabbed_title;
    } else {
      echo get_cat_name( $maggie_lite_cat_id );
    }
  }
  endif;


  /**
 * Related posts
 */
  add_action( 'maggie_lite_related_posts', 'maggie_lite_related_posts_hook' );
  if( !function_exists( 'maggie_lite_related_posts_hook' ) ):
    function maggie_lite_related_posts_hook() {
      wp_reset_postdata();
      global $post;
      if( empty( $post ) ) {
        $post_id = '';
      } else {
        $post_id = $post->ID;
      }

      $maggie_lite_related_posts_type = get_theme_mod( 'maggie_lite_related_post_type', 'related_cat' );
      $maggie_lite_perpage_value = 3;
      $maggie_lite_perpage_value = apply_filters( 'related_posts_count', $maggie_lite_perpage_value );

        // Define related post arguments
      $related_args = array(
        'no_found_rows'            => true,
        'update_post_meta_cache'   => false,
        'update_post_term_cache'   => false,
        'ignore_sticky_posts'      => 1,
        'orderby'                  => 'rand',
        'post__not_in'             => array( $post_id ),
        'posts_per_page'           => $maggie_lite_perpage_value
        );


      if ( $maggie_lite_related_posts_type == 'related_tag' ) {
        $tags = wp_get_post_tags( $post_id );
        if ( $tags ) {
          $tag_ids = array();
          foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
          $related_args['tag__in'] = $tag_ids;
        }
      } else {
        $categories = get_the_category( $post_id );
        if ( $categories ) {
          $category_ids = array();
          foreach( $categories as $individual_category ) {
            $category_ids[] = $individual_category->term_id;
          }
          $related_args['category__in'] = $category_ids;
        }
      }

      $related_query = new WP_Query( $related_args );
      if( $related_query->have_posts() ) {
        $maggie_lite_related_post_title = get_theme_mod( 'maggie_lite_related_posts_title', __( 'Related Articles', 'maggie-lite' ) );
        ?>
        <div class="maggie-lite-related-wrapper">
          <h4 class="related-title"><?php echo esc_attr( $maggie_lite_related_post_title ); ?></h4>
          <div class="related-posts-wrapper clearfix">
            <?php
            while( $related_query->have_posts() ) {
              $related_query->the_post();
              ?>
              <div class="single-post">
                <div class="post-thumb">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail('maggie-lite-block-small-thumb');?></a>
                </div>
                <h3 class="small-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </div><!--. single-post -->
              <?php
            }
            ?>
          </div>
        </div><!-- .maggie-lite-related-wrapper -->
        <?php
      }
      wp_reset_query();
    }
    endif;


    /**
 * Single post format
 */
    add_action( 'maggie_lite_post_format_icon', 'maggie_lite_post_format_icon_hook' );

    if( !function_exists( 'maggie_lite_post_format_icon_hook' ) ):
      function maggie_lite_post_format_icon_hook() {
        global $post;
        $post_id = $post->ID;
        $maggie_lite_post_format = get_post_format( $post_id );
        switch ( $maggie_lite_post_format ) {
          case 'video':
          $post_format_icon = '<i class="fa fa-video-camera"></i>';
          break;
          case 'audio':
          $post_format_icon = '<i class="fa fa-music"></i>';
          break;            
          default:
          $post_format_icon = '';
          break;
        }
        if( $post_format_icon ) {
          echo '<span class="format-icon">'. $post_format_icon .'</span>';
        }
      }
      endif;

      if ( is_admin() ) : // Load only if we are viewing an admin page
      function maggie_lite_admin_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'maggie_lite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/admin.js', array( 'jquery' ),'',true );
        wp_localize_script( 'maggie_lite_custom_js', 'maggieWelcomeObject', array(
          'admin_nonce'   => wp_create_nonce('maggie_pro_plugin_installer_nonce'),
          'activate_nonce'    => wp_create_nonce('maggie_pro_plugin_activate_nonce'),
          'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
          'activate_btn' => __('Activate', 'maggie-lite'),
          'installed_btn' => __('Activated', 'maggie-lite'),
          'demo_installing' => __('Installing Demo', 'maggie-lite'),
          'demo_installed' => __('Demo Installed', 'maggie-lite'),
          'demo_confirm' => __('Are you sure to import demo content ?', 'maggie-lite'),
          ) );
        wp_enqueue_style( 'maggie_lite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', '1.0', 'screen' );
      }
      add_action('admin_enqueue_scripts', 'maggie_lite_admin_scripts');
      endif;

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

      /**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
      function maggie_lite_excerpt_more( $more ) {
        return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
          get_permalink( get_the_ID() ),
          __( 'Read More', 'maggie-lite' )
          );
      }
      add_filter( 'excerpt_more', 'maggie_lite_excerpt_more' );