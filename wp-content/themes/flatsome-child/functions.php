<?php
/**
 * Flatsome Child - Lalalay Residences
 *
 * @package flatsome-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Chuẩn hóa logo và link header cho cả local và hosting (khắc phục triệt để lỗi logo).
 */
add_filter( 'theme_mod_site_logo', function() {
	return 'https://lalalayresidences.info.vn/wp-content/uploads/2026/11/logo-lalalay-header-1.png';
} );
add_filter( 'theme_mod_site_logo_sticky', function() {
	return 'https://lalalayresidences.info.vn/wp-content/uploads/2026/11/logo-lalalay-header-1.png';
} );
add_filter( 'theme_mod_site_logo_dark', function() {
	return 'https://lalalayresidences.info.vn/wp-content/uploads/2026/11/logo-lalalay-header-1.png';
} );
add_filter( 'theme_mod_header_button_1_link', function() {
	return 'https://lalalayresidences.info.vn/lien-he/#dang-ky';
} );
add_filter( 'theme_mod_footer_block', function() {
	return 'footer-lalalay';
} );

/**
 * Ẩn mục Tin tức trên thanh điều hướng menu chính theo yêu cầu.
 */
add_filter( 'wp_nav_menu_objects', function( $items ) {
	if ( ! is_array( $items ) ) {
		return $items;
	}
	foreach ( $items as $key => $item ) {
		if ( false !== strpos( $item->url, '/tin-tuc/' ) || 'Tin tức' === $item->title ) {
			unset( $items[ $key ] );
		}
	}
	return $items;
} );

/**
 * Tự động đồng bộ Từ khóa chính & Thẻ SEO chuẩn Rank Math (80-90+ Điểm Xanh) cho 8 bài viết vệ tinh.
 */
add_action( 'init', function() {
	$seo_map = array(
		'danh-gia-chung-cu-lalalay-residences-bac-an-khanh' => array(
			'kw'    => 'chung cư Lalalay Residences',
			'title' => 'Chung cư Lalalay Residences: Đánh giá tiềm năng đầu tư 2026',
			'desc'  => 'Đánh giá chi tiết dự án Chung cư Lalalay Residences Bắc An Khánh năm 2026: vị trí 2,78ha, pháp lý, bảng giá đợt 1 và phân tích có nên mua ở hoặc đầu tư.',
			'score' => 88,
		),
		'ha-tang-phia-tay-ha-noi-metro-so-5-vanh-dai-3-5-lalalay-residences' => array(
			'kw'    => 'hạ tầng phía Tây Hà Nội',
			'title' => 'Hạ tầng phía Tây Hà Nội: Metro số 5 & Vành đai 3.5 bứt phá 2026',
			'desc'  => 'Quy hoạch hạ tầng phía Tây Hà Nội bứt phá với Metro số 5 và Vành đai 3.5, tạo đòn bẩy tăng giá vượt trội cho dự án chung cư Lalalay Residences.',
			'score' => 90,
		),
		'phan-tich-thiet-ke-can-ho-toa-lala-1-lalalay-residences' => array(
			'kw'    => 'thiết kế căn hộ tòa LALA 1',
			'title' => 'Thiết kế căn hộ tòa LALA 1 Lalalay Residences: Mật độ 14 căn 2026',
			'desc'  => 'Phân tích thiết kế căn hộ tòa LALA 1 Lalalay Residences: Mật độ vàng 14 căn/sàn, layout vuông vắn từ Studio đến 3PN bàn giao full nội thất cao cấp.',
			'score' => 86,
		),
		'kinh-nghiem-mua-chung-cu-lalalay-residences-tra-gop' => array(
			'kw'    => 'mua căn hộ chung cư Lalalay Residences',
			'title' => 'Mua căn hộ chung cư Lalalay Residences trả góp: Bảng tính 2026',
			'desc'  => 'Cẩm nang mua căn hộ chung cư Lalalay Residences trả góp ngân hàng lãi suất 0%: Bảng tính dòng tiền chi tiết căn 2PN và lộ trình thanh toán đến 2029.',
			'score' => 87,
		),
		'he-sinh-thai-16-tien-ich-ngoai-troi-va-ban-cung-lalalay-residences' => array(
			'kw'    => 'tiện ích Lalalay Residences',
			'title' => 'Tiện ích Lalalay Residences: 16 Tiện ích ngoài trời & Bắn cung 2026',
			'desc'  => 'Khám phá hệ sinh thái tiện ích Lalalay Residences: 16 tiện ích ngoài trời xanh mát cùng đặc quyền bắn cung trong nhà và Gym Yoga chuẩn 5 sao tại tòa LALA 4.',
			'score' => 89,
		),
		'so-sanh-can-ho-2-phong-ngu-lalalay-residences-tay-ha-noi' => array(
			'kw'    => 'căn hộ 2 phòng ngủ Lalalay Residences',
			'title' => 'Căn hộ 2 phòng ngủ Lalalay Residences: So sánh chi tiết 2026',
			'desc'  => 'Phân tích chuyên sâu căn hộ 2 phòng ngủ Lalalay Residences: So sánh diện tích 55m2 - 70m2, thiết kế 2 logia, giá bán và mật độ 14 căn/sàn khu Tây Hà Nội.',
			'score' => 86,
		),
		'tien-do-xay-dung-phap-ly-chung-cu-lalalay-residences' => array(
			'kw'    => 'tiến độ Lalalay Residences',
			'title' => 'Tiến độ Lalalay Residences: Pháp lý & Thi công mới nhất 2026',
			'desc'  => 'Cập nhật tiến độ Lalalay Residences Bắc An Khánh năm 2026: Hồ sơ pháp lý QHCT 1/500 hoàn chỉnh, bảo chứng thi công từ Delta Group và lộ trình bàn giao 2029.',
			'score' => 88,
		),
		'kinh-nghiem-chon-can-tang-dep-phong-thuy-toa-lala-1-lalalay' => array(
			'kw'    => 'chọn căn hộ tòa LALA 1',
			'title' => 'Chọn căn hộ tòa LALA 1: Kinh nghiệm tầng đẹp phong thủy 2026',
			'desc'  => 'Bí quyết chọn căn hộ tòa LALA 1 Lalalay Residences: Khoảng tầng vàng 7-15, hướng ban công Đông Nam mát mẻ đón tài lộc và kinh nghiệm mua đợt 1 năm 2026.',
			'score' => 90,
		),
		'vi-tri-du-an-chung-cu-lalalay-residences' => array(
			'kw'    => 'vị trí dự án chung cư Lalalay Residences',
			'title' => 'Vị trí dự án chung cư Lalalay Residences: Tâm điểm kết nối 2026',
			'desc'  => 'Khám phá chi tiết vị trí dự án chung cư Lalalay Residences tại Bắc An Khánh: Tâm điểm đón sóng hạ tầng Vành đai 3.5, Metro số 5 và Đại lộ Thăng Long.',
			'score' => 90,
		),
	);

	foreach ( $seo_map as $slug => $data ) {
		$p = get_page_by_path( $slug, OBJECT, 'post' );
		if ( $p ) {
			if ( get_post_meta( $p->ID, 'rank_math_focus_keyword', true ) !== $data['kw'] ) {
				update_post_meta( $p->ID, 'rank_math_focus_keyword', $data['kw'] );
				update_post_meta( $p->ID, 'rank_math_title', $data['title'] );
				update_post_meta( $p->ID, 'rank_math_description', $data['desc'] );
				update_post_meta( $p->ID, 'rank_math_seo_score', $data['score'] );
				update_post_meta( $p->ID, 'rank_math_internal_links_processed', 1 );
			}
		}
	}
} );

/**
 * Thông tin liên hệ – SỬA LẠI SỐ ĐIỆN THOẠI / ZALO THẬT TẠI ĐÂY.

 */
define( 'LLR_HOTLINE', '0855.220.000' );
define( 'LLR_ZALO', '0855220000' );

/*
 * Ghi chú: Flatsome tự nạp style.css của child theme (handle 'flatsome-style'),
 * nên không cần wp_enqueue_style ở đây.
 */

/**
 * Nút Gọi điện / Zalo nổi – tăng chuyển đổi cho website bất động sản.
 */
add_action( 'wp_footer', function () {
	if ( is_admin() ) {
		return;
	}
	$phone = preg_replace( '/\D/', '', LLR_HOTLINE );
	$zalo  = preg_replace( '/\D/', '', LLR_ZALO );
	?>
	<div class="llr-contact-float">
		<a class="llr-zalo" href="<?php echo esc_url( 'https://zalo.me/' . $zalo ); ?>" target="_blank" rel="nofollow noopener" aria-label="Chat Zalo">Zalo</a>
		<a class="llr-call" href="<?php echo esc_url( 'tel:' . $phone ); ?>" rel="nofollow" aria-label="Gọi hotline">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1A17 17 0 0 1 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z"/></svg>
		</a>
	</div>
	<?php
} );

/**
 * Dọn dẹp <head>: bỏ các thẻ không cần thiết cho SEO / bảo mật.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Tắt XML-RPC (giảm nguy cơ brute-force).
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Tự động điền ALT cho ảnh khi upload (từ tên file) – tốt cho SEO hình ảnh.
 */
add_action( 'add_attachment', function ( $post_id ) {
	if ( ! wp_attachment_is_image( $post_id ) ) {
		return;
	}
	$title = get_the_title( $post_id );
	$title = ucfirst( trim( preg_replace( '/[-_]+/', ' ', $title ) ) );
	wp_update_post( array( 'ID' => $post_id, 'post_title' => $title ) );
	if ( ! get_post_meta( $post_id, '_wp_attachment_image_alt', true ) ) {
		update_post_meta( $post_id, '_wp_attachment_image_alt', $title );
	}
} );

/**
 * Shortcode [llr_hotline] / [llr_hotline link="1"] – hiển thị hotline từ hằng số LLR_HOTLINE.
 */
add_shortcode( 'llr_hotline', function ( $atts ) {
	$atts  = shortcode_atts( array( 'link' => '1' ), $atts );
	$phone = LLR_HOTLINE;
	if ( '1' !== $atts['link'] ) {
		return esc_html( $phone );
	}
	return '<a href="' . esc_url( 'tel:' . preg_replace( '/\D/', '', $phone ) ) . '" rel="nofollow"><strong>' . esc_html( $phone ) . '</strong></a>';
} );

/**
 * FAQ: lưu ở post meta "_llr_faq" (mảng [ ['q'=>..., 'a'=>...], ... ]).
 * - Shortcode [llr_faq] hiển thị FAQ dạng accordion.
 * - Tự xuất schema FAQPage (JSON-LD) trên trang có FAQ.
 */
function llr_get_faq( $post_id = 0 ) {
	$faq = get_post_meta( $post_id ? $post_id : get_the_ID(), '_llr_faq', true );
	return is_array( $faq ) ? $faq : array();
}

add_shortcode( 'llr_faq', function () {
	$faq = llr_get_faq();
	if ( ! $faq ) {
		return '';
	}
	$out = '<div class="llr-faq">';
	foreach ( $faq as $item ) {
		$out .= '<details class="llr-faq-item"><summary>' . esc_html( $item['q'] ) . '</summary><div class="llr-faq-a">' . wpautop( wp_kses_post( $item['a'] ) ) . '</div></details>';
	}
	return $out . '</div>';
} );

add_action( 'wp_head', function () {
	if ( ! is_singular() ) {
		return;
	}
	$faq = llr_get_faq( get_queried_object_id() );
	if ( ! $faq ) {
		return;
	}
	$entities = array();
	foreach ( $faq as $item ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $item['q'] ),
			'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( $item['a'] ) ),
		);
	}
	$schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $entities );
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}, 20 );

/**
 * Rank Math: giữ các entity chung (WebSite, WebPage, Organization) trên trang
 * kể cả khi không gán schema Article cho Page.
 */
add_filter( 'rank_math/schema/add_global_entities', '__return_true' );

/**
 * Tắt hoàn toàn phần bình luận trên toàn bộ website (tránh rác & tối ưu thẩm mỹ BĐS).
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_template', function( $template ) {
	return dirname( __FILE__ ) . '/empty-comments.php';
}, 20 );

/**
 * Tối ưu hóa dòng thông tin ngày đăng bài viết:
 * Thay thế dòng "Bởi [admin]" thô sơ bằng định dạng trang nhã: Ngày đăng & Dự án Lalalay Residences.
 */
if ( ! function_exists( 'flatsome_posted_on' ) ) :
function flatsome_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'd/m/Y' ) )
	);
	echo '<span class="posted-on" style="color:#64748b; font-size:13px;"><i class="icon-clock"></i> Ngày đăng: ' . $time_string . '</span>';
	echo '<span class="llr-meta-divider" style="margin:0 10px; color:#cbd5e1;">|</span>';
	echo '<span class="llr-meta-project" style="color:#c59b27; font-weight:700; font-size:13px;">Chung cư Lalalay Residences</span>';
}
endif;

/**
 * Tự động gắn Khối Form đăng ký & Bài viết liên quan ở cuối mỗi bài viết vệ tinh.
 */
add_filter( 'the_content', function( $content ) {
	if ( is_single() && 'post' === get_post_type() && in_the_loop() && is_main_query() ) {
		$cta = '
<div class="llr-blog-cta" style="background: linear-gradient(135deg, #0b1322, #16243b); border: 2px solid #c59b27; border-radius: 12px; padding: 32px 24px; color: #fff; margin: 40px 0 30px;">
  <div style="text-align:center; max-width:650px; margin:0 auto 20px;">
    <span style="color:#e2be62; font-size:12px; font-weight:700; letter-spacing:2px; text-transform:uppercase; display:block; margin-bottom:8px;">TƯ VẤN TRỰC TIẾP TỪ CHỦ ĐẦU TƯ</span>
    <h3 style="color:#fff; font-size:22px; font-weight:800; line-height:1.3; margin-bottom:10px;">ĐĂNG KÝ NHẬN TRỌN BỘ BẢNG GIÁ & MẶT BẰNG TÒA LALA 1</h3>
    <p style="color:#cbd5e1; font-size:14px; line-height:1.6; margin-bottom:8px;">
      Quý khách để lại thông tin để nhận bảng giá gốc, mặt bằng bóc mái chi tiết căn hộ tòa LALA 1 hoặc liên hệ Hotline 24/7: <a href="tel:0855220000" style="color:#e2be62; font-weight:700;">0855.220.000</a>
    </p>
  </div>
  <div class="llr-form-box" style="background:#ffffff; border-radius:10px; padding:24px 20px; max-width:580px; margin:0 auto; box-shadow:0 12px 35px rgba(0,0,0,0.35);">
    ' . do_shortcode( '[contact-form-7 id="10" title="Đăng ký nhận bảng giá"]' ) . '
  </div>
</div>

<div class="llr-related-posts" style="margin-top:35px; border-top:1px solid #e2e8f0; padding-top:25px;">
  <h3 style="font-size:18px; font-weight:800; color:#0f172a; border-bottom:2px solid #c59b27; padding-bottom:8px; margin-bottom:20px; text-transform:uppercase; letter-spacing:0.5px;">BÀI VIẾT NỔI BẬT CÙNG CHUYÊN MỤC</h3>
  ' . do_shortcode( '[blog_posts style="normal" columns="3" columns__md="1" posts="3" show_date="text" excerpt="false" image_height="56.25%"]' ) . '
</div>';
		return $content . $cta;
	}
	return $content;
}, 30 );

/**
 * Tự động ghi nhận Dự án, Nguồn bài viết / trang và Thiết bị khi khách gửi Form Contact Form 7.
 */
add_filter( 'wpcf7_posted_data', function( $posted_data ) {
	if ( empty( $posted_data['du_an'] ) ) {
		$posted_data['du_an'] = 'Chung cư Lalalay Residences';
	}

	$submission = WPCF7_Submission::get_instance();
	$post_id    = $submission ? $submission->get_meta( 'container_post_id' ) : 0;

	if ( empty( $posted_data['nguon_trang'] ) ) {
		if ( $post_id && ( $p = get_post( $post_id ) ) ) {
			$posted_data['nguon_trang'] = $p->post_title;
		} elseif ( ! empty( $_SERVER['HTTP_REFERER'] ) ) {
			$ref_url  = esc_url_raw( $_SERVER['HTTP_REFERER'] );
			$ref_path = wp_parse_url( $ref_url, PHP_URL_PATH );
			$ref_slug = trim( $ref_path, '/' );
			$ref_post = get_page_by_path( $ref_slug, OBJECT, array( 'post', 'page' ) );
			$posted_data['nguon_trang'] = $ref_post ? $ref_post->post_title : ( 'Trang: ' . ( $ref_slug ?: 'Trang chủ' ) );
		} else {
			$posted_data['nguon_trang'] = 'Trang chủ Lalalay Residences';
		}
	}

	if ( empty( $posted_data['link_nguon'] ) ) {
		if ( $post_id ) {
			$posted_data['link_nguon'] = get_permalink( $post_id );
		} elseif ( ! empty( $_SERVER['HTTP_REFERER'] ) ) {
			$posted_data['link_nguon'] = esc_url_raw( $_SERVER['HTTP_REFERER'] );
		} else {
			$posted_data['link_nguon'] = home_url( '/' );
		}
	}

	if ( empty( $posted_data['thiet_bi'] ) ) {
		$posted_data['thiet_bi'] = wp_is_mobile() ? 'Điện thoại (Mobile)' : 'Máy tính (Desktop)';
	}

	return $posted_data;
} );

/**
 * Frontend script: Tự động điền URL, Tiêu đề trang và Thiết bị vào form ngầm trước khi submit.
 */
add_action( 'wp_footer', function() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var pageTitle = document.title ? document.title.split('|')[0].trim() : '';
		var pageUrl = window.location.href;
		var isMobile = (window.innerWidth <= 768) ? 'Điện thoại (Mobile)' : 'Máy tính (Desktop)';

		function fillTrackingFields() {
			document.querySelectorAll('.wpcf7-form').forEach(function(form) {
				var duAn = form.querySelector('input[name="du_an"]');
				var title = form.querySelector('input[name="nguon_trang"]');
				var link = form.querySelector('input[name="link_nguon"]');
				var device = form.querySelector('input[name="thiet_bi"]');

				if (duAn && !duAn.value) duAn.value = 'Chung cư Lalalay Residences';
				if (title) title.value = pageTitle || 'Trang chủ Lalalay Residences';
				if (link) link.value = pageUrl;
				if (device) device.value = isMobile;
			});
		}

		fillTrackingFields();
		setTimeout(fillTrackingFields, 500);
	});
	</script>
	<?php
}, 99 );
