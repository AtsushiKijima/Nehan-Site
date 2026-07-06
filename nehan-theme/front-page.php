<?php
/**
 * トップページ（会社サイト）
 */
get_header(); ?>

<section class="hero">
  <div class="hero-arcs" aria-hidden="true">
    <svg viewBox="0 0 1600 900" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
      <defs>
        <!-- ブラシストローク用の歪みフィルタ(painterly distortion) -->
        <filter id="brushFilter" x="-15%" y="-15%" width="130%" height="130%">
          <feTurbulence type="fractalNoise" baseFrequency="0.012 0.022" numOctaves="3" seed="4" />
          <feDisplacementMap in="SourceGraphic" scale="120" />
        </filter>
        <filter id="brushFilter2" x="-15%" y="-15%" width="130%" height="130%">
          <feTurbulence type="fractalNoise" baseFrequency="0.018 0.014" numOctaves="2" seed="11" />
          <feDisplacementMap in="SourceGraphic" scale="100" />
        </filter>
        <filter id="brushFilter3" x="-15%" y="-15%" width="130%" height="130%">
          <feTurbulence type="fractalNoise" baseFrequency="0.020 0.030" numOctaves="3" seed="17" />
          <feDisplacementMap in="SourceGraphic" scale="80" />
        </filter>
        <!-- グレイン質感(brush の繊維感) -->
        <filter id="grainFilter">
          <feTurbulence type="fractalNoise" baseFrequency="0.9" numOctaves="2" seed="3" />
          <feColorMatrix values="0 0 0 0 0
                                 0 0 0 0 0
                                 0 0 0 0 0
                                 0 0 0 0.45 0" />
          <feComposite in2="SourceGraphic" operator="in" />
          <feBlend in="SourceGraphic" mode="multiply" />
        </filter>

        <!-- メインブラシ:ラベンダー→ピンク(強め)→コーラル→クリーム -->
        <linearGradient id="brushMain" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%"  stop-color="#C9B8E6" stop-opacity="0.55" />
          <stop offset="22%" stop-color="#F5A2BE" stop-opacity="0.7" />
          <stop offset="48%" stop-color="#FA8AB1" stop-opacity="0.72" />
          <stop offset="70%" stop-color="#FFB5A7" stop-opacity="0.6" />
          <stop offset="88%" stop-color="#FFDFBE" stop-opacity="0.42" />
          <stop offset="100%" stop-color="#FFE7CB" stop-opacity="0.35" />
        </linearGradient>

        <!-- セカンダリブラシ:ソフトスカイ→ピンク -->
        <linearGradient id="brushSoft" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%"  stop-color="#5DA3F2" stop-opacity="0.6" />
          <stop offset="50%" stop-color="#FBA8C0" stop-opacity="0.65" />
          <stop offset="100%" stop-color="#FFD3DE" stop-opacity="0.4" />
        </linearGradient>

        <!-- ハイライト:暖かいクリーム -->
        <linearGradient id="brushHighlight" x1="0" y1="0" x2="0.5" y2="1">
          <stop offset="0%"  stop-color="#FFE3C0" stop-opacity="0.85" />
          <stop offset="100%" stop-color="#FFE3C0" stop-opacity="0" />
        </linearGradient>
      </defs>

      <!-- メインの大きなブラシストローク(右側に流れる) -->
      <g class="brush-1">
        <ellipse cx="1280" cy="500" rx="520" ry="350"
                 fill="url(#brushMain)"
                 filter="url(#brushFilter)"
                 transform="rotate(-22 1280 500)"
                 opacity="0.92" />
      </g>

      <!-- 上部に重ねる細いストローク(さらに動き) -->
      <g class="brush-2">
        <ellipse cx="1380" cy="350" rx="360" ry="120"
                 fill="url(#brushMain)"
                 filter="url(#brushFilter2)"
                 transform="rotate(-18 1380 350)"
                 opacity="0.75" />
      </g>

      <!-- 下部の暖色補助ストローク -->
      <g class="brush-3">
        <ellipse cx="1180" cy="700" rx="380" ry="160"
                 fill="url(#brushMain)"
                 filter="url(#brushFilter3)"
                 transform="rotate(-28 1180 700)"
                 opacity="0.7" />
      </g>

      <!-- 薄いラベンダー雲(背景の柔らかさ) -->
      <ellipse cx="900" cy="280" rx="500" ry="180"
               fill="url(#brushSoft)"
               filter="url(#brushFilter2)"
               transform="rotate(-12 900 280)"
               opacity="0.55" />

      <!-- ハイライトのきらめき(明るいクリーム) -->
      <ellipse cx="1100" cy="450" rx="180" ry="80"
               fill="url(#brushHighlight)"
               filter="url(#brushFilter3)"
               transform="rotate(-30 1100 450)"
               opacity="0.7" />
    </svg>
  </div>
  <div class="hero-noise" aria-hidden="true"></div>

  <div class="hero-grid">
    <h1 class="hero-headline">
      新しい公共を<br />
      <span class="accent">共に創ろう。</span>
    </h1>
    <div class="hero-cta">
      <a href="https://labid.jp/" target="_blank" rel="noopener" class="btn btn-primary btn-lg">サービスサイト <span class="arrow">→</span></a>
    </div>

  </div>
</section>

<!-- ========== Mission ========== -->
<section class="section mission" id="mission">
  <div class="container">
    <div class="section-header" style="text-align:center;">
      <div class="section-num" style="margin-left:auto; margin-right:auto;">01 ── ミッション</div>
      <h2 class="section-title">Mission</h2>
    </div>
    <div class="mission-text">
      <p>
        人口減少や技術革新により、行政機関だけでの公共サービス提供が難しくなる中、市民・NPO・企業など多様な主体による<span class="emph">「新しい公共」</span>の実現が求められています。
      </p>
      <p>
        しかし現状では、特定事業者への依存や行政の知見不足により、効果的な課題解決が進んでいません。
      </p>
      <p>
        私たちは、より多くの民間団体が公共課題の解決にチャレンジし、そのプロセスを通じて行政とのノウハウ共有を進めることで、<span class="accent">すべての人が当事者として参画する、新しい公共の実現</span>を目指します。
      </p>
    </div>
  </div>
</section>

<!-- ========== Service ========== -->
<section class="section section-alt" id="service">
  <div class="container">
    <div class="section-header">
      <div class="section-num">02 ── 事業</div>
      <h2 class="section-title">Service</h2>
    </div>

    <div class="service-grid">
      <div class="service-visual" aria-hidden="true">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/Labid.png" alt="Labid" class="service-visual-img" />
      </div>
      <div class="service-content">
        <div class="service-eyebrow">AI Data Platform for BtoG Sales</div>
        <h3 class="service-title">自治体営業の効率と勝率の<br />向上を実現するAIデータプラットフォーム</h3>
        <div class="service-brand">
          <span class="service-brand-name">Labid</span>
          <span class="service-brand-yomi">ラビッド</span>
        </div>
        <p class="service-desc">
          ただ入札情報を探すだけではない。自社に合致した案件の収集、仕様書の読み込み、案件の管理、提案書の作成といった入札参加に必要業務全てを効率化。Labidがよりカンタンによりスピーディーな入札参加を実現し、営業生産性を向上します。
        </p>
        <a href="https://labid.jp/" target="_blank" rel="noopener" class="btn btn-primary btn-lg">詳しく見る <span class="arrow">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- ========== News（WordPress の投稿と連動） ========== -->
<section class="section" id="news">
  <div class="container">
    <div class="section-header">
      <div class="section-num">03 ── お知らせ</div>
      <h2 class="section-title">News</h2>
    </div>

    <div class="news-list">
      <?php
      $nehan_news = new WP_Query( array(
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'ignore_sticky_posts' => true,
      ) );
      if ( $nehan_news->have_posts() ) :
        while ( $nehan_news->have_posts() ) : $nehan_news->the_post();
          $nehan_ext = get_post_meta( get_the_ID(), 'nehan_external_url', true ); ?>
          <a href="<?php echo esc_url( $nehan_ext ? $nehan_ext : get_permalink() ); ?>" class="news-item"<?php echo $nehan_ext ? ' target="_blank" rel="noopener"' : ''; ?>>
            <span class="news-date"><?php echo esc_html( get_the_date( 'Y / m / d' ) ); ?></span>
            <span class="news-title"><?php the_title(); ?></span>
            <span class="news-arrow">→</span>
          </a>
        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p style="color:var(--ink-3);">お知らせはまだありません。管理画面の「投稿 → 新規追加」から追加してください。</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section section-alt" id="executives">
  <div class="container">
    <div class="section-header">
      <div class="section-num">04 ── 経営メンバー</div>
      <h2 class="section-title">TEAM</h2>
    </div>

    <div class="execs">
      <article class="exec-row">
        <div class="exec-portrait">
          <span class="exec-fallback" aria-hidden="true">MT</span>
          <img src="<?php echo get_template_directory_uri(); ?>/executives/tsurumaki.jpg" alt="鶴巻 百門" onerror="this.remove();" />
        </div>
        <div class="exec-info">
          <div class="exec-role">代表取締役 CEO</div>
          <div class="exec-name">
            <span class="exec-name-jp">鶴巻 百門</span>
            <span class="exec-name-en">Momoto Tsurumaki</span>
          </div>
          <p class="exec-bio">
            2017年に株式会社サーキュレーション入社。新卒初の支社立ち上げメンバーとして東海支社立ち上げに従事。その後、マツリカにジョインしカスタマーサクセスを担当。カスタマーサクセスSMBチームのリーダーを経験。
          </p>
        </div>
      </article>

      <article class="exec-row">
        <div class="exec-portrait">
          <span class="exec-fallback" aria-hidden="true">AK</span>
          <img src="<?php echo get_template_directory_uri(); ?>/executives/kijima.jpg" alt="木嶋 諄" onerror="this.remove();" />
        </div>
        <div class="exec-info">
          <div class="exec-role">代表取締役 COO</div>
          <div class="exec-name">
            <span class="exec-name-jp">木嶋 諄</span>
            <span class="exec-name-en">Atsushi Kijima</span>
          </div>
          <p class="exec-bio">
            2017年にアライドアーキテクツ株式会社へ入社。SNSプロモーション・広告運用、カスタマーサクセスに従事。その後、SaaSプロダクト「echoes」を契約する約50のエンタープライズ顧客の営業マネージャーを担当。SNSアカウント運用やSNSデータを活用した公共入札を複数経験。
          </p>
        </div>
      </article>

      <article class="exec-row">
        <div class="exec-portrait">
          <span class="exec-fallback" aria-hidden="true">DI</span>
          <img src="<?php echo get_template_directory_uri(); ?>/executives/ikemizu.jpg" alt="池水 大揮" onerror="this.remove();" />
        </div>
        <div class="exec-info">
          <div class="exec-role">取締役 / CTO</div>
          <div class="exec-name">
            <span class="exec-name-jp">池水 大揮</span>
            <span class="exec-name-en">Daiki Ikemizu</span>
          </div>
          <p class="exec-bio">
            2018年にシンプレクス株式会社へ入社。暗号資産/FXの取引システム開発に従事。その後、ニューラルグループ株式会社にて新規開発をメインとしたAIを用いたアプリケーション開発を複数経験。
          </p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ========== Company info ========== -->
<section class="section" id="company">
  <div class="container">
    <div class="section-header">
      <div class="section-num">05 ── 会社情報</div>
      <h2 class="section-title">Company</h2>
    </div>

    <div class="company-grid">
      <div class="company-label">Company Name</div>
      <div class="company-value">Nehan株式会社</div>

      <div class="company-label">Address</div>
      <div class="company-value">
        〒108-6022<br />
        東京都港区港南二丁目15番1号<br />
        品川インターシティA棟 22階
      </div>

      <div class="company-label">Business</div>
      <div class="company-value">自治体営業の効率と勝率の向上を実現するAIデータプラットフォーム「Labid」の開発・運営</div>

      <div class="company-label">Vision</div>
      <div class="company-value">新しい公共を共に創ろう</div>
    </div>
  </div>
</section>

<!-- ========== Recruit CTA ========== -->
<section class="recruit" id="recruit">
  <div class="container">
    <div class="recruit-inner">
      <div class="recruit-eyebrow">Join Us · Recruit</div>
      <h2 class="recruit-headline">
        Nehanは、一緒に挑戦する仲間を募集しています。
      </h2>
      <a href="/recruit/" class="btn btn-primary btn-lg">採用情報を見る <span class="arrow">→</span></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
