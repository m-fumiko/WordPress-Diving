<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=YOUR_GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'YOUR_GA_MEASUREMENT_ID');
  </script>
  <!-- / Google Analytics -->
</head>
<body>
  <div id="top"></div>
  <header class="header header-layout js-header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo esc_url(home_url("/")) ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-logo2.svg" alt="CodeUpsロゴ">
        </a>
      </h1>
      <nav class="header__nav u-desktop">
        <ul class="header__nav-items">
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/campaign")) ?>">Campaign<span>キャンペーン</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/about")) ?>">About us<span>私たちについて</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/information")) ?>">Information<span>ダイビング情報</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/blog")) ?>">Blog<span>ブログ</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/voice")) ?>">Voice<span>お客様の声</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/price")) ?>">Price<span>料金一覧</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/faq")) ?>">FAQ<span>よくある質問</span></a></li>
          <li class="header__nav-item"><a href="<?php echo esc_url(home_url("/contact")) ?>">Contact<span>お問合せ</span></a></li>
        </ul>
      </nav>
      <!-- ハンバーガー -->
      <button class="header__hamburger js-hamburger u-mobile">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!-- ドロワー -->
      <div class="header__drawer js-drawer u-mobile">
        <nav class="header__drawer-nav drawer-menu">
          <div class="drawer-menu__left">
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/campaign")) ?>">キャンペーン</a>
                <ul class="drawer-menu__sub-items">
                  <?php
                  // タクソノミー 'campaign_category' の全てのカテゴリを取得
                  $args = array(
                    'taxonomy' => 'campaign_category', // タクソノミー名
                    'hide_empty' => false, // 投稿がない空のタームも取得する
                  );
                  $campaign_categories = get_terms($args); // タームを取得
                  if (!empty($campaign_categories)) : // タームが存在するかチェック
                    foreach ($campaign_categories as $category) : // 各タームをループ処理
                  ?>
                      <li class="drawer-menu__sub-item">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                          <?php echo esc_html($category->name); ?>
                        </a>
                      </li>
                    <?php endforeach; // ループ終了?>
                  <?php endif; // タームが存在するかチェック終了?>
                </ul>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/about")) ?>">私たちについて</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/information")); ?>">ダイビング情報</a>
                <ul class="drawer-menu__sub-items">
                  <li class="drawer-menu__sub-item">
                    <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab01">ライセンス講習</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab02">体験ダイビング</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab03">ファンダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/blog")) ?>">ブログ</a>
              </li>
            </ul>
          </div>
          <div class="drawer-menu__right">
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/voice")) ?>">お客様の声</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/price")) ?>">料金一覧</a>
                <ul class="drawer-menu__sub-items">
                  <?php
                  // カスタムクエリを使用して料金表のタイトルを取得
                  $args = array(
                    'post_type' => 'page',
                    'pagename' => 'price' // "price" スラッグを持つ固定ページを指定
                  );
                  $price_query = new WP_Query($args); // カスタムクエリを作成
                  ?>
                  <?php if ($price_query->have_posts()) : // 投稿があるかチェック
                  ?>
                    <?php while ($price_query->have_posts()) : $price_query->the_post(); // 投稿がある限りループ
                    ?>
                      <?php
                      $courses = [
                        'course_title1',
                        'course_title2',
                        'course_title3',
                        'course_title4',
                        'course_title5',
                        'course_title6',
                      ];
                      ?>
                      <?php foreach ($courses as $title_key) : ?>
                        <?php $course_title = SCF::get($title_key); ?>
                        <?php if (!empty($course_title)) : ?>
                          <li class="drawer-menu__sub-item">
                            <a href="<?php echo esc_url(home_url("/price#") . sanitize_title($course_title)); ?>">
                              <?php echo esc_html($course_title); ?>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <?php wp_reset_postdata(); // カスタムクエリのデータをリセット
                  ?>
                </ul>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/faq")) ?>">よくある質問</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/privacy-policy")) ?>">プライバシー<br>ポリシー</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/terms-of-service")) ?>">利用規約</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/contact")) ?>">お問い合わせ</a>
              </li>
            </ul>
            <ul class="drawer-menu__items">
              <li class="drawer-menu__item">
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/sitemap")) ?>">サイトマップ</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>