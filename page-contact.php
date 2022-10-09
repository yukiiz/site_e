<?php
/*
Template Name:contact
*/
?>
<?php get_header() ?>
<div class="main-content">
	<!-- =====sec-header===== -->
	<section class="sec-header">
		<div class="sec-inner">
			<div class="sec-headline text-center">
				<h2 class="sec-tit registration-tit text-center bold">Contact</h2>
				<p class="sec-subtit registration-subtit text-center bold">お問い合わせ</p>
			</div>
		</div>
	</section>
	<?php if (have_posts()) { while(have_posts()) : the_post(); ?>
	<section class="contact-sec01 sec01">
		<div class="sec-inner">
			<?php
				remove_filter('the_content', 'wpautop');
				the_content();
			?>
		</div>
	</section>
	<?php endwhile; } ?>
</div>
<?php get_footer();