<?php
/**
 * 共通ヘッダー（全ページの上部）
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
// ファビコンはテーマで固定せず、WordPress のサイトアイコン（外観 > カスタマイズ > サイト基本情報）
// が wp_head() から出力するものだけを使う。ここで rel="icon" を重ねると sizes="any" が
// 優先されてサイトアイコンの変更が反映されず、Google 側の選択も不安定になる。

// OGP / SNS シェア用メタ
if ( is_singular() ) {
	$nehan_og_url  = get_permalink();
	$nehan_og_desc = has_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : '自治体営業の効率と勝率の向上を実現するAIデータプラットフォーム「Labid」を開発・提供するNehan株式会社。';
} else {
	$nehan_og_url  = home_url( '/' );
	$nehan_og_desc = '自治体営業の効率と勝率の向上を実現するAIデータプラットフォーム「Labid」を開発・提供するNehan株式会社。';
}
$nehan_og_image = get_template_directory_uri() . '/assets/ogp.png';
?>
<meta name="description" content="<?php echo esc_attr( $nehan_og_desc ); ?>" />
<meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>" />
<meta property="og:site_name" content="Nehan株式会社" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>" />
<meta property="og:description" content="<?php echo esc_attr( $nehan_og_desc ); ?>" />
<meta property="og:url" content="<?php echo esc_url( $nehan_og_url ); ?>" />
<meta property="og:image" content="<?php echo esc_url( $nehan_og_image ); ?>" />
<meta property="og:image:secure_url" content="<?php echo esc_url( $nehan_og_image ); ?>" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo esc_url( $nehan_og_image ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ========== Navigation ========== -->
<header class="nav">
  <div class="nav-inner">
    <a class="nav-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Nehan">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="Nehan" />
    </a>
    <nav class="nav-menu">
      <a href="<?php echo esc_url( home_url( '/#mission' ) ); ?>">Mission</a>
      <a href="<?php echo esc_url( home_url( '/#service' ) ); ?>">Service</a>
      <a href="<?php echo esc_url( home_url( '/#news' ) ); ?>">News</a>
      <a href="<?php echo esc_url( home_url( '/#executives' ) ); ?>">Members</a>
      <a href="<?php echo esc_url( home_url( '/#company' ) ); ?>">Company</a>
    </nav>
    <div class="nav-actions">
      <a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" class="btn btn-primary">採用情報</a>
      <button class="nav-toggle" type="button" aria-label="メニュー" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>