<header class="banner main-header">
  <div class="row">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><span><?php bloginfo('name'); ?></span></a>
    <button class="nav-toggle visible-xs btn btn-primary">
      <i class="fa fa-bars fa-2x" aria-hidden="true" title="Menu"></i>
      <span class="sr-only">Menu</span>
    </button>
    <nav class="nav-primary" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container_id' => 'nav-primary']);
      endif;
      ?>
      <section class="sidebar-contact">
        <?php if( get_theme_mod('phone_number') ) : ?>
          <span class="contact-link--phone">
            <?= get_theme_mod('phone_number'); ?>
          </span>
        <?php endif; ?>

        <?php if( get_theme_mod('facebook_link') ) : ?>
          <a href="<?= get_theme_mod('facebook_link'); ?>" class="contact-link--icon">
            <i class="fa fa-facebook-official fa-2x" aria-hidden="true" title="Facebook"></i>
          </a>
        <?php endif; ?>
        <?php if( get_theme_mod('instagram_link') ) : ?>
          <a href="<?= get_theme_mod('instagram_link'); ?>" class="contact-link--icon">
            <i class="fa fa-instagram fa-2x" aria-hidden="true" title="Instagram"></i>
          </a>
        <?php endif; ?>
      </section>
    </nav>
  </div>
</header>
