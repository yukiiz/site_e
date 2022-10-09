<?php
/*
Template Name: 会員トップ
*/
?>
<?php get_header('member') ?>
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
<?php get_footer('member');