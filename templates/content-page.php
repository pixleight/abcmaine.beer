<div class="content-page" itemprop="description">
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="featured-image"><?php the_post_thumbnail( 'featured-image' ); ?></div>
  <?php endif; ?>
  <?php the_content(); ?>
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  <div class="clearfix"></div>
</div>
<?php if( get_field('location_page') ) : ?>
  <?php $temp_post = $post; ?>
  <?php get_template_part('templates/beer', 'list'); ?>
  <?php $post = $temp_post; ?>

  <div class="content-details">
    <div class="row">
      <div class="col-xs-6">
        <?php if( get_field('address') ) : ?>
          <span class="detail-block details-address" itemprop="address">
            <?php echo get_field('address')['address']; ?>
          </span>
        <?php endif; ?>

        <?php if( get_field('phone_number') ) : ?>
          <span class="detail-block details-phone" itemprop="telephone">
            <?php echo get_field('phone_number'); ?>
          </span>
        <?php endif; ?>
      </div>

      <div class="col-xs-6 text-right">
        <?php if( get_field('monday_hours') ) : ?>
          <span class="detail-block details-hours">MONDAY:<br class="visible-xs"> <?php echo get_field('monday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('tuesday_hours') ) : ?>
          <span class="detail-block details-hours">TUESDAY:<br class="visible-xs"> <?php echo get_field('tuesday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('wednesday_hours') ) : ?>
          <span class="detail-block details-hours">WEDNESDAY:<br class="visible-xs"> <?php echo get_field('wednesday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('thursday_hours') ) : ?>
          <span class="detail-block details-hours">THURSDAY:<br class="visible-xs"> <?php echo get_field('thursday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('friday_hours') ) : ?>
          <span class="detail-block details-hours">FRIDAY:<br class="visible-xs"> <?php echo get_field('friday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('saturday_hours') ) : ?>
          <span class="detail-block details-hours">SATURDAY:<br class="visible-xs"> <?php echo get_field('saturday_hours'); ?></span>
        <?php endif; ?>
        <?php if( get_field('sunday_hours') ) : ?>
          <span class="detail-block details-hours">SUNDAY:<br class="visible-xs"> <?php echo get_field('sunday_hours'); ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
