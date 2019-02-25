<?php
/**
* The template for displaying 404 page
*
* The pages is shown when the requested page or post is not found
*
* @package SWTK
* @subpackage Funny_Colors
* @since Funny Colors 1.0
*/
 ?>
<?php get_header(); ?>


  <div class="swtk-container">
    <?php get_template_part('nav'); ?>
    <div class="swtk-main">
        <!-- header -->
        <header class="swtk-header" style="background-image:url( <?php header_image(); ?> );">
            <div class="swtk-header-logo">
                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                    echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
                ?>
            </div>
            <div class="swtk-header-text-block">
                <div class="swtk-header-title" style="color: #<?php header_textcolor(); ?>">
                    <?php bloginfo('name'); ?>
                </div>
                <div class="swtk-header-text">
                    <?php bloginfo('description'); ?>
                </div>
            </div>
        </header>

        <!-- header sidebar -->
        <div class="swtk-horizontal-sidebar swtk-header-sidebar">
          <?php dynamic_sidebar('header-sidebar'); ?>
        </div>

        <!-- content -->
        <div class="swtk-content">
            <!-- left sidebar -->
            <div class="swtk-vertical-sidebar swtk-left-sidebar">
                <?php wp_nav_menu([
                        'theme_location' => 'secondary',
                        'depth' => 3,
                        'container_class' => 'vertical-menu',
                    ]);
                ?>
                <?php dynamic_sidebar('left-sidebar'); ?>
            </div>

            <!-- posts -->
            <div class="swtk-posts">
                <div class="swtk-404">
                    <div class="swtk-404-number">

                    </div>
                    <div class="swtk-404-message">
                        <?php _e('Page not found!','funny-colors') ?>
                    </div>
                </div>
            </div>
            <!-- posts -->

            <!-- right sidebar -->
            <div class="swtk-vertical-sidebar swtk-right-sidebar">
                <?php dynamic_sidebar('right-sidebar'); ?>
            </div>
        </div>

        <!-- footer sidebar -->
        <div class="swtk-horizontal-sidebar swtk-footer-sidebar">
          <?php dynamic_sidebar('footer-sidebar'); ?>
        </div>

        <!-- footer -->
        <footer class="fswtk-ooter">
          <div class="swtk-footer-content">
              <div class="swtk-footer_text">
                <?php echo (get_theme_mod('footer_text')); ?>
              </div>
              <div class="swtk-footer_links">
                  <a href="<?php echo (get_theme_mod('social_link_1')) ?>">
                      <img src="<?php echo (get_theme_mod('social_icon_1')) ?>" />
                  </a>
                  <a href="<?php echo (get_theme_mod('social_link_2')) ?>">
                      <img src="<?php echo (get_theme_mod('social_icon_2')) ?>" />
                  </a>
                  <a href="<?php echo (get_theme_mod('social_link_3')) ?>">
                      <img src="<?php echo (get_theme_mod('social_icon_3')) ?>" />
                  </a>
              </div>
          </div>
          <div class="swtk-footer-creditial">
              SASS Wordpress Theming Kit, &copy; Alex Neverov, 2019. All rights reserved
          </div>
        </footer>

    </div>
  </div>

  <?php get_footer(); ?>
