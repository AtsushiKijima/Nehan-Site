<?php
/**
 * お知らせ記事の個別ページ（News をクリックした時に開く）
 */
get_header(); ?>

<main class="section" style="padding-top:140px;">
  <div class="container" style="max-width:860px;">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="section-header" style="margin-bottom:32px;">
        <div class="section-num"><?php echo esc_html( get_the_date( 'Y / m / d' ) ); ?> ── お知らせ</div>
        <h1 class="section-title" style="font-size:clamp(26px,4vw,40px); line-height:1.45;">
          <?php the_title(); ?>
        </h1>
      </div>

      <article class="mission-text">
        <?php the_content(); ?>
      </article>

      <div style="margin-top:56px;">
        <a href="<?php echo esc_url( home_url( '/#news' ) ); ?>" class="btn btn-primary">← お知らせ一覧へ</a>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>