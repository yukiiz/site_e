<?php
/*
Template Name: 会員デフォルト
*/
?>
<?php get_header('member2') ?>
<div class="main-content">
	<?php
		if (have_posts()) {
			while(have_posts()) : the_post();
			remove_filter('the_content', 'wpautop');
			the_content();
			endwhile;
		}
	?>
</div>
<?php get_footer('member2');