<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Maggie Lite
 */

get_header();
$slider_type_option = esc_attr(get_theme_mod('slider_type_option','single'));
?>
<?php if(get_theme_mod('feature_post_zero_placement','below')=='below'){ ?>
    <section class="slider-wrapper <?php echo $slider_type_option.'-slider-wrap';?>">
        <?php do_action('maggie_lite_slider');?>
    </section>
    <?php } ?>
    <?php
    $colors = array( "red", "orange", "blue", "green", "purple", "pink", "caribbean_green" ); 
    ?>
    <?php
    if(get_theme_mod('feature_post_zero','')!=""){
        ?>
        <section class="below-slider-feature wow fadeInUp clearfix" data-wow-delay="0.3s">
            <div class="maggie-container">
                <?php 
                $block0_cat = get_theme_mod('feature_post_zero');
                if(!empty( $block0_cat )):
                    $category_info = get_category_by_slug($block0_cat);
                echo '<div class="zero-block-wrapper">';
                if($category_info!=null){
                    echo '<div class="block-post-wrapper clearfix">';
                    $block0_args = array(
                        'category_name'=>$block0_cat,
                        'post_status'=>'pubish',
                        'posts_per_page'=>'-1',
                        'order'=>'DESC'
                        );
                    $block0_query = new WP_Query($block0_args);
                    $b_counter = 0;
                    $total_posts_block0 = $block0_query->found_posts;
                    if($block0_query->have_posts()){
                        while($block0_query->have_posts()){
                            $b_counter++;
                            $block0_query->the_post();
                            ?>                        
                            <div class="single-post">  
                                <h3 class="post-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h3>
                                <?php if(has_post_thumbnail()): ?> 
                                <div class="post-image">
                                    <div class="block-poston">
                                        <?php $choosed_color = array_rand( $colors, 1 )?>
                                        <a class="<?php echo $colors[$choosed_color];?>" href="<?php echo esc_url(get_category_link($category_info->cat_ID)); ?>"><?php echo esc_attr($category_info->name); ?></a>
                                    </div>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('maggie-lite-featured-post');?>
                                    </a>
                                </div>                                
                            <?php endif ; ?>
                            <div class="post-desc-wrapper">
                                <div class="post-content">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                echo '</div>';
            }
            echo '</div>';
            endif;
            wp_reset_query();
            ?>
        </div>
    </section>
    <?php
}
?>
<?php if(get_theme_mod('feature_post_zero_placement','below')=='above'){ ?>
    <section class="slider-wrapper <?php echo $slider_type_option.'-slider-wrap';?>">
        <?php do_action('maggie_lite_slider');?>
    </section>
    <?php } ?>
    <div class="maggie-container">
       <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
              <section class="first-block wow fadeInUp clearfix" data-wow-delay="0.2s">
                <?php 
                $block1_cat = get_theme_mod('feature_post_one');
                $posts_for_block1 = '6';
                if(!empty( $block1_cat )):
                    $posts_for_block1 = get_theme_mod('feature_post_one_count');                                
                $category_info = get_category_by_slug($block1_cat);
                echo '<div class="first-block-wrapper">';
                if($category_info!=null){
                    if(get_theme_mod('feature_post_one_title','')!=""){
                        echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_one_title','')).'</span>';
                        ?>
                        <a href="<?php echo esc_url(get_category_link($category_info->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                            <i class="fa fa-paper-plane"></i>
                        </a>
                        <?php
                        echo '</h3>';
                    }
                    echo '<div class="block-post-wrapper clearfix">';
                    $block1_args = array(
                        'category_name'=>$block1_cat,
                        'post_status'=>'pubish',
                        'posts_per_page'=>$posts_for_block1,
                        'order'=>'DESC'
                        );
                    $block1_query = new WP_Query($block1_args);
                    $b_counter = 0;
                    $total_posts_block1 = $block1_query->found_posts;
                    if($block1_query->have_posts()){
                        while($block1_query->have_posts()){
                            $b_counter++;
                            $block1_query->the_post();
                            ?>
                            <?php 
                            if($b_counter==1){echo '<div class="toppost-wrapper clearfix"><div class="toppost-left">';} 
                            elseif(($b_counter==2)){echo '<div class="toppost-right">';}
                            elseif(($b_counter==5)){echo '<div class="clearfix bottompost-wrapper">';}
                            ?>
                            <div class="single_post <?php if($b_counter == 1){echo 'top-post non-zoomin';}?>">
                                <?php if(has_post_thumbnail()): ?>   
                                <div class="post-image">
                                    <div class="block-poston">
                                        <?php $choosed_color = array_rand( $colors, 1 )?>
                                        <a class="<?php echo $colors[$choosed_color];?>" href="<?php echo esc_url(get_category_link($category_info->cat_ID)); ?>"><?php echo esc_attr($category_info->name); ?></a>
                                    </div>
                                    <a href="<?php the_permalink();?>">
                                        <?php if($b_counter ==1){
                                            the_post_thumbnail('maggie-lite-block-big-thumb');
                                        }elseif($b_counter<5){
                                            the_post_thumbnail('maggie-lite-block-smallright-thumb');
                                        }else{
                                            the_post_thumbnail('maggie-lite-block-small-thumb');
                                        }
                                        ?>
                                    </a>
                                    <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                                </div>                                
                            <?php endif ; ?>
                            <div class="post-desc-wrapper">
                                <h3 class="post-title"><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h3>

                                <?php if($b_counter ==1 ):?>
                                <div class="post-content">
                                    <?php echo maggie_lite_word_count( get_the_excerpt(), 20 );?>
                                </div>
                            <?php endif ;?>
                        </div>
                    </div>
                    <?php 
                    if($b_counter==1){echo '</div>';} 
                    elseif(($b_counter==4)){echo '</div></div>';}
                    ?>
                    <?php
                }
            }
            echo '</div>';
        }
        echo '</div>';
        endif;
        wp_reset_query();
        ?>
    </section>

    <section class="second-block clearfix wow fadeInUp" data-wow-delay="0.3s">
        <?php 
        $block2_cat = get_theme_mod('feature_post_two');
        $posts_for_block2 = '6';
        if(!empty($block2_cat)):
            $posts_for_block2 = get_theme_mod('feature_post_two_count');
        $category_info_2 = get_category_by_slug($block2_cat);
        echo '<div class="second-block-wrapper">';
        if($category_info_2!=null){
            if(get_theme_mod('feature_post_two_title','')!=""){
                echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_two_title','')).'</span></h3>';
            }
            echo '<div class="block-post-wrapper clearfix">';                           
            $block2_args = array(
                'category_name'=>$block2_cat,
                'post_status'=>'pubish',
                'posts_per_page'=>$posts_for_block2,
                'order'=>'DESC'
                );
            $block2_query = new WP_Query($block2_args);
            $b_counter = 0;
            $total_posts_block2 = $block2_query->found_posts;
            if($block2_query->have_posts()){
                while($block2_query->have_posts()){
                    $b_counter++;
                    $block2_query->the_post();
                    ?>
                    <div class="single_post">
                        <?php if(has_post_thumbnail()): ?>   
                        <div class="post-image">
                            <div class="block-poston">
                                <?php $choosed_color = array_rand( $colors, 1 )?>
                                <a class="<?php echo $colors[$choosed_color];?>" href="<?php echo esc_url(get_category_link($category_info_2->cat_ID)); ?>"><?php echo esc_attr($category_info_2->name); ?></a>
                            </div>
                            <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('maggie-lite-block-small-thumb');?>
                            </a>
                            <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                        </div>                                

                    <?php endif ; ?>
                    <div class="post-desc-wrapper">
                        <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    </div>
                </div>
                <?php                    
            }
        }
        echo '</div>';
    }
    echo '</div>';
    endif ;
    ?>
</section>

<?php 
if ( is_active_sidebar( 'maggie-homepage-inline-ad' ) ) : ?>
<div class="homepage-middle-ad wow fadeInUp" data-wow-delay="0.6s">
    <?php dynamic_sidebar( 'maggie-homepage-inline-ad' ); ?> 
</div>
<?php endif; ?>

<section class="third-block clearfix wow fadeInUp" data-wow-delay="0.3s">
    <?php 
    $block3_cat = trim(get_theme_mod('feature_post_third_one'));
    $block3_cat_2 = trim(get_theme_mod('feature_post_third_two'));
    $block3_cat_3 = trim(get_theme_mod('feature_post_third_three'));
    $block3_cat_4 = trim(get_theme_mod('feature_post_third_four'));
    $third_cats = array($block3_cat,$block3_cat_2,$block3_cat_3,$block3_cat_4);
        //print_r($third_cats);
    if($third_cats!=null):
        $posts_for_block3 = get_theme_mod('feature_post_third_count','-1');
    echo '<div class="third-block-wrapper">';
    $cc=0;
    foreach($third_cats as $block3_cat){
        $cc++;
        $category_info_3 = get_category_by_slug($block3_cat);
        if($category_info_3!=null){
            echo '<div class="third-cat-wrap">';
            if($cc==1){
                if(get_theme_mod('feature_post_three_title','')!=""){
                    echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_three_title','')).'</span>';
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category_info_3->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <?php
                    echo '</h3>';
                }
            }elseif($cc==2){
                if(get_theme_mod('feature_post_three_title_two','')!=""){
                    echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_three_title_two','')).'</span>';
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category_info_3->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <?php
                    echo '</h3>';
                }
            }elseif($cc==3){
                if(get_theme_mod('feature_post_three_title_three','')!=""){
                    echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_three_title_three','')).'</span>';
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category_info_3->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <?php
                    echo '</h3>';
                }
            }elseif($cc==4){
                if(get_theme_mod('feature_post_three_title_four','')!=""){
                    echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_three_title_four','')).'</span>';
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category_info_3->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                        <i class="fa fa-paper-plane"></i>
                    </a>
                    <?php
                    echo '</h3>';
                }
            }
            echo '<div class="block-post-wrapper clearfix">';
            $block3_args = array(
                'category_name'=>$block3_cat,
                'post_status'=>'pubish',
                'posts_per_page'=>$posts_for_block3,
                'order'=>'DESC'
                );
            $block3_query = new WP_Query($block3_args);
            $b_counter = 0;
            $total_posts_block3 = $block3_query->found_posts;
            if($block3_query->have_posts()){
                while($block3_query->have_posts()){
                    $b_counter++;
                    $block3_query->the_post();
                    $b3_image_id = get_post_thumbnail_id();
                    $b3_big_image_path = wp_get_attachment_image_src($b3_image_id,'maggie-lite-blockthree-big-thumb',true);
                    $b3_small_image_path = wp_get_attachment_image_src($b3_image_id,'maggie-lite-blockthree-small-thumb',true);
                    $b3_image_alt = get_post_meta($b3_image_id,'_wp_attachment_image_alt',true);
                    ?>
                    <div class="single_post clearfix <?php if($b_counter == 1){echo 'top-post non-zoomin';}elseif($b_counter==2){echo "second-post";}?>">
                        <?php 
                        if($b_counter<3){
                            if(has_post_thumbnail()): ?>   
                                <div class="post-image">
                                    <div class="block-poston">
                                        <?php $choosed_color = array_rand( $colors, 1 )?>
                                        <a class="<?php echo $colors[$choosed_color];?>" href="<?php echo esc_url(get_category_link($category_info_3->cat_ID)); ?>"><?php echo esc_attr($category_info_3->name); ?></a>
                                    </div>
                                    <a href="<?php the_permalink();?>">
                                        <?php if($b_counter ==1){
                                            the_post_thumbnail('maggie-lite-blockthree-big-thumb');
                                        }else{ 
                                            the_post_thumbnail('maggie-lite-blockthree-small-thumb');
                                        }?>
                                    </a>
                                    <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                                </div>                               
                                <?php
                                endif ;
                            }
                            ?>
                            <div class="post-desc-wrapper">
                                <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <?php
                                if($b_counter>1){ ?><div class="block-poston"><?php do_action('maggie_lite_home_posted_on');?></div><?php }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                echo '</div>';
                echo '</div>';
            }
            wp_reset_postdata();
        }
        echo '</div>';
        endif;
        ?>
    </section>

    <section class="fourth-block clearfix wow fadeInUp" data-wow-delay="0.3s">
        <?php 
        $block4_cat = get_theme_mod('feature_post_fourth');
        if(!empty($block4_cat)):
            $posts_for_block4 = get_theme_mod('feature_post_fourth_count','-1');
        $category_info_4 = get_category_by_slug($block4_cat);
        echo '<div class="fourth-block-wrapper">';
        if($category_info_4!=null){
            if(get_theme_mod('feature_post_four_title','')!=""){
                echo '<h3 class="block-cat-name"> <span> '.esc_attr(get_theme_mod('feature_post_four_title','')).'</span>';
                ?>
                <a href="<?php echo esc_url(get_category_link($category_info_4->cat_ID)); ?>" title="<?php echo __('View All','maggie-lite');?>">
                    <i class="fa fa-paper-plane"></i>
                </a>
                <?php
                echo '</h3>';
            }
            echo '<div class="block-post-wrapper clearfix">';
            $block4_args = array(
                'category_name'=>$block4_cat,
                'post_status'=>'pubish',
                'posts_per_page'=>$posts_for_block4,
                'order'=>'DESC'
                );
            $block4_query = new WP_Query($block4_args);
            $b_counter = 0;
            $total_posts_block4 = $block4_query->found_posts;
            if($block4_query->have_posts()){
                while($block4_query->have_posts()){
                    $b_counter++;
                    $block4_query->the_post();
                    ?>
                    <div class="single_post non-zoomin <?php if($b_counter==1){echo "clearfix";}?>">
                        <?php if(has_post_thumbnail() && $b_counter==1): ?>   
                        <div class="post-image">
                            <div class="block-poston">
                                <?php $choosed_color = array_rand( $colors, 1 )?>
                                <a class="<?php echo $colors[$choosed_color];?>" href="<?php echo esc_url(get_category_link($category_info_4->cat_ID)); ?>"><?php echo esc_attr($category_info_4->name); ?></a>
                            </div>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('maggie-lite-blockfour-thumb');?></a>
                            <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                        </div>                                
                    <?php endif ; ?>
                    <div class="post-content-wrap">
                        <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        <div class="block-poston"><?php do_action('maggie_lite_home_posted_on');?></div>
                        <?php if($b_counter==1){ ?>
                            <div class="post-content">
                                <?php echo maggie_lite_word_count( get_the_excerpt(), 40 );?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php                    
                }
            }
            echo '</div>';
        }
        echo '</div>';
        endif ;
        ?>
    </section>      			
</main><!-- #main -->
</div><!-- #primary -->
<?php 
wp_reset_query();
$page_sidebar = get_post_meta( $post -> ID, 'maggie_lite_page_sidebar_layout', true);
if($page_sidebar!='no-sidebar'){
    get_sidebar('home');
} 
?>
</div>
<?php get_footer(); ?>