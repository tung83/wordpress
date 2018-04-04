<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Maggie Lite
 */
?>

</div><!-- #content -->

<?php
$maggie_lite_show_footer_switch = get_theme_mod('footer_option_widget','1');
$maggie_lite_footer_layout = get_theme_mod('footer_layout_option','column4');
$maggie_lite_sub_footer_switch = get_theme_mod('sub_footer_option','1');
$maggie_lite_copyright_text = get_theme_mod('copyright_text','');
$maggie_lite_copyright_symbol = get_theme_mod('copyright_option','0');
?>
<footer id="colophon" class="site-footer" role="contentinfo">
  <?php if ( is_active_sidebar( 'maggie-top-footer' ) ) : ?>
    <div class="above-footer clearfix">
      <div class="maggie-container">
        <?php dynamic_sidebar( 'maggie-top-footer' ); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'maggie-footer-middle' ) ) : ?>
    <div class="middle-footer clearfix">
      <div class="maggie-container">
        <?php dynamic_sidebar( 'maggie-footer-middle' ); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php 
  if($maggie_lite_show_footer_switch!='0'){
    if ( is_active_sidebar( 'maggie-footer-1' ) ||  is_active_sidebar( 'maggie-footer-2' )  || is_active_sidebar( 'maggie-footer-3' ) || is_active_sidebar( 'maggie-footer-4' )  ) : ?>
    <div class="top-footer footer-<?php echo esc_attr($maggie_lite_footer_layout); ?>">   			
      <div class="maggie-container">
        <div class="footer-block-wrapper clearfix">
          <div class="footer-block-1 footer-block wow fadeInLeft" data-wow-delay="0.3s">
           <?php if ( is_active_sidebar( 'maggie-footer-1' ) ) : ?>
             <?php dynamic_sidebar( 'maggie-footer-1' );?>
           <?php endif; ?>
         </div>

         <div class="footer-block-2 footer-block wow fadeInLeft" data-wow-delay="0.5s" style="display: <?php if( $maggie_lite_footer_layout == 'column1' ){ echo 'none'; } else { echo 'block'; }?>;">
           <?php if ( is_active_sidebar( 'maggie-footer-2' ) ) : ?>
             <?php dynamic_sidebar( 'maggie-footer-2' ); ?>
           <?php endif; ?>	
         </div>

         <div class="footer-block-3 footer-block wow fadeInLeft" data-wow-delay="0.8s" style="display: <?php if ( $maggie_lite_footer_layout == 'column1' || $maggie_lite_footer_layout == 'column2' ){ echo 'none'; } else { echo 'block'; } ?>;">
           <?php if ( is_active_sidebar( 'maggie-footer-3' ) ) : ?>
             <?php dynamic_sidebar( 'maggie-footer-3' ); ?>
           <?php endif; ?>	
         </div>
         <div class="footer-block-4 footer-block wow fadeInLeft" data-wow-delay="1.2s" style="display: <?php if ( $maggie_lite_footer_layout != 'column4' ){ echo 'none'; } else { echo 'block'; }?>;">
           <?php if ( is_active_sidebar( 'maggie-footer-4' ) ) : ?>
             <?php dynamic_sidebar( 'maggie-footer-4' ); ?>
           <?php endif; ?>	
         </div>
       </div> <!-- footer-block-wrapper -->
     </div><!--maggie-container-->
   </div><!--top-footer-->
 <?php endif; } ?>

 <div class="bottom-footer clearfix">
  <div class="maggie-container">
    <?php if( $maggie_lite_sub_footer_switch == 1 ){ ?>
    <div class="maggeie-social">
      <?php if ( is_active_sidebar( 'maggie-footer-social' ) ) : ?>
        <?php dynamic_sidebar( 'maggie-footer-social' ); ?>
      <?php endif; ?> 
    </div>
    <div class="site-info">
      <?php if( $maggie_lite_copyright_symbol == 1 ){ ?>
      &copy; <?php echo date( 'Y' ) ?></span>
      <?php } ?> 
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php
        if( !empty( $maggie_lite_copyright_text ) ){ 
          echo '<span class="copyright-text">'.esc_html( $maggie_lite_copyright_text ).'</span>'; 
        }
        ?> 
      </a>
      <?php _e( 'WordPress Theme : ', 'maggie-lite' );  ?><a  title="<?php echo __('Free WordPress Theme','maggie-lite');?>" href="<?php echo esc_url( __( 'https://8degreethemes.com/wordpress-themes/maggie-lite/', 'maggie-lite' ) ); ?>"><?php _e( 'Maggie Lite', 'maggie-lite' ); ?> </a>
      <span><?php echo __(' by 8Degree Themes','maggie-lite');?></span>
    </div><!-- .site-info -->
    <?php } ?>
  </div>
</div>
</footer><!-- #colophon -->
<div id="back-top">
  <a href="#top"><i class="fa fa-arrow-up"></i> <span> <?php echo __( 'Top', 'maggie-lite' );?> </span></a>
</div>   
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>