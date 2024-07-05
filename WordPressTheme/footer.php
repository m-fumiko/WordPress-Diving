<!-- Contactセクションの条件分岐 -->
<?php
if (!is_404() && !is_page('contact')) {
    get_template_part('contact-section');
}
?>
<!-- トップに戻るボタン -->
<div class="top-button top-button-layout js-top-button">
    <a href="">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top.svg" alt="PAGE TOP">
    </a>
</div>
<!-- フッター -->
<footer class="footer footer-layout <?php if (is_404()) echo 'footer--not-found'; ?>">
    <div class="footer__inner inner">
        <div class="footer__wrap">
            <div class="footer__top">
                <div class="footer__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/CodeUps-logo2.svg" alt="CodeUps">
                </div>
                <div class="footer__sns">
                    <a class="footer__sns-icon" target="_blank" href="https://www.facebook.com/">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/facebook.svg" alt="facebook">
                    </a>
                    <a class="footer__sns-icon" href="https://www.instagram.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/instagram.svg" alt="instagram">
                    </a>
                </div>
            </div>

            <nav class="footer__nav-menu footer-menu">
                <div class="footer-menu__left">
                    <div class="footer-menu__wrap-top">
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/campaign")) ?>">キャンペーン</a>
                                <ul class="footer-menu__sub-items">
                                    <li class="footer-menu__sub-item">
                                        <a href="#">ライセンス取得</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="#">貸切体験ダイビング</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="#">ナイトダイビング</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/about")) ?>">私たちについて</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-menu__wrap">
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/information")) ?>">ダイビング情報</a>
                                <ul class="footer-menu__sub-items">
                                    <li class="footer-menu__sub-item">
                                        <a href="information.html?tab=tab01">ライセンス講習</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="information.html?tab=tab02">体験ダイビング</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="information.html?tab=tab03">ファンダイビング</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/blog")) ?>">ブログ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-menu__right">
                    <div class="footer-menu__wrap-top">
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/voice")) ?>">お客様の声</a>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/price")) ?>">料金一覧</a>
                                <ul class="footer-menu__sub-items">
                                    <li class="footer-menu__sub-item">
                                        <a href="#">ライセンス講習</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="#">体験ダイビング</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="#">ファンダイビング</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-menu__wrap">
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/faq")) ?>">よくある質問</a>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/privacy-policy")) ?>"><span>プライバシー<br class="u-mobile">ポリシー</span></a>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/terms-of-service")) ?>">利用規約</a>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/contact")) ?>">お問い合わせ</a>
                            </li>
                        </ul>
                        <ul class="footer-menu__items">
                            <li class="footer-menu__item">
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/sitemap")) ?>">サイトマップ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <small class="footer__copyright">Copyright&nbsp;&copy;&nbsp;2021&nbsp;-&nbsp;<?php echo wp_date("Y"); ?>&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
</footer>
<?php wp_footer(); ?>
</body>

</html>