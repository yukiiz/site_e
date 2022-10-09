<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>オリジナル株式会社</title>
	<!--googlefont notosans-->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet" />
	<!--googlefont Roboto-->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet" />
	<!--googlefont Oswald-->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet" />
	<?php wp_head(); ?>
</head>
<?php if ( is_home() || is_front_page() ) { ?>
<body <?php body_class(); ?>>
	<?php } else { ?>
	<body <?php body_class( 'layer-page' ); ?>>
		<?php } ?>
		<div class="content-wrap">
			<!-- header -->
			<header class="header" id="head_wrap">
				<div class="header-inner">
					<div class="header-mobile" id="mobile-head">
						<h1 class="header-logo">
							<a href="/">
							<img src="<?php echo get_template_directory_uri(); ?>/common/img/logo.png" alt="pc用のロゴマーク" />
							<p class="bold">オリジナル株式会社</p>
						</a>
						</h1>
						<div class="header-toggle" id="nav-toggle">
							<div>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>
					<nav class="header-nav" id="global-nav">
						<ul>
							<li class="pctb-none"><a href="/">HOME</a></li>
							<li><a class="bold" href="/about/">当社について</a></li>
							<li><a class="bold" href="/service/">サービス</a></li>
							<li><a class="bold" href="/faq/">よくある質問</a></li>
							<li><a class="bold" href="/estate-info/">物件情報</a></li>
							<li><a class="bold" href="/column/">お役立ちコラム</a></li>
							<li><a class="bold" href="/member/">物件を探す</a></li>
							<li class="header-icon header-icon_member bold">
								<a href="/register/"><span class="text-center">会員登録</span></a>
							</li>
							<li class="header-icon header-icon_contact bold">
								<a href="/contact/"><span class="text-center">お問合わせ</span></a>
							</li>
						</ul>
					</nav>
				</div>
			</header>
			<main class="main <?php echo esc_attr( $post->post_name ); ?>-main">
				<div class="main-inner">
					<!-- =====breadcrumbs===== -->
					<section class="sec-breadcrumbs">
						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
							<?php
							if(function_exists('bcn_display')) {
								bcn_display();
							} ?>
						</div>
					</section>