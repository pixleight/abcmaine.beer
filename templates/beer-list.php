<?php use Roots\Sage\Titles; ?>
<div class="beer-list">
  <h3>What's on Tap?</h3>
  <a href="/abcmaine.beer/beer/" class="beer-list--view-all"><span class="beer-list--view-all-text">View all our beers!</span><span class="beer-list--view-all-arrow">&gt;</span></a>
  <?php

  // WP_Query arguments
  $args = array (
  	'post_type'              => array( 'beer' ),
  	'post_status'            => array( 'publish' ),
  	'nopaging'               => true,
  	'posts_per_page'         => '-1',
  	'meta_query'             => array(
  		array(
  			'key'       => 'on_tap',
  			'value'     => '"' . $post->post_name . '"',
  			'compare'   => 'LIKE',
  		),
  	),
    'orderby'                => 'title',
    'order'                  => 'ASC',
  );

  // The Query
  $beerquery = new WP_Query( $args );

  // The Loop
  if ( $beerquery->have_posts() ) : ?>
      <div class="row beer-list--row beer-list--header">
        <div class="col-xs-4 beer-list--title">
          Beer
        </div>
        <div class="col-xs-4 beer-list--style">
          Style
        </div>
        <div class="col-xs-2 beer-list--abv">
          ABV
        </div>
        <div class="col-xs-2 beer-list--ibu">
          IBU
        </div>
      </div>
  	<?php while ( $beerquery->have_posts() ) : $beerquery->the_post(); ?>
      <div class="row beer-list--row beer-list--<?php echo get_field('list_color'); ?>">
        <div class="col-xs-4 beer-list--title">
          <a href="<?php echo get_post_type_archive_link('beer'); ?>#<?php echo $post->post_name; ?>"><?= Titles\title(); ?></a>
        </div>
        <div class="col-xs-4 beer-list--style">
          <?php
          $styles = get_the_terms( $post->ID, 'style' );
          if( $styles && ! is_wp_error( $styles ) ) :
            $beer_styles = array();

            foreach ( $styles as $style ) {
              $beer_styles[] = $style->name;
            }

            $the_beer_styles = join( ", ", $beer_styles );
            ?>
            <?php printf( esc_html__('%s', 'sage'), esc_html( $the_beer_styles ) ); ?>
          <?php endif; ?>
        </div>
        <div class="col-xs-2 beer-list--abv">
          <?php if( get_field('abv') ) : ?>
            <?php echo get_field('abv'); ?>%
          <?php endif; ?>
        </div>
        <div class="col-xs-2 beer-list--ibu">
          <?php echo get_field('ibu'); ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 beer-list--description"><?php the_content(); ?></div>
      </div>
  	<?php endwhile; ?>
  <?php endif;

  // Restore original Post Data
  wp_reset_postdata();

  ?>
</div>
