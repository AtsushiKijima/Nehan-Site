<?php
/**
 * 固定ページ用テンプレート（お問い合わせ・プライバシーポリシー等）
 */
get_header(); ?>

<main class="section" style="padding-top:140px;">
  <div class="container" style="max-width:860px;">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="section-header" style="margin-bottom:32px;">
        <h1 class="section-title" style="font-size:clamp(28px,4vw,44px); line-height:1.4;">
          <?php the_title(); ?>
        </h1>
      </div>
      <article class="mission-text">
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>