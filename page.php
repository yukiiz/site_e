<?php get_header() ?>
<div class="main-content">
	<?php if (have_posts()) { while(have_posts()) : the_post(); ?>
	<section class="contact-sec01 sec01">
		<div class="sec-inner">
			<?php the_content(); ?>
		</div>
	</section>
	<?php endwhile; } ?>
</div>
<?php get_footer();