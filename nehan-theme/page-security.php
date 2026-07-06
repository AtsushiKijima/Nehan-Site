<?php
/**
 * 情報セキュリティ方針
 * 固定ページのスラッグを「security」にするとこのテンプレートが使われる。
 * 見出しは固定。本文は固定ページの編集画面（WP）で編集できる。
 */
get_header(); ?>

<main class="legal">
  <div class="container">
    <div class="legal-head">
      <div class="legal-eyebrow">情報セキュリティ方針</div>
      <h1 class="legal-title">Information Security Policy</h1>
    </div>
    <div class="legal-body">
      <?php
      while ( have_posts() ) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>