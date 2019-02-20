<nav class="swtk-navbar">
    <div class="swtk-brand-toggle">
        <div class="swtk-brand">
          <a href="<?php echo esc_url( home_url() );  ?>"> <?php bloginfo('name'); ?> </a>
        </div>
        <div class="swtk-toggle">&#8801;</div>
    </div>
  <div class="swtk-collapsed">
    <div class="swtk-nav">
      <?php wp_nav_menu(['theme_location' => 'primary', 'depth' => 3]); ?>
    </div>
    <div class="swtk-horizontal-sisebar swtk-menu-sidebar">
      <?php dynamic_sidebar('menu-sidebar'); ?>
    </div>
  </div>
</nav>
