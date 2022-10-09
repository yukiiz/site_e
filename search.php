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
			<ul class="archive-box box">
				<?php
					if(have_posts()){
						while(have_posts()): the_post();
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
			<div class="search-no-results">
				<p>「<?php feas_search_query(); ?>」の条件による物件情報はございません。<br>条件を変更して再度検索をお願いいたします。</p>
			</div>
			<?php } ?>
		</div>
		<!--page-nave-->
		<div class="page-navi">
			<?php
				wp_pagenavi();
				wp_reset_postdata();
				wp_reset_query();
			?>
		</div>
	</div>
</article>
<section class="member-search search text-center">
	<div class="sec-inner">
		<!--価格-->
		<div id="price" class="area">
			<div class="search-form">
				<div class="sec-headline js-scroll-anima anima_up text-center">
					<h2 class="sec-tit member-tit bold"><span>S</span>EARCH</h2>
					<p class="sec-subtit member-subtit bold">条件で調べる</p>
				</div>
				<?php
					if ( function_exists( 'feas_search_form' ) ) {
						feas_search_form();
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer('member2');