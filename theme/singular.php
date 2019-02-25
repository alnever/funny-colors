<?php
/**
 * The template to show the singular posts and pages
 *
 * The template shows a singular post or page
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
            <!-- sticky post -->

            <!-- posts -->
            <div class="swtk-posts">
                <?php if (have_posts()): the_post(); ?>
                    <div class="swtk-row">

                            <article class="swtk-post-single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="swtk-post-image">
                                    <?php if (has_post_thumbnail()):  ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="swtk-post-title">
                                    <?php
                                        if (get_the_title() == "") {
                                            echo get_the_date("F d, Y");
                                        } else {
                                            the_title();
                                        }
                                     ?>
                                </div>
                                <div class="swtk-post-author">
                                    <img class="swtk-icon" src="<?php echo get_theme_file_uri('/icons/edit.svg'); ?>"/ >
                                    <?php the_author_link(); ?>
                                </div>
                                <div class="swtk-post-date">
                                    <?php the_date(); ?>
                                </div>
                                <div class="swtk-post-content">
                                    <?php the_content(); ?>
                                </div>
                                <?php if (has_category()): ?>
                                    <div class="swtk-post-categories">
                                        <img src="<?php echo get_theme_file_uri('/icons/folder.svg') ?>" class="swtk-icon">
                                        <?php the_category(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (has_tag()): ?>
                                    <div class="swtk-post-tags">
                                        <img src="<?php echo get_theme_file_uri('/icons/price-tag.svg') ?>" class="swtk-icon">
                                        <?php the_tags('','',''); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="swtk-post-pages">
                                    <?php wp_link_pages([
                                        'before' => '<p><img src="' . get_theme_file_uri('/icons/copy.svg') . '" class="swtk-icon" />',
                                        'after'  => '</p>',
                                    ]); ?>
                                </div>
                            </article>
                            <!-- post pagination -->
                            <div class="swtk-posts-navigation">
                                <?php previous_post_link('%link'); ?>
                                <?php next_post_link('%link'); ?>
                            </div>
                            <!-- comments -->
                            <?php comments_template(); ?>
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
