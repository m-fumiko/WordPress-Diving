<?php get_header(); ?>
<main>
    <!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__inner">
        <h1 class="sub-mv__title">Site MAP</h1>
        <div class="sub-mv__img">
            <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-sp-img.jpg" media="(max-width: 768px)" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sitemap-img.jpg" alt="砂浜と青い海">
            </picture>
        </div>
    </div>
</div>
<!-- パンくず -->
<?php get_template_part('breadcrumb'); ?>
<!-- sitemap -->
<section class="sitemap sitemap-layout">
    <div class="sitemap__inner inner">
        <nav class="sitemap__nav-menu sitemap-menu">
            <div class="sitemap-menu__left">
                <div class="sitemap-menu__wrap-top">
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/campaign")) ?>">キャンペーン</a>
                            <ul class="sitemap-menu__sub-items">
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">ライセンス取得</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">貸切体験ダイビング</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">ナイトダイビング</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/about")) ?>">私たちについて</a>
                        </li>
                    </ul>
                </div>
                <div class="sitemap-menu__wrap">
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/information")) ?>">ダイビング情報</a>
                            <ul class="sitemap-menu__sub-items">
                                <li class="sitemap-menu__sub-item">
                                    <a href="information.html?tab=tab01">ライセンス講習</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="information.html?tab=tab02">体験ダイビング</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="information.html?tab=tab03">ファンダイビング</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/blog")) ?>">ブログ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sitemap-menu__right">
                <div class="sitemap-menu__wrap-top">
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/voice")) ?>">お客様の声</a>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/price")) ?>">料金一覧</a>
                            <ul class="sitemap-menu__sub-items">
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">ライセンス講習</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">体験ダイビング</a>
                                </li>
                                <li class="sitemap-menu__sub-item">
                                    <a href="#">ファンダイビング</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="sitemap-menu__wrap">
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/faq")) ?>">よくある質問</a>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/privacy-policy")) ?>"><span>プライバシー<br class="u-mobile">ポリシー</span></a>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/terms-of-service")) ?>">利用規約</a>
                        </li>
                    </ul>
                    <ul class="sitemap-menu__items">
                        <li class="sitemap-menu__item">
                            <a class="sitemap-menu__item-title" href="<?php echo esc_url(home_url("/contact")) ?>">お問い合わせ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
</main>

<?php get_footer(); ?>