<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

$cat_id 	= $data['cat_id'];
$column 	= $data['column'];
$items 		= $data['items'];
$orderby 	= $data['orderby'];
$order 		= $data['order'];

$args = array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'order' 			=> $order,
	'orderby' 			=> $orderby,
	'posts_per_page'	=> $items,
);

if ( $cat_id != 0 ) {
	$args['cat'] = $cat_id;
}

$query = new WP_Query( $args );

?>
<div class="ova-blog-grid column-<?php echo esc_attr( $column ); ?>">
	<div class="grid">
		<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$post_id = get_the_ID();
			?>
			<div class="ova-blog">
				<?php if ( has_post_thumbnail( $post_id ) ): ?>
					<div class="image">
						<?php the_post_thumbnail( 'medium_large' ); ?>
					</div>
				<?php endif; ?>
				<div class="info">
					<h3 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php esc_attr( get_the_title() ); ?>" ><?php echo esc_html( get_the_title() ); ?></a></h3>
					<p class="short_desc"><?php echo esc_html( ova_limit_text( get_the_excerpt(), 12 ) ); ?></p>
				</div>
			</div>
		<?php endwhile; 
		wp_reset_postdata();
	else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.','ova-framework' ); ?></p>
	<?php endif; ?>
</div>
</div>