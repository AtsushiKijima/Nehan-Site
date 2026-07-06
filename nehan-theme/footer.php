<?php
/**
 * 共通フッター（全ページの下部）
 */
?>
<!-- ========== Footer (Labid LP 準拠) ========== -->
<footer class="footer">
  <div class="container footer-inner">
    <div class="footer-brand">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="Nehan" class="footer-logo" />
      <p class="footer-tagline">自治体営業の効率と勝率の向上を実現する<br />AIデータプラットフォーム</p>
      <p class="footer-company">Nehan株式会社<br />東京都港区港南二丁目15番1号<br />品川インターシティA棟 22階</p>
      <div class="footer-cert">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/isms.jpg' ); ?>" alt="ISO/IEC 27001:2022 認証取得" class="footer-cert-img" />
        <span class="footer-cert-text">ISO/IEC 27001:<br />2022 認証取得</span>
      </div>
    </div>
    <div class="footer-links">
      <div class="footer-col">
        <h4 class="footer-col-title">プロダクト</h4>
        <ul>
          <li><a href="https://labid.jp" target="_blank" rel="noopener">Labid</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4 class="footer-col-title">リソース</h4>
        <ul>
          <li><a href="https://labid.jp/article" target="_blank" rel="noopener">お役立ち記事</a></li>
          <li><a href="https://labid.jp/podcast" target="_blank" rel="noopener">Labid Talk (Podcast)</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4 class="footer-col-title">会社情報</h4>
        <ul>
          <li><a href="/recruit/">採用情報</a></li>
          <li><a href="/inquiry/">お問い合わせ</a></li>
          <li><a href="/privacy/">プライバシーポリシー</a></li>
          <li><a href="https://labid.jp/termsofuse" target="_blank" rel="noopener">Labidサービス利用規約</a></li>
          <li><a href="/tokushoho/">特定商取引法に基づく表記</a></li>
          <li><a href="/security/">情報セキュリティ方針</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="footer-copy">© Nehan Inc.</span>
    </div>
  </div>
</footer>


<script>
(function () {
  var toggle = document.querySelector('.nav-toggle');
  var menu = document.querySelector('.nav-menu');
  if (!toggle || !menu) return;
  function closeMenu() {
    menu.classList.remove('is-open');
    toggle.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
  }
  toggle.addEventListener('click', function (e) {
    e.stopPropagation();
    var open = menu.classList.toggle('is-open');
    toggle.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
  });
  menu.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', closeMenu); });
  document.addEventListener('click', function (e) {
    if (menu.classList.contains('is-open') && !e.target.closest('.nav-inner')) closeMenu();
  });
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
