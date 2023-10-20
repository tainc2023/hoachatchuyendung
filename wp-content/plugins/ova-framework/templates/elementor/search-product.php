<?php
if ( ! defined('ABSPATH') ) {
	exit();
}
?>
<div class="ova_search_product">
	<form class="form" action="<?php echo esc_url( get_bloginfo('url') ); ?>" method="GET" autocomplete="off">
		<div class="main_search">
			<input type="text" class="input_keyword" name="s" value="">
			<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
		</div>
		<input type="hidden" name="post_type" value="product">
	</form>
</div>