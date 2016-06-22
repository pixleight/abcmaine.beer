<article <?php post_class('col-xs-6 col-sm-4'); ?> id="#<?php echo $post->post_name; ?>">
  <header>
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="beer--featured-image"><?php the_post_thumbnail( 'featured-image' ); ?></div>
    <?php endif; ?>
    <h2 class="entry-title beer--title"><a href="<?php the_permalink(); ?>" class="beer-list--<?php echo get_field('list_color'); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php
    $styles = get_the_terms( $post->ID, 'style' );
    if( $styles && ! is_wp_error( $styles ) ) :
      $beer_styles = array();

      foreach ( $styles as $style ) {
        $beer_styles[] = $style->name;
      }

      $the_beer_styles = join( ", ", $beer_styles );
      ?>
      <div class="beer--styles">
        <?php printf( esc_html__('%s', 'sage'), esc_html( $the_beer_styles ) ); ?>
      </div>
      <div class="beer--details row">
        <?php if( get_field('abv') ) : ?>
          <div class="col-xs-6">ABV: <?php echo get_field('abv'); ?>%</div>
        <?php endif; ?>
        <?php if( get_field('ibu') ) : ?>
          <div class="col-xs-6">IBU: <?php echo get_field('ibu'); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php the_excerpt(); ?>

    <div class="beer--extras">
      <?php if( get_field('malts') ) : ?>
        <h4>Malts:</h4>
        <p><?php echo get_field('malts'); ?></p>
      <?php endif; ?>

      <?php if( get_field('hops') ) : ?>
        <h4>Hops:</h4>
        <p><?php echo get_field('hops'); ?></p>
      <?php endif; ?>

      <?php if( get_field('Additions') ) : ?>
        <h4>Additions:</h4>
        <p><?php echo get_field('Additions'); ?></p>
      <?php endif; ?>

      <?php if( get_field('yeast') ) : ?>
        <h4>Yeast:</h4>
        <p><?php echo get_field('yeast'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</article>
