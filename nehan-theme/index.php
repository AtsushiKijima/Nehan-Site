<?php
/**
 * 汎用テンプレート（お知らせ一覧・アーカイブ・検索結果などのフォールバック）
 * front-page.php が無い文脈はここが使われる。
 */
get_header(); ?>

<main class="section" style="padding-top:140px;">
  <div class="container" style="max-width:980px;">
    <div class="section-header">
      <div class="section-num">News</div>
      <h1 class="section-title">お知らせ</h1>
    </div>

    <div class="news-list">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post();
          $nehan_ext = get_post_meta( get_the_ID(), 'nehan_external_url', true ); ?>
          <a href="<?php echo esc_url( $nehan_ext ? $nehan_ext : get_permalink() ); ?>" class="news-item"<?php echo $nehan_ext ? ' target="_blank" rel="noopener"' : ''; ?>>
            <span class="news-date"><?php echo esc_html( get_the_date( 'Y / m / d' ) ); ?></span>
            <span class="news-title"><?php the_title(); ?></span>
            <span class="news-arrow">→</span>
          </a>
        <?php endwhile; ?>
      <?php else : ?>
        <p style="color:var(--ink-3);">お知らせはまだありません。</p>
      <?php endif; ?>
    </div>

    <?php
    // 前後ページ送り
    the_posts_pagination( array(
      'mid_size'  => 1,
      'prev_text' => '← 前へ',
      'next_text' => '次へ →',
    ) );
    ?>
  </div>
</main>

<?php get_footer(); ?>