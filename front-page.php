<?php
// WP_Query arguments
$args = array (
	'post_type'              => array( 'page' ),
	'post_status'            => array( 'publish' ),
  'post_parent'            => 0,
	'nopaging'               => true,
	'posts_per_page'         => '-1',
	'orderby'                => 'menu_order',
  'order'                  => 'ASC',
	'meta_query'             => array(
		array(
			'key'       => 'hide_on_frontpage',
			'value'     => '1',
			'compare'   => '!=',
		),
	),
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) : ?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <section id="<?php echo $post->post_name; ?>" class="homepage-section" itemscope itemtype="http://schema.org/">
      <?php get_template_part('templates/frontpage', 'header'); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    </section>
	<?php endwhile; ?>
<?php else :
	// no posts found
endif;
// Restore original Post Data
wp_reset_postdata();
?>
