<?php global $query_string;
query_posts( $query_string . '&orderby=title&order=ASC' ); ?>

<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php if (have_posts()) : ?>
  <div class="beer--archive">
    <?php $i = 0; while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
      <?php $i++; if( $i % 2 == 0 ) : ?>
        <div class="clearfix visible-xs-block"></div>
      <?php elseif( $i % 3 == 0 ) : ?>
        <div class="clearfix hidden-xs-block"></div>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<?php the_posts_navigation(); ?>
