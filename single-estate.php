<?php get_header('member2'); ?>
<?php
    $date = get_post_time('Y.m.d');
	$imgGroup = SCF::get('img-group');
    $add_1 = post_custom('pref');
    $add_2 = post_custom('add_2');
    $price = post_custom('price');
    $txt01 = post_custom('txt01');
    $txt02 = post_custom('txt02');
    $txt03 = post_custom('txt03');
    $txt04 = post_custom('txt04');
    $txt05 = post_custom('txt05');
    $txt06 = post_custom('txt06');
    $txt07 = post_custom('txt07');
    $txt08 = post_custom('txt08');
    $txt09 = post_custom('txt09');
    $txt10 = post_custom('txt10');
    $txt11 = post_custom('txt11');
    $txt12 = post_custom('txt12');
    $txt13 = post_custom('txt13');
    $txt14 = post_custom('txt14');
    $txt15 = post_custom('txt15');
    $txt16 = post_custom('txt16');
    $txt17 = post_custom('txt17');
    $txt18 = post_custom('txt18');
    $txt19 = post_custom('txt19');
    $txt20 = post_custom('txt20');
    $txt21 = post_custom('txt21');
    $txt22 = post_custom('txt22');
    $txt23 = post_custom('txt23');
    $txt24 = post_custom('txt24');
    $map = post_custom('map');
    $map2 = post_custom('map2');
?>
<section class="sec-estate01 estate01">
	<div class="sec-inner">
		<h2 class="page-title bold"><?php the_title();?></h2>
		<div class="estate-detail_01 detail">
			<div class="detail-pic">
				<ul class="slider_thumb slider">
					<?php
						foreach ($imgGroup as $fields) {
						$imgurl = wp_get_attachment_image_src($fields['img'] , 'large');
					?>
					<li>
						<?php if($fields['img'] === "" ) { ?>
						<img src="/common/img/service/service-img01.jpg">
						<?php } else { ?>
						<img src="<?php echo $imgurl[0]; ?>">
						<?php } ?>
					</li>
					<?php } ?>
				</ul>
				<ul class="thumb">
					<?php
						foreach ($imgGroup as $fields) {
						$imgurl = wp_get_attachment_image_src($fields['img'] , 'large');
					?>
					<li>
						<?php if($fields['img'] === "" ) {?>
						<img src="/common/img/service/service-img01.jpg">
						<?php } else { ?>
						<img src="<?php echo $imgurl[0]; ?>">
						<?php } ?>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="txt">
				<div class="detail-list">
					<dl class="box long">
						<dt>所在地</dt>
						<dd>
							<ul class="pref">
								<?php
									$args = array(
										'name' => 'cat_area',
										'public'   => true,
										'_builtin' => false
									);
									$output = 'names';
									$operator = 'and';
									$taxonomies = get_taxonomies($args, $output, $operator );
									$terms_obj = get_the_terms( $post->ID, $taxonomies );
									foreach($terms_obj as $key => $value){
										$modified[$key] = $value -> count;
									}
									array_multisort( $modified, SORT_DESC, $terms_obj );
									foreach ( $terms_obj as $term ){
										echo '<li class="tag-'.$term->slug.'">'.$term->name.'</li>  ';
									}
								?>
								<li><?php echo $add_1; ?></li>
								<li><?php echo $add_2; ?></li>
							</ul>
						</dd>
					</dl>
					<dl class="box long">
						<dt>最寄り駅</dt>
						<dd><?php echo $txt01; ?></dd>
					</dl>
					<dl class="box long">
						<dt>価格</dt>
						<dd><?php if($price){echo number_format($price).'円';} ?></dd>
					</dl>
					<dl class="box long">
						<dt>利回り</dt>
						<dd>
							<?php
								$term_yield = get_the_terms($post->ID,'cat_yield');
								echo $term_yield[0]->name;
							?>
						</dd>
					</dl>
					<dl class="box long">
						<dt>築年月</dt>
						<dd><?php echo $txt02; ?></dd>
					</dl>
					<dl class="box long">
						<dt>建物構造</dt>
						<dd><?php echo $txt03; ?></dd>
					</dl>
					<dl class="box long">
						<dt>建物種別</dt>
						<dd>
							<?php
								$term_kinds = get_the_terms($post->ID,'cat_kinds');
								echo $term_kinds[0]->name;
							?>
						</dd>
					</dl>
				</div>
				<div class="text-center">
					<p class="btn01"><a href="/member/contact_estate/">お問合せはこちら</a></p>
				</div>
			</div>
		</div>
		<div class="estate-detail_02 detail">
			<div class="txt">
				<h3>物件詳細</h3>
				<div class="detail-list">
					<dl class="box long">
						<dt>所在地</dt>
						<dd>
							<ul class="pref">
								<?php
									foreach ( $terms_obj as $term ){
										echo '<li class="tag-'.$term->slug.'">'.$term->name.'</li>  ';
									}
								?>
								<li><?php echo $add_1; ?></li>
								<li><?php echo $add_2; ?></li>
							</ul>
						</dd>
					</dl>
					<dl class="box long">
						<dt>最寄り駅</dt>
						<dd><?php echo $txt01; ?></dd>
					</dl>
					<dl class="box long">
						<dt>価格</dt>
						<dd><?php if($price){echo number_format($price).'円';} ?></dd>
					</dl>
					<dl class="box">
						<dt>想定利回り</dt>
						<dd><?php echo $term_yield[0]->name; ?></dd>
					</dl>
					<dl class="box">
						<dt>年間想定賃料</dt>
						<dd><?php if($txt09){echo number_format($txt09).'円';} ?></dd>
					</dl>
					<dl class="box">
						<dt>築年月</dt>
						<dd><?php echo $txt02; ?></dd>
					</dl>
					<dl class="box">
						<dt>専有・建物面積</dt>
						<dd><?php if($txt10){echo $txt10.'坪';} ?></dd>
					</dl>
					<dl class="box">
						<dt>現況</dt>
						<dd><?php echo $txt04; ?></dd>
					</dl>
					<dl class="box">
						<dt>土地面積</dt>
						<dd><?php if($txt11){echo $txt11.'坪';} ?></dd>
					</dl>
					<dl class="box">
						<dt>建物構造</dt>
						<dd><?php echo $txt03; ?></dd>
					</dl>
					<dl class="box">
						<dt>間取り</dt>
						<dd><?php echo $txt12; ?></dd>
					</dl>
					<dl class="box">
						<dt>地目</dt>
						<dd><?php echo $txt05; ?></dd>
					</dl>
					<dl class="box">
						<dt>土地権利</dt>
						<dd><?php echo $txt13; ?></dd>
					</dl>
					<dl class="box">
						<dt>用途地域</dt>
						<dd><?php echo $txt06; ?></dd>
					</dl>
					<dl class="box">
						<dt>接道状況</dt>
						<dd><?php echo $txt14; ?></dd>
					</dl>
					<dl class="box">
						<dt>建ぺい率</dt>
						<dd><?php if($txt07){echo $txt07.'％';} ?></dd>
					</dl>
					<dl class="box">
						<dt>都市計画</dt>
						<dd><?php echo $txt15; ?></dd>
					</dl>
					<dl class="box long">
						<dt>容積率</dt>
						<dd><?php if($txt08){echo $txt08.'％';} ?></dd>
					</dl>
					<dl class="box long">
						<dt>備考</dt>
						<dd><?php echo $txt18; ?></dd>
					</dl>
					<dl class="box">
						<dt>引渡時期</dt>
						<dd><?php echo $txt16; ?></dd>
					</dl>
					<dl class="box">
						<dt>取引形態</dt>
						<dd><?php echo $txt17; ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="estate-detail_03 detail">
			<h3 class="sec-tit">おすすめポイント</h3>
			<div class="point-tag">
				<?php
					if ($terms = get_the_terms($post->ID, 'cat_point')) {
						foreach ( $terms as $term ) {
							echo '<span class="tag">' .$term->name. '</span>';
						}
					}
				?>
			</div>
			<div class="point-txt">
				<?php
					remove_filter('the_content', 'wpautop');
					the_content();
				?>
			</div>
		</div>
		<div class="text-center">
			<p class="btn01"><a href="/member/contact_estate/">お問合せはこちら</a></p>
		</div>
	</div>
</section>

<?php get_footer('member2');