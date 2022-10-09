<?php get_header();
?>
<!-- =====column===== -->
<main class="column-archive archive">
	<div class="sec-inner">
		<article class="article">
			<div class="archive-inner">
				<ul class="archive-boxes">
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$taxonomy_name  = get_query_var('taxonomy');
						$tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug));
						$term_var = get_query_var('term');
						$my_query = new WP_Query();
						$param = array(
							'paged' => $paged,
							'posts_per_page' => 9,
							'post_type' => 'column',
							'taxonomy' => $taxonomy_name,
							'term' => $term_var,
						);
						$my_query->query($param);
					?>
					<?php if ($my_query->have_posts()) {
						while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<li class="archive-box box">
						<a href="<?php the_permalink(); ?>">
							<div class="box-inner">
								<div class="box-img">
									<div class="box-img_headline">
										<?php the_post_thumbnail('full'); ?>
									</div>
								</div>
								<div class="box-mask"></div>
							</div>
							<div class="box-tit">
								<p class="box-date"><?php the_time('Y.m.d');?></p>
								<p class="bold">
									<?php
										if(mb_strlen($post->post_title, 'UTF-8')>55){
											$title= mb_substr($post->post_title, 0, 55, 'UTF-8');
											echo $title.'……';
										}else{
											echo $post->post_title;
										}
									?></p>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php } else { ?>
				<p>現在表示できる記事はありません。</p><br>
				<div class="btn">
					<a href="<?php echo esc_url(home_url()); ?>/">TOPへ戻る</a>
				</div>
				<?php } ?>
			</div>
			<div class="page-navi">
				<?php if (function_exists('wp_pagenavi')) { //ページネーションプラグイン
                wp_pagenavi(array('query' => $my_query));
            } ?>
				<?php wp_reset_postdata();
            wp_reset_query(); ?>
			</div>
		</article>
	</div>
</main>
<?php get_footer();?>