<?php
/**
 * Index the Funny Colors Theme
 *
 * The file contains the definitions of the main loop of the theme
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
                    if ($custom_logo_id) {
                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                        echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
                    }
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
                <!-- sticky post -->
                <div class="swtk-sticky-posts">
                    <?php
                        $sticky = get_option('sticky_posts');
                        $args = [
                            'posts_per_page' => 1,
                            'post__in' => $sticky,
                            'ignore_sticky_posts' => 1,
                        ];
                        $query = new WP_Query($args);
                        while ( $query->have_posts() ): $query->the_post();
                    ?>
                        <article class="swtk-post-sticky" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="swtk-post-image">
                                <?php if (has_post_thumbnail()):  ?>
                                    <img src="<?php esc_url( the_post_thumbnail_url() ); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <!-- post text -->
                            <div class="swtk-post-text">
                                <div class="swtk-post-title">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php
                                            if (get_the_title() == "") {
                                                echo get_the_date("F d, Y");
                                            } else {
                                                the_title();
                                            }
                                         ?>
                                    </a>
                                </div>
                                <!-- post before main text -->
                                <div class="swtk-post-author">
                                    <img class="swtk-icon" src="<?php echo get_theme_file_uri('/icons/author.svg'); ?>"/ >
                                    <?php the_author_link(); ?>
                                </div>
                                <div class="swtk-post-date">
                                    <?php echo get_the_date('F d, Y'); ?>
                                </div>
                                <div class="swtk-post-content">
                                    <?php the_excerpt(); ?>
                                </div>
                                <?php if (has_category()): ?>
                                    <div class="swtk-post-categories">
                                        <img src="<?php echo get_theme_file_uri('/icons/category.svg') ?>" class="swtk-icon">
                                        <?php the_category(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (has_tag()): ?>
                                    <div class="swtk-post-tags">
                                        <img src="<?php echo get_theme_file_uri('/icons/tags.svg') ?>" class="swtk-icon">
                                        <?php the_tags('','',''); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>

                <!-- main posts loop -->
                <?php if (have_posts()): ?>
                    <div class="swtk-row">

                          <?php while(have_posts()): the_post(); ?>
                            <article class="swtk-post-index" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="swtk-post-image">
                                    <?php if (has_post_thumbnail()):  ?>
                                        <img src="<?php esc_url( the_post_thumbnail_url() ); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <!-- post header -->
                                <div class="swtk-post-title">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php
                                            if (get_the_title() == "") {
                                                echo get_the_date("F d, Y");
                                            } else {
                                                the_title();
                                            }
                                         ?>
                                    </a>
                                </div>
                                <!-- post before main text -->
                                <div class="swtk-post-author">
                                    <img class="swtk-icon" src="<?php echo get_theme_file_uri('/icons/author.svg'); ?>"/ >
                                    <?php the_author_link(); ?>
                                </div>
                                <div class="swtk-post-date">
                                    <?php echo get_the_date('F d, Y'); ?>
                                </div>
                                <div class="swtk-post-content">
                                    <?php the_excerpt(); ?>
                                </div>
                                <?php if (has_category()): ?>
                                    <div class="swtk-post-categories">
                                        <img src="<?php echo get_theme_file_uri('/icons/category.svg'); ?>" class="swtk-icon">
                                        <?php the_category(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (has_tag()): ?>
                                    <div class="swtk-post-tags">
                                        <img src="<?php echo get_theme_file_uri('/icons/tags.svg'); ?>" class="swtk-icon">
                                        <?php the_tags('','',''); ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                          <?php endwhile; ?>
                          <div class="swtk-pagination">
                              <img src="<?php echo get_theme_file_uri('/icons/pages.svg'); ?>" alt="" class="swtk-icon">
                              <?php the_posts_pagination(); ?>
                          </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- posts -->

            <!-- right sidebar -->
            <div class="swtk-vertical-sidebar swtk-right-sidebar">
                <?php dynamic_sidebar('right-sidebar'); ?>
            </div>
        </div>



  <?php get_footer(); ?>
