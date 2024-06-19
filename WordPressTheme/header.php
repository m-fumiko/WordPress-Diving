<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
<?php wp_head(); ?>
</head>
<body>
  <header class="header header-layout  js-header">
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
                  <li class="drawer-menu__sub-item">
                    <a href="#">ライセンス取得</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="#">貸切体験ダイビング</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="#">ナイトダイビング</a>
                  </li>
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
                <a class="drawer-menu__item-title" href="<?php echo esc_url(home_url("/information")) ?>">ダイビング情報</a>
                <ul class="drawer-menu__sub-items">
                  <li class="drawer-menu__sub-item">
                    <a href="information.html?tab=tab01">ライセンス講習</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="information.html?tab=tab02">体験ダイビング</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="information.html?tab=tab03">ファンダイビング</a>
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
                  <li class="drawer-menu__sub-item">
                    <a href="#">ライセンス講習</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="#">体験ダイビング</a>
                  </li>
                  <li class="drawer-menu__sub-item">
                    <a href="#">ファンダイビング</a>
                  </li>
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