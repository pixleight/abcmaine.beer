<?php use Roots\Sage\Titles; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('beer--single'); ?> id="#<?php echo $post->post_name; ?>">
    <header>
      <div class="page-header">
        <h1 class="page-header-el" itemprop="name"><?= Titles\title(); ?></h1>
      </div>
    </header>
    <div class="entry-summary content-page">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image"><?php the_post_thumbnail( 'featured-image' ); ?></div>
      <?php endif; ?>

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
        <div class="beer--details">
          <?php if( get_field('abv') ) : ?>
            <p><strong>ABV:</strong> <?php echo get_field('abv'); ?>%</p>
          <?php endif; ?>
          <?php if( get_field('ibu') ) : ?>
            <p><strong>IBU:</strong> <?php echo get_field('ibu'); ?></p>
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
<?php endwhile; ?>
