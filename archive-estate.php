<?php get_header('member2') ?>
<!-- =====column===== -->
<article class="estate-archive archive">
	<div class="sec-inner estate-inner">
		<!-- =====sec-header===== -->
		<section class="sec-header">
			<div class="sec-inner">
				<div class="sec-headline js-scroll-anima anima_up text-center">
					<h2 class="sec-tit member-tit bold"><span>E</span>STATE</h2>
					<p class="sec-subtit member-subtit bold">物件情報</p>
				</div>
			</div>
		</section>

		<div class="archive-inner">
			<!--archive-box-->
			<ul class="archive-box box">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$my_query = new WP_Query(
						array('paged' => $paged, 'posts_per_page' => 9, 'post_type' => 'estate')
					);
					if ($my_query->have_posts()) {
						while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<li class="box-item">
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
								?>
							</p>
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