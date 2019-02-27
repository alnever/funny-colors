<?php
/**
 * The template for comments
 *
 * The template shown the thread of commments and a comment form
 *
 * @package SWTK
 * @subpackage Funny_Colors
 * @since Funny Colors 1.0
 */

    if ( post_password_required() ) {
    	return;
    }
?>

<div class="swtk-comments">
    <?php if (have_comments()): ?>
        <div class="swtk-comments-title">
             <?php _e('Comments:','funny-colors'); echo get_comments_number(); ?>
        </div>
        <!-- comments list -->
        <ol class="swtk-comments-list">
            <?php wp_list_comments(
                    ['style' => 'ul',
                     'short_ping' => true,
                     'avatar_size' => 70,
                    ]);
            ?>
        </ol>
        <!-- end of comments-list -->
        <!-- comments pagination -->
        <?php if (get_comment_pages_count() && get_option('page_comments')): ?>
            <div class="swtk-comments-pagination">
                <img src="<?php echo get_theme_file_uri('/icons/pages.svg'); ?>" alt="" class="swtk-icon">
                <?php paginate_comments_links(); ?>
            </div>
        <?php endif; ?>
        <!-- end of comments pagination -->
        <!-- no comments -->
        <?php if (! comments_open() && get_comments_number()): ?>
            <div class="swtk-no-comments">
                <?php _e('Comments are closed', 'funny-colors'); ?>
            </div>
        <?php endif; ?>
        <!-- end of no comments -->
    <?php endif; ?>
    <!-- end of comments -->
    <!-- comment form -->
    <?php comment_form(); ?>
    <!-- end of comment form -->
</div>
<!-- comments -->
