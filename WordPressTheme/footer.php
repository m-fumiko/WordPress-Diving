<!-- Contactセクションの条件分岐 -->
<?php
if (!is_404() && !is_page('contact')) {
    get_template_part('contact-section');
}
?>

<!-- トップに戻るボタン -->
<div class="top-button top-button-layout js-top-button">
    <a href="#top">
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
                                            <li class="footer-menu__sub-item">
                                                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                                    <?php echo esc_html($category->name); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; // ループ終了?>
                                    <?php endif; // タームが存在するかチェック終了?>
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
                                <a class="footer-menu__item-title" href="<?php echo esc_url(home_url("/information")); ?>">ダイビング情報</a>
                                <ul class="footer-menu__sub-items">
                                    <li class="footer-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab01">ライセンス講習</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab02">体験ダイビング</a>
                                    </li>
                                    <li class="footer-menu__sub-item">
                                        <a href="<?php echo esc_url(home_url('/information')); ?>?tab=tab03">ファンダイビング</a>
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
                                                    <li class="footer-menu__sub-item">
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