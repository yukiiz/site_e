<?php get_header() ?>
<!-- =====column===== -->
<div class="column-body">
	<section class="sec-single single">
		<?php
			if (have_posts()) {
    	while (have_posts()) : the_post();
		?>
		<div class="single-header tit_01">
			<p class="single-date"><?php the_time('Y.m.d');?></p>
			<h2 class="single-tit"><?php the_title(); ?></h2>
		</div>
		<div class="single-detail blog-detail">
			<?php
				remove_filter('the_content', 'wpautop');
				the_content();
			?>
		</div>
		<div class="sec-paging paging">
			<?php
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				if ($prev_post || $next_post) {
			?>
			<ul class="paging-list">
				<li class="paging-item paging-item_prev text-center">
					<?php if ($prev_post) { ?>
					<a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev-link">
						<span>前の記事</span>
					</a>
					<?php } ?>
				</li>
				<li class="paging-item paging-item_archive text-center">
					<a href="/column/">一覧に戻る</a>
				</li>
				<li class="paging-item paging-item_next text-center">
					<?php if ($next_post) { ?>
					<a href="<?php echo get_permalink($next_post->ID); ?>" class="next-link">
						<span>次の記事</span>
					</a>
					<?php } ?>
				</li>
			</ul>
		</div>
		<?php
			}
			endwhile;
			} else {
    ?>
		<h2>投稿がみつかりません。</h2>
		<p><a href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a></p>
		<?php } ?>
	</section>
</div>
<?php get_footer();