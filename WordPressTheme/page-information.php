<?php get_header(); ?>
<main>
  <!-- sub-mv -->
<div class="sub-mv">
      <div class="sub-mv__inner">
        <h1 class="sub-mv__title">information</h1>
        <div class="sub-mv__img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/info-mv-sp.jpg" media="(max-width: 768px)" />
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-mv.jpg" alt="2人のダイバーと無数の熱帯魚が泳いでいる様子">
          </picture>
        </div>
      </div>
    </div>
    <!-- パンくず -->
    <div class="breadcrumb breadcrumb-layout">
      <div class="breadcrumb__inner inner">
        <!-- Breadcrumb NavXTで出力される部分 ここから -->
        <?php if (function_exists('bcn_display')) { ?>
                <div class="breadcrumb-navxt" vocab="http://schema.org/" typeof="BreadcrumbList">
                    <?php bcn_display(); ?>
                </div>
            <?php } ?>
        <!-- Breadcrumb NavXTで出力される部分 ここまで -->
      </div>
    </div>
    <section class="information information-layout">
      <div class="information__inner inner">
        <div class="information__tab information-tab">
          <ul class="information-tab__menu">
            <li class="information-tab__menu-item js-tab-menu is-active" data-number="tab01">ライセンス<br
                class="u-mobile">講習</li>
            <li class="information-tab__menu-item information-tab__menu-item--icon03 js-tab-menu" data-number="tab02">
              体験<br class="u-mobile">ダイビング</li>
            <li class="information-tab__menu-item information-tab__menu-item--icon02 js-tab-menu" data-number="tab03">
              ファン<br class="u-mobile">ダイビング</li>
          </ul>
          <ul class="information-tab__content">
            <li id="tab01" class="information-tab__content-item js-tab-content is-active">
              <div class="information-tab__contents-wrap">
                <div class="information-tab__contents">
                  <h3 class="information-tab__content-title">ライセンス講習</h3>
                  <p class="information-tab__content-text">
                    泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします&#33;&nbsp;スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう&#33;&nbsp;
                  </p>
                </div>
                <div class="information-tab__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-tab01.jpg" alt="5人のダイバーが海に浮かんでいる様子を上から撮影した写真">
                </div>
              </div>
            </li>
            <li id="tab02" class="information-tab__content-item js-tab-content">
              <div class="information-tab__contents-wrap">
                <div class="information-tab__contents">
                  <h3 class="information-tab__content-title">体験ダイビング</h3>
                  <p class="information-tab__content-text">
                    ブランクダイバー、ライセンスを取り立ての方も安心&#33;沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意&#33;
                  </p>
                </div>
                <div class="information-tab__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-tab03.jpg" alt="二匹の熱帯魚が泳いでいる様子">
                </div>
              </div>
            </li>
            <li id="tab03" class="information-tab__content-item js-tab-content">
              <div class="information-tab__contents-wrap">
                <div class="information-tab__contents">
                  <h3 class="information-tab__content-title">ファンダイビング</h3>
                  <p class="information-tab__content-text">
                    ブランクダイバー、ライセンスを取り立ての方も安心&#33;沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意&#33;
                  </p>
                </div>
                <div class="information-tab__img">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/info-tab02.jpg" alt="無数の熱帯魚が泳いでいる様子">
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>