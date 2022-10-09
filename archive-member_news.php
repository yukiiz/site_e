<?php get_header('member2'); //header.phpを取得
?>
<article class="news-archive archive member_news">
	<div class="sec-inner news-inner ">
		<!-- =====sec-header===== -->
		<section class="sec-header">
			<div class="sec-inner">
				<div class="sec-headline js-scroll-anima anima_up text-center">
					<h2 class="sec-tit member-tit bold"><span>N</span>EWS</h2>
				</div>
			</div>
		</section>
		<div class="archive-inner">
			<!--archive-list-->
			<ul class="archive-list list">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$my_query = new WP_Query(
						array('paged' => $paged, 'posts_per_page' => 8, 'post_type' => 'member_news')
					);
				?>
				<?php
					if ($my_query->have_posts()) {
					while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<li class="list-item">
					<p>
						<span class="news-date"><?php the_time('Y.m.d');?></span>
					</p>
					<h3 class="list-tit bold">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
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
		<!--page-nave-->
		<div class="page-navi">
			<?php
				if (function_exists('wp_pagenavi')) { //ページネーションプラグイン
					wp_pagenavi(array('query' => $my_query));
				}
				wp_reset_postdata();
				wp_reset_query();
			?>
		</div>
	</div>
</article>
<?php get_footer('member2');