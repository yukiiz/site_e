var ua = {};
ua.name = window.navigator.userAgent.toLowerCase();
ua.isiPhone = ua.name.indexOf("iphone") >= 0;
ua.isAndroid = ua.name.indexOf("android") >= 0;
ua.isTouch = "ontouchstart" in window;
$(function () {
	var allH = $(".content-wrap").height();
	var footerH = $(".footer").height();
	$(window).on("load resize", function () {
		w = window.innerWidth ? window.innerWidth : $(window).width();
		h = window.innerHeight ? window.innerHeight : $(window).height();
	});
	if (ua.isTouch) {
		w = screen.width;
		h = screen.height;
	} else {
		w = window.innerWidth ? window.innerWidth : $(window).width();
		h = window.innerHeight ? window.innerHeight : $(window).height();
	}
	// 追従ナビ・スマホでハンバーガーメニューになる
	(function ($) {
		$(function () {
			var $header = $("#head_wrap");
			var $pagetop = $(".js-pagetop");
			// Nav Fixed
			$(window).scroll(function () {
				if ($(window).scrollTop() > 300) {
					$header.addClass("fixed");
				} else {
					$header.removeClass("fixed");
				}
			});
			$(window).on("load scroll resize", function () {
				if ($(window).scrollTop() < 350) {
					$(".js-pagetop").removeClass("view").addClass("btn-fixed");
				} else if ($(window).scrollTop() < allH - footerH - h - 80) {
					$(".js-pagetop").addClass("view").addClass("btn-fixed");
				} else {
					$(".js-pagetop").addClass("view").removeClass("btn-fixed");
				}
			});
			// Nav Toggle Button
			$("#nav-toggle, #global-nav ul li a").click(function () {
				$header.toggleClass("open");
			});
		});
	})(jQuery);
	// ◇ボタンをクリックしたら、スクロールして上に戻る
	$(".js-pagetop").click(function () {
		$("body,html").animate(
			{
				scrollTop: 0,
			},
			500
		);
		return false;
	});
	//電話番号にリンク
	if (ua.isiPhone || ua.isAndroid) {
		$(".telnum").each(function () {
			var str = $(this).text();
			$(this).html(
				$("<a>")
					.attr("href", "tel:" + str.replace(/-/g, ""))
					.append(str + "</a>")
			);
		});
	}
});

/*scroll-animation*/
$(window).on("load scroll", function () {
	$(".js-scroll-anima").each(function () {
		var winScroll = $(window).scrollTop();
		var winHeight = $(window).height();
		var scrollPos = winScroll + winHeight * 0.8;
		if ($(this).offset().top < scrollPos) {
			$(this).css({ opacity: 1, transform: "translate(0, 0)" });
		}
	});
});

/*画面が読み込まれた時用アニメーション*/
function top_anime() {
	$(".js-mv-anime").each(function () {
		var elemPos = $(this).offset().top - 50;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight) {
			$(this).addClass("appeartext");
			$(this).css({ opacity: 1 });
		} else {
			$(this).removeClass("appeartext");
		}
	});
}
$(window).on("load", function () {
	var element = $(".js-mv-anime");
	element.each(function () {
		var text = $(this).text();
		var textbox = "";
		text.split("").forEach(function (t, i) {
			if (t !== " ") {
				if (i < 10) {
					textbox += '<span style="animation-delay:.' + i + 's;">' + t + "</span>";
				} else {
					var n = i / 10;
					textbox += '<span style="animation-delay:' + n + 's;">' + t + "</span>";
				}
			} else {
				textbox += t;
			}
		});
		$(this).html(textbox);
	});
	top_anime();
});

//slick-estate
$(document).ready(function () {
	$(".slider_thumb").slick({
		arrows: true,
		asNavFor: ".thumb",
	});
	$(".thumb").slick({
		asNavFor: ".slider_thumb",
		focusOnSelect: true,
		arrows: false,
		slidesToShow: 4,
		slidesToScroll: 1,
	});
});

//slick
jQuery(".slider01").each(function () {
	jQuery(this).slick({
		autoplay: true,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: '<div class="slick-prev"></div>',
		nextArrow: '<div class="slick-next"></div>',
		variableWidth: false,
		adaptiveHeight: true,
		dots: false,
		responsive: [
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots: false,
				},
			},
			{
				breakpoint: 426,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					centerMode: true,
					centerPadding: "15%",
				},
			},
		],
	});
});

//slick-service-page
$(function () {
	function sliderSetting() {
		var width = $(window).width();
		if (width <= 750) {
			$(".slider02").not(".slick-initialized").slick({
				autoplay: true,
				fade: true,
				dots: true,
				arrows: false,
			});
		} else {
			$(".slider02.slick-initialized").slick("unslick");
		}
	}
	sliderSetting();
	$(window).resize(function () {
		sliderSetting();
	});
});

//slick-member
$(function () {
	function sliderSetting() {
		var width = $(window).width();
		if (width >= 750) {
			$(".slick_member").not(".slick-initialized").slick({
				slidesToShow: 3,
				dots: false,
				arrows: true,
				slidesToScroll: 1,
				adaptiveHeight: true,
			});
		} else {
			$(".slick_member.slick-initialized").slick("unslick");
		}
	}
	sliderSetting();
	$(window).resize(function () {
		sliderSetting();
	});
});
window.addEventListener("load", function () {
	var maxHeight = 0;
	$(".slick_member li").each(function (idx, elem) {
		var height = $(elem).height();
		if (maxHeight < height) {
			maxHeight = height;
		}
	});
	$(".slick_member li").height(maxHeight);
});

/*scroll-animation*/
$(window).on("load scroll", function () {
	$(".js-scroll-anima").each(function () {
		var winScroll = $(window).scrollTop();
		var winHeight = $(window).height();
		var scrollPos = winScroll + winHeight * 0.8;
		if ($(this).offset().top < scrollPos) {
			$(this).css({ opacity: 1, transform: "translate(0, 0)" });
		}
	});
});

//スクロールすると横から出てくる処理
$(function () {
	var appear = false;
	var ebi = $(".js-pass-btn");
	$(window).scroll(function () {
		if (window.matchMedia("(max-width:500px)").matches) {
			if ($(this).scrollTop() > 200) {
				if (appear == false) {
					appear = true;
					ebi.stop().animate(
						{
							bottom: "0",
						},
						300
					);
				}
			} else {
				if (appear) {
					appear = false;
					ebi.stop().animate(
						{
							bottom: "-200px",
						},
						300
					);
				}
			}
		} else {
			if ($(this).scrollTop() > 200) {
				if (appear == false) {
					appear = true;
					ebi.stop().animate(
						{
							right: "0",
						},
						300
					);
				}
			} else {
				if (appear) {
					appear = false;
					ebi.stop().animate(
						{
							right: "-200px",
						},
						300
					);
				}
			}
		}
	});
});

//任意のタブにURLからリンクするための設定
function GethashID(hashIDName) {
	if (hashIDName) {
		//タブ設定
		$(".tab li")
			.find("a")
			.each(function () {
				var idName = $(this).attr("href");
				if (idName == hashIDName) {
					var parentElm = $(this).parent();
					$(".tab li").removeClass("active");
					$(".area").removeClass("is-active");
					$(hashIDName).addClass("is-active");
				}
			});
	}
}
//タブをクリックしたら
$(".tab a").on("click", function () {
	var idName = $(this).attr("href");
	GethashID(idName);
	return false;
});
// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on("load", function () {
	$(".tab li:first-of-type").addClass("active");
	$(".area:first-of-type").addClass("is-active");
	var hashName = location.hash;
	GethashID(hashName);
});

//線が伸びるための設定を関数でまとめる
function ScrollTimelineAnime() {
	$(".timeline li").each(function () {
		var elemPos = $(this).offset().top;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		var startPoint = 300;
		if (scroll >= elemPos - windowHeight - startPoint) {
			var H = $(this).outerHeight(true);
			var percent = ((scroll + startPoint - elemPos) / (H / 2)) * 100;
			// 100% を超えたらずっと100%を入れ続ける
			if (percent > 100) {
				percent = 100;
			}
			// ボーダーの長さをセット
			$(this)
				.children(".border-line")
				.css({
					height: percent + "%",
				});
		}
	});
}
// 画面をスクロールをしたら動かしたい場合の記述
$(window).on("scroll", function () {
	ScrollTimelineAnime();
});
// ページが読み込まれた時の記述
$(window).on("load", function () {
	ScrollTimelineAnime();
});
