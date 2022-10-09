<?php
/*
	if(!is_home()){
		if( is_page('member') || is_page('flow') || is_page('contact_estate') || is_page('contact_member') || (get_post_type() === 'estate') || (get_post_type() === 'member_news')){
			$userArray = array("Eclass" => "0202");
			basic_auth($userArray);
		}
	}
	*/
?>
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
	<?php if(is_search() ){ ?>
	<meta name=”robots” content=”noindex” />
	<?php
		}
		wp_head();
	?>
</head>
<?php if ( is_home() || is_front_page() ) { ?>
<body <?php body_class(); ?>>
	<?php } else { ?>
	<body <?php body_class( 'layer-page' ); ?>>
		<?php } ?>
		<div class="content-wrap">
			<!-- header -->
			<header class="header header-member header-member2" id="head_wrap">
				<div class="header-inner">
					<div class="header-mobile" id="mobile-head">
						<h1 class="header-logo">
							<a href="/">
							<img src="<?php echo get_template_directory_uri(); ?>/common/img/logo.png" alt="pc用のロゴマーク" /><span class="bold">オリジナル株式会社</span>
						</a>
						</h1>
						<p class="header-contact">
								<a href="/member/contact_estate/"></a>
							</p>
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
							<li><a class="bold" href="/member/"><span class="en">TOP</span></a></li>
							<li><a class="bold" href="/member/member_news/"><span>お知らせ</span></a></li>
							<li><a class="bold" href="/member/estate/"><span>物件情報</span></a></li>
							<li><a class="bold" href="/member/flow/"><span>お取引の流れ</span></a></li>
							<li class="header-icon header-icon_contact bold">
								<a href="/member/contact_estate/"><span>物件問合せ</span></a>
							</li>
						</ul>
					</nav>
				</div>
			</header>
			<main class="main member-main member-layer <?php echo esc_attr( $post->post_name ); ?>-main">
				<div class="main-inner">
					<!-- =====breadcrumbs===== -->
					<section class="sec-breadcrumbs">
						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
							<?php
								if ( is_search() ){
									$post_type_link = ' &gt; <a href="/member/">会員トップページ</a> &gt; <a href="'. get_post_type_archive_link('estate'). '">'. esc_html(get_post_type_object('estate')->label). '</a>';
									$patterns = array ('/(home.+?<\/a>)/', '/search\/([^\/]+)\//');
									$replace = array ('$1'. $post_type_link, '?s=$1&amp;post_type=estate');
									echo preg_replace($patterns, $replace, bcn_display(true));
								} else {
									bcn_display();
								}
							?>
						</div>
					</section>