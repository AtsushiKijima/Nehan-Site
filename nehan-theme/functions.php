<?php
/**
 * Nehan Theme functions
 *
 * テーマが動くときに WordPress が読み込む設定ファイル。
 * ここで「CSS とフォントを読み込む」「テーマの機能を有効化する」を宣言する。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // 直接アクセス禁止
}

/**
 * CSS・Google フォントの読み込み
 * これが無いと style.css が読まれず、デザインが全部崩れる。
 */
function nehan_enqueue_assets() {
	// Google Fonts（元 HTML の <head> にあった指定をそのまま移植）
	wp_enqueue_style(
		'nehan-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Noto+Sans+JP:wght@400;500;700;900&display=swap',
		array(),
		null
	);

	// テーマ本体の style.css。バージョンはファイル更新時刻にして、更新後すぐ反映させる。
	wp_enqueue_style(
		'nehan-style',
		get_stylesheet_uri(),
		array( 'nehan-google-fonts' ),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'nehan_enqueue_assets' );

/**
 * フォント配信元への preconnect（表示速度のため。元 HTML の指定を再現）
 */
function nehan_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'nehan_resource_hints', 10, 2 );

/**
 * テーマがサポートする機能
 */
function nehan_theme_setup() {
	// <title> タグを WordPress に自動出力させる
	add_theme_support( 'title-tag' );

	// 投稿のアイキャッチ画像（将来お知らせにサムネを付けたくなった時用）
	add_theme_support( 'post-thumbnails' );

	// RSS フィードの自動リンク
	add_theme_support( 'automatic-feed-links' );

	// HTML5 出力
	add_theme_support( 'html5', array( 'search-form', 'comment-list', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'nehan_theme_setup' );

/**
 * ブラウザのタブに出るタイトル（ファビコン横の文字）を整える
 * - トップページ      : 「Nehan株式会社」
 * - その他のページ    : 「ページ名 | Nehan株式会社」
 */
add_filter( 'document_title_separator', function () {
	return '|';
} );
add_filter( 'document_title_parts', function ( $parts ) {
	if ( is_front_page() || is_home() ) {
		return array( 'title' => 'Nehan株式会社' );
	}
	$parts['site'] = 'Nehan株式会社';
	unset( $parts['tagline'] );
	return $parts;
} );

/**
 * お知らせ（投稿）に「外部リンクURL」欄を追加する。
 * URLを入れると、トップ/一覧でその項目をクリックした時、
 * 記事ページではなく外部URLへ（別タブで）直接遷移する。
 */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'nehan_external_url', 'お知らせの外部リンク（任意）', 'nehan_external_url_box', 'post', 'side', 'high' );
} );
function nehan_external_url_box( $post ) {
	$val = get_post_meta( $post->ID, 'nehan_external_url', true );
	wp_nonce_field( 'nehan_external_url_save', 'nehan_external_url_nonce' );
	echo '<p style="margin:0 0 8px;font-size:12px;color:#555;">URLを入れると、お知らせ一覧でこの項目をクリックした時、記事ページではなく下記URLへ別タブで遷移します。空なら通常の記事ページへ。</p>';
	echo '<input type="url" name="nehan_external_url" value="' . esc_attr( $val ) . '" placeholder="https://..." style="width:100%;" />';
}
add_action( 'save_post', function ( $post_id ) {
	if ( ! isset( $_POST['nehan_external_url_nonce'] ) || ! wp_verify_nonce( $_POST['nehan_external_url_nonce'], 'nehan_external_url_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$url = isset( $_POST['nehan_external_url'] ) ? esc_url_raw( trim( wp_unslash( $_POST['nehan_external_url'] ) ) ) : '';
	if ( $url ) {
		update_post_meta( $post_id, 'nehan_external_url', $url );
	} else {
		delete_post_meta( $post_id, 'nehan_external_url' );
	}
} );
/**
 * Google アナリティクス 4（GA4）の計測タグ
 *
 * 測定ID: G-609ZQVNC1K
 * - <head> のできるだけ上に出す（優先度 1）
 * - ログイン中のユーザー（＝社内メンバー）は計測しない
 */
define( 'NEHAN_GA4_ID', 'G-609ZQVNC1K' );

function nehan_ga4_tag() {
	if ( is_user_logged_in() ) {
		return; // 社内（管理画面ログイン中）のアクセスは数えない
	}
	$id = NEHAN_GA4_ID;
	?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo rawurlencode( $id ); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo esc_js( $id ); ?>');
</script>
	<?php
}
add_action( 'wp_head', 'nehan_ga4_tag', 1 );

/**
 * お問い合わせ送信（Contact Form 7）を GA4 のコンバージョンとして送る
 *
 * このサイトは送信後にサンクスページへ遷移しないため、
 * CF7 が送信成功時に出すイベント（wpcf7mailsent）を拾って GA4 に送る。
 * GA4 側では「generate_lead」をキーイベント（コンバージョン）に設定すること。
 */
function nehan_ga4_cf7_event() {
	if ( is_user_logged_in() ) {
		return;
	}
	?>
<script>
  document.addEventListener('wpcf7mailsent', function (event) {
    if (typeof gtag !== 'function') return;
    gtag('event', 'generate_lead', {
      form_id: event.detail.contactFormId,
      form_name: event.detail.unitTag || '',
      page_path: location.pathname
    });
  });
</script>
	<?php
}
add_action( 'wp_footer', 'nehan_ga4_cf7_event' );
